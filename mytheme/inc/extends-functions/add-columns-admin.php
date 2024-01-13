<?php
// Ajoute des colonnes pour les offres dans le backOffice
add_filter('manage_offres_posts_columns', function ($columns) {
  unset($columns['tags']);
  $newColumns = [];
  foreach ($columns as $k => $v) {
    if ($k === 'date') {
      $newColumns['ref'] = 'Référence';
      $newColumns['type'] = 'Type';
      $newColumns['contrat'] = 'Contrat';
      $newColumns['lieu'] = 'Lieu du poste';
      $newColumns['date_echeance'] = 'Expire le';
      $newColumns['bullet_echeance'] = 'Statut';
    }
    $newColumns[$k] = $v;
  }
  return $newColumns;
});

add_filter('manage_offres_posts_custom_column', function ($column, $postId) {
  if ($column === 'date_echeance') {
    $dateEcheance = get_field('date_echeance_offre', $postId);
    if (isset($dateEcheance)) {
      $formatDate = preg_split("#-#", $dateEcheance);
      $dateFormate = $formatDate[2] . "-" . $formatDate[1] . "-" . $formatDate[0];
      echo '<div class="dateEcheance">' . $dateFormate . '</div>';
    }
  }
  if ($column === 'bullet_echeance') {
    $dateEcheance = get_field('date_echeance_offre', $postId);
    if (isset($dateEcheance)) {
      $datetime1 = date_create($dateEcheance);
      $datetime2 = date_create(date('Y-m-d'));
      $interval = date_diff($datetime2, $datetime1);

      if (intval($interval->format('%R%a')) < 0) {
        echo '<div class="bulletCont">';
        echo '<div class="bulletRouge"></div>';
        echo '</div>';
      } else {
        echo '<div class="bulletCont">';
        echo '<div class="bulletVert"></div>';
        echo '</div>';
      }
    }
  }
  if ($column === 'type') {
    $cat = get_the_terms($postId, 'type-offre');
    if (isset($cat) && $cat != false) {
      if ($cat[0]->name == "Stage") {
        echo '<div class="typeOffreRed"><div>Stage</div></div>';
      } else if ($cat[0]->name == "Développeur") {
        echo '<div class="typeOffreGreen"><div>Développeur</div></div>';
      } else if ($cat[0]->name == "Business") {
        echo '<div class="typeOffreBleu"><div>Business</div></div>';
      } else if ($cat[0]->name == "Support") {
        echo '<div class="typeOffreOrange"><div>Support</div></div>';
      } else if ($cat[0]->name == "Freelance") {
        echo '<div class="typeOffreViolet"><div>Freelance</div></div>';
      } else if ($cat[0]->name == "Consultant") {
        echo '<div class="typeOffreGreen"><div>Consultant</div></div>';
      }
    }
  }
  if ($column === 'ref') {
    $dateEcheance = get_field('reference_de_loffre', $postId);
    if (isset($dateEcheance)) {
      echo '<div class="refOffre">' . $dateEcheance . '</div>';
    }
  }
  if ($column === 'lieu') {
    $ville = get_field('ville', $postId);
    if (isset($ville)) {
      echo '<div class="refOffre">' . $ville . '</div>';
    }
  }
  if ($column === 'contrat') {
    $contrat = get_field('contrat', $postId);
    if (isset($contrat)) {
      echo '<div class="refOffre">' . $contrat . '</div>';
    }
  }
}, 10, 2);

add_action('admin_enqueue_scripts', function () {
  wp_enqueue_style('Isia', '/wp-content/themes/Isia/assets/css/admin.css');
});
