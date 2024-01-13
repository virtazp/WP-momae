<?php

get_header();
?>
<div id='main-content' class="general animated fadeIn delay-1s">
<?php
 echo "Titre : ". get_the_title() . "<br>";
 echo "Nom : ". get_field('nom') . "<br>";
 echo "Description : ". get_field('description') . "<br>";
?>
</div>
<?php
get_footer();
