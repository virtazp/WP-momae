<?php get_header(); ?>
<main>
    <section>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article>
                    <header>
                        <h2>Modèle issue de : single-offredemploi.php</h2>
                        <h2><?php the_title(); ?></h2>
                        By: <?php the_author(); ?>
                        <?php echo get_the_category() ?>
                    </header>
                    <?php the_content(); ?>
                </article>
            <?php endwhile;
    else : ?>
            <article>
                <p>Sorry, no post was found!</p>
            </article>
        <?php endif; ?>
    </section>
</main>
<?php get_footer(); ?>