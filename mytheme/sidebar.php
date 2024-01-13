<?php if (is_active_sidebar('sidebar')) : ?>
    <aside role="complementary">
        <h2>Modèle issue de : sidebar.php</h2>
        <?php dynamic_sidebar('sidebar'); ?>
    </aside>
<?php endif; ?>