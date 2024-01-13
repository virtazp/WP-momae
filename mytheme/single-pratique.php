
<?php
get_header();
?>
<div id='main-content' class="general animated fadeIn delay-1s">
<?php
 echo "Nom : ". get_field('nom') . "<br>";
 echo "Description : ". get_field('description') . "<br>";
$featured_posts = get_field('relation');
echo "<h1>Relation : </h1><br>";
if( $featured_posts ): ?>
    <ul>
    <?php foreach( $featured_posts as $post ): 

        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post); ?>
        <li>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>
            <span>A custom field from this post: <br><?php the_field( 'nom' ); ?> <br><?php the_field( 'description' ); ?></span>
        </li>
    <?php endforeach; ?>
    </ul>
    <?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
<?php 
endif; 
?>
</div>
<?php
get_footer();
?>

