<?php

function convertImageBase64($pathImage, $convert = true)
{
  if ($convert) {

    try {
      $pathImage = get_template_directory_uri() . "/assets/css/images/" . $pathImage;
      $type = pathinfo($pathImage, PATHINFO_EXTENSION);
      if ($type == "svg") {
        $type = "svg+xml";
      }
      $data = file_get_contents($pathImage);
      $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
      return $base64;
    } catch (Exception $e) {
      $pathImage = get_template_directory_uri() . "/assets/css/images/" . $pathImage;
      return $pathImage;
    }
  } else {
    $pathImage = get_template_directory_uri() . "/assets/css/images/" . $pathImage;
    return $pathImage;
  }
}

function add_css_file($fileName)
{
    echo '<link rel="stylesheet" href="' . get_template_directory_uri() . '/assets/css/' . $fileName . '">';
}