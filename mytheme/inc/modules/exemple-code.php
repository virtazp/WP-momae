<?php
/*********************************************************************/
/*********************************************************************/
// Enregistrement de la sidebar
/*********************************************************************/
/*********************************************************************/

function add_widget_Support()
{
    register_sidebar(array(
        'name'          => 'Sidebar',
        'id'            => 'sidebar',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'add_Widget_Support');

/*********************************************************************/
/*********************************************************************/
// Longueur d'extrait pour les articles CPT (utilisation avec ACF)
/*********************************************************************/
/*********************************************************************/

function custom_field_excerpt()
{
    global $post;
    $text = get_field('introduction'); //Replace 'your_field_name'
    if ('' != $text) {
        $text = strip_shortcodes($text);
        $text = apply_filters('the_content', $text);
        $text = str_replace(']]&gt;', ']]&gt;', $text);
        $excerpt_length = 20; // 20 words
        $excerpt_more = apply_filters('excerpt_more', '' . '...');
        $text = wp_trim_words($text, $excerpt_length, $excerpt_more);
    }
    return apply_filters('the_excerpt', $text);
}

/*********************************************************************/
/*********************************************************************/
// Redirection page 404
/*********************************************************************/
/*********************************************************************/

function page404_redirection()
{
    global $mapage;
    if (is_404()) {
        wp_redirect(home_url("erreur-404")); //remplacez "erreur-404" par le nom d'identifiant de votre page
        exit;
    }
}
add_action('wp', 'page404_redirection', 1);

/*********************************************************************/
/*********************************************************************/
// load more button sur CPT : 
//Permet l'ajout d'un bouton qui charge plus d'article.
//En charge 3 de plus (showposts => 3)
/*********************************************************************/
/*********************************************************************/

add_action('wp_ajax_load_more', 'load_more');
add_action('wp_ajax_nopriv_load_more', 'load_more');

function load_more()
{
    global $post;

    $offset = $_POST['offset'];
    $posttype = $_POST['posttype'];

    //if ($taxo==1){ 
    $args = array(

        'offset' => $offset,
        'showposts' => 3,
        'post_status' => publish,
        'post_type' => $posttype,
    );

    $ajax_query = new WP_Query($args);

    if ($ajax_query->have_posts()) : while ($ajax_query->have_posts()) : $ajax_query->the_post();

            get_template_part('get-article');

        endwhile;
    endif;
    die();
}

// a mettre dans le template archive ou le template normal
$nbrDePost = '3'; ?>
<div id="actualitePrinc">
    <?php $loop = new WP_Query(array('post_type' => 'Actualite', 'posts_per_page' => $nbrDePost)); ?>
    <?php if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
            <a href="<?php the_permalink(); ?>">
                <div class="fullBlocActu col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                    <div class="listeActualiteBlocImg">
                        <?php $imageArray = get_field('image_à_la_une');
                        $imageAlt = esc_attr($imageArray['alt']);
                        $imageThumbURL = esc_url($imageArray['sizes']['thumbnail']); ?>

                        <div class="imageThumbActu" style="background-image:url('<?php echo $imageThumbURL; ?>');"></div>
                    </div>
                    <div class="blocActu">
                        <?php the_category(); ?>
                        <h4><?php the_title(); ?></h4>
                        <p><?php echo custom_field_excerpt(); ?></p>
                    </div>

                </div>
            </a>
        <?php endwhile; ?>
    </div>

<?php else : ?>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="listeOffreEmploi ">
            <div class="blocContent">
                <h4>Aucune actualité en ligne !</h4>
            </div>
        </div>
    </div>

<?php endif;
wp_reset_query();

// a mettre dans le script correspondant
/*
var offset = 3;
jQuery('body').on('click', '.load-moreepic', function () {
var posttype = 'Actualite';
jQuery('.chargementepi').show();
jQuery.post(
ajaxurl,
{
'action': 'load_more',
'offset': offset,
'posttype': posttype,
},
function (response) {
offset = offset + 3;
jQuery('#actualitePrinc').append(response);
jQuery('.chargementepi').hide();
}
);
});
*/
/*********************************************************************/
/*********************************************************************/
// Requête SQL WP
/*********************************************************************/
/*********************************************************************/

global $wpdb;
$requete = "SELECT seuil FROM reward WHERE id = 1";
$resultat1 = $wpdb->get_results($requete);
foreach ($resultat1 as $enreg) {
    $seuil = $enreg->seuil;
}

/*********************************************************************/
/*********************************************************************/
// Requête SQL Curl 1
/*********************************************************************/
/*********************************************************************/
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.mailjet.com/v3.1/send",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => '{
"Messages":[
{
"From": {
"Email": "slefevre@groupe-isia.com",
"Name": "Sylvain LEFEVRE"
},
"To": [
{
"Email": "slefevre@isimedia.com",
"Name": "Sylvain L."
}
],
"Cc": [
{
"Email": "ajaeger@groupe-isia.com",
"Name": "Sylvain Lef"
}
],
"Subject": "Test mail commande rc",
"TextPart": "Test mail commande ",
"HTMLPart": "<h3>OK</h3><br />May the delivery force be with you! Email du visiteur : ' . $email . '"
}
]
}',
    CURLOPT_HTTPHEADER => array(
        "Authorization: Basic ZjRiZGQxZTIxMGViNWQ2YWJjYjA0ODgyZmY3ZDYwMzI6NWNkZThhMDA2M2Q4Zjg2ZDQ5NzBlMzgzMDk1NGM0MTg=",
        "Cache-Control: no-cache",
        "Content-Type: application/json",
    ),
));
$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    '<script>
    alert("erreur");
</script>';
    echo "cURL Error #:" . $err;
} else { }

/*********************************************************************/
/*********************************************************************/
// Requête SQL Curl 2
/*********************************************************************/
/*********************************************************************/

$ch = curl_init();
$hashh = sha1($email . $secretKey1);
$dataa = array('email' => $email, 'key' => $key, 'hash' => $hashh);

$headers = array(
    'Accept: application/json',
);
curl_setopt($ch, CURLOPT_URL, 'https://cis-rcfr-staging.clixray.io/service/user/resolve-by-email');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $dataa);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$server_output = curl_exec($ch);
curl_close($ch);
$dataa = json_decode($server_output, true);

/*********************************************************************/
/*********************************************************************/
// Requête API
/*********************************************************************/
/*********************************************************************/

$url2 = 'https://cis-rcfr-staging.clixray.io/service/pets/get-pets-of-partners-contact';
$hash2 = sha1($key . $user_guid . $secretKey1);
$response2 = wp_safe_remote_post(
    $url2,
    array(
        'method' => 'POST',
        'headers' => array('Accept' => 'application/json'),
        'body' => array('key' => $key, 'user_guid' => $user_guid, 'hash' => $hash2),
    )
);
if (is_wp_error($response2)) {
    $error_message = $response2->get_error_message();
    echo "Something went wrong: $error_message";
} else {
    $nbrDeTelechargement = json_decode($response2['body']);
    $nbrDeTelechargementTab = $nbrDeTelechargement->{'data'};
    $nbrDeTelechargementTotal = count($nbrDeTelechargementTab);
}

/*********************************************************************/
/*********************************************************************/
// Déconnexion
/*********************************************************************/
/*********************************************************************/
session_start();

session_destroy();
header('location: /Wordpress-RC/');
exit;
?>