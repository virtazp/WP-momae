<?php
/*
 * Template Name: Accueil
 * Template Post Type: post, page, product
 */

require_once(__DIR__ . '/../inc/database/databaseinteractions.php');

$test = get_probleme_besoin_pratique();



function css_header()
{
    add_css_file("accueil.css");
}
add_action('header_hook_file', 'css_header', 10, 0);

get_header();
?>
<main id="main-content">
    <section id="section1">
        <h1>Exemple de GET sur la liaison "Pratique" et "Problème"</h1>
        <p>
            <?php
            var_dump($test);
            ?>
        </p>
        <p>
            Création des tables en manuel. <br>
            Pour chaque modèle de template, il faudra développer la requête. <br>
            Plus flexible
        </p>

    </section>
    <section>
        <h1>Exemple avec CPT + ACF + Taxonomie</h1>
        <?php
$loop = new WP_Query(array('post_type' => 'pratique', 'posts_per_page' => -1));
if ($loop->have_posts()) :

    while ($loop->have_posts()) :
        $loop->the_post();
        $cat = get_the_terms(get_the_ID(), 'type-pratique');

        echo "<a href='" . get_the_permalink() . "'>";
        echo "Titre : ". get_the_title() . "<br>";
        echo "Nom : ". get_field('nom') . "<br>";
        echo "Description : ". get_field('description') . "<br>";
        echo "</a>";

    endwhile;
else :
?>
    <div>Rien ici</div>
<?php
endif;
wp_reset_query();
?>
    </section>
</main>
<?php
echo '<script src="' . get_template_directory_uri() . '/assets/js/accueil.js?ver=' . date('H:i') . '"></script>';
?>
<?php get_footer(); ?>