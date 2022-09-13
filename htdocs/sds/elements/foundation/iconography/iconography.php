<h5>Functional icons</h5>
<div class="grid-container">
  <?php
   foreach (glob("./sds/assets/images/functional-icons/*.svg") as $filename) {
    $parts = pathinfo($filename);
    echo '<p class="col-md--span-2 col-lg--span-3 demo-row">' . file_get_contents($filename);
    echo '<span>' . $parts['filename'] . '</span>';
    echo '</p>';
   }
  ?>
</div>
<h5>Illustrative icons</h5>
<div class="grid-container">
  <?php
   foreach (glob("./sds/assets/images/illustrative-icons/*.svg") as $filename) {
    $parts = pathinfo($filename);
    echo '<p class="col-md--span-2 col-lg--span-3 demo-row">' . file_get_contents($filename);
    echo '<span>' . $parts['filename'] . '</span>';
    echo '</p>';
   }
  ?>
</div>
