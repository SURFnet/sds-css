<!doctype html>
<html lang="nl" dir="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="SURF Design System - Demo site" />
  <meta name="generator" content="LimoenGroen" />
  <title>SURF Design System | Demo en Development</title>
  <link rel="stylesheet" type="text/css" href="./assets/index.css">
  <link rel="stylesheet" type="text/css" href="./sds/assets/stylesheets/sds.css">
</head>
<body>

<div class="demo-page page-container color-palette--blue">
  <div class="demo-page--main-nav">
    <ul>
      <?php
        // Quicklinks to existing SDS elements.
        foreach (glob("./sds/elements/**/**/") as $foldername) {
          $parts = pathinfo($foldername);
          echo '<li><a href=#' . $parts["filename"] . '>' . ucfirst($parts["filename"]) . '</a></li>';
        }
      ?>
    </ul>
  </div>

  <h1>SURF Design System</h1>

  <div class="text--rich">
    <ul>
      <li>Uses normalize 8.0.1</li>
      <li>One combined css-file <a href="./sds/assets/stylesheets/sds.css" target="_blank"><code>sds.css</code></a></li>
      <li>CSS variables (for colors and spacing)</li>
      <li>All pixel-based values are applied as rem or em</li>
      <li>No specific focus styling, use browser default</li>
      <li>Mobile design to be determined</li>
      <li>Interaction (javascript) to be determined</li>
      <li>Transitions to be determined</li>
    </ul>
  </div>

  <?php
    // Existing SDS elements.
    $active_folder = '';

    foreach (glob("./sds/elements/**/**/") as $foldername) {
      $parts = pathinfo($foldername);
      $dirname = $parts['dirname'];
      $folders = explode('/', $dirname);
      $current_folder = $folders[3];
      $dirname_and_filename = $foldername . $parts['filename'];
      $dirname_markup_files = $foldername . "markup/*.php";
      $file_content_php = '';
      $file_content_scss = file_get_contents($dirname_and_filename . ".scss");
      foreach (glob($dirname_markup_files) as $markup_file) {
        $file_content_php .= file_get_contents($markup_file);
      }
      if ($current_folder != $active_folder) {
        echo '<h2>' . ucfirst($current_folder) . '</h2>';
        $active_folder = $current_folder;
      }

      echo '
        <section id=' . $parts['filename'] . ' class="demo-section-' . $parts['filename'] . '">
          <h3>' . ucfirst($parts['filename']) . '</h3>
      ';
      if (file_exists($foldername . "_comment.html")) {
        echo '<div class="demo-comment text--rich">';
        include($foldername . "_comment.html");
        echo '</div>';
      }

      echo '
          <h4>Demo</h4>
          <div class="demo-content">
      ';
      foreach (glob($dirname_markup_files) as $foldername) {
        include($foldername);
      }
      echo '</div>';

      echo '
          <h4>Code</h4>
          <details>
            <summary>HTML</summary>
            <xmp>' . $file_content_php . '</xmp>
          </details>
          <details>
            <summary>SCSS</summary>
            <xmp>' . $file_content_scss . '</xmp>
          </details>
        </section>
      ';
    }
  ?>

  <?php
    function sizeable_svg($path, $width = null, $height = null) {
      $base_path = file_get_contents("./sds/assets/images/" . $path . ".svg");
      if ($width && $height) {
        $adjust_width = preg_replace("/( width)=\".*?\"/", "\${1}=\"$width\"", $base_path );
        $adjust_width_and_height = preg_replace("/( height)=\".*?\"/", "\${1}=\"$height\"", $adjust_width );
        echo ($adjust_width_and_height);
      } else {
        echo ($base_path);
      }
    }
  ?>

</div>

</body>
</html>
