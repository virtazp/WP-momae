<?php

get_header();
?>
<div id='main-content' class="general animated fadeIn delay-1s">
<h1>Problème de santé page archive</h1>
<?php
$loop = new WP_Query(array('post_type' => 'probleme_sante', 'posts_per_page' => -1));
if ($loop->have_posts()) :

    while ($loop->have_posts()) :
        $loop->the_post();
        $cat = get_the_terms(get_the_ID(), 'type-probleme-sante');

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

<?php get_footer(); ?>