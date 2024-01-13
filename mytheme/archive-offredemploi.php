<?php get_header(); ?>
<main>
    <section>
        <h2>Modèle issue de : archive-offredemploi.php</h2>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article>
                    <header>
                        <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                        By: <?php the_author(); ?>
                    </header>
                    <?php the_excerpt(); ?>
                </article>
            <?php endwhile;
    else : ?>
            <article>
                <p>Sorry, no posts were found!</p>
            </article>
        <?php endif; ?>
    </section>
</main>
<?php get_footer(); ?>