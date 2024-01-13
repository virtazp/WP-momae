<?php get_header(); ?>
<main>
    <section>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article>
                    <header>
                        <h2>Modèle issue de : page.php</h2>
                    </header>
                    <p><?php the_content(); ?></p>
                    <img src="<?php get_stylesheet_directory_uri() ?>wp-content/themes/mytheme/assets/img/wp-content.png" alt="" srcset="">
                </article>
            <?php endwhile;
    else : ?>
            <article>
                <p>Sorry, no page was found!</p>
            </article>
        <?php endif; ?>
    </section>
</main>
<?php get_footer(); ?>