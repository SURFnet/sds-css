
<h5>Available palettes</h5>
<?php
  $palettes = ['blue', 'green', 'neutral', 'orange'];
  $main_weights = ['100', '200', '300', '400', '500'];
  $support_weights = ['100', '400', '500'];

  foreach ($palettes as $palette) {
    echo '<div class="sds--color-palette--' . $palette . '">';
    echo '<h6>' . ucfirst($palette) . '</h6>';
    echo '<div class="demo-row">';
    foreach ($main_weights as $main_weight) {
      echo '<div>';
      echo '<div style="background-color: var(--sds--palette--main-color--' . $main_weight . '); width: 100px; height: 50px;"></div>';
      echo '<p>Main ' . $main_weight .'</p>';
      echo '</div>';
    }
    foreach ($support_weights as $support_weight) {
      echo '<div>';
      echo '<div style="background-color: var(--sds--palette--support-color--' . $support_weight . '); width: 100px; height: 50px;"></div>';
      echo '<p>Support ' . $support_weight .'</p>';
      echo '</div>';
    }
    echo '</div>';
    echo '</div>';
  }
?>
