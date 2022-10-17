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
  <h1>SURF Design System</h1>

  <div class="text--rich">
    <ul>
      <li>Uses normalize 8.0.1</li>
      <li>One combined css-file <a href="./sds/assets/stylesheets/sds.css" target="_blank"><code>sds.css</code></a></li>
      <li>CSS variables (colors)</li>
      <li>All pixel-based values are applied as rem or em</li>
      <li>No specific focus styling, use browser default</li>
      <li>Transitions to be determined</li>
    </ul>
  </div>

  <?php
    $active_folder = '';

    foreach (glob("./sds/elements/**/**/*.php") as $filename) {
      $parts = pathinfo($filename);

      $dirname = $parts['dirname'];
      $folders = explode('/', $dirname);
      $current_folder = $folders[3];
      $dirname_and_filename = $parts['dirname'] . "/" . $parts['filename'];
      $file_content_php = file_get_contents($dirname_and_filename . ".php");
      $file_content_scss = file_get_contents($dirname_and_filename . ".scss");

      if ($current_folder != $active_folder) {
        echo '<h2>' . ucfirst($current_folder) . '</h2>';
        $active_folder = $current_folder;
      }

      echo '
        <section class="demo-section-' . $folders[4] . '">
          <h3>' . ucfirst($parts['filename']) . '</h3>
      ';

      if (file_exists($dirname . "/_comment.html")) {
        echo '<div class="demo-comment text--rich">';
        include($dirname . "/_comment.html");
        echo '</div>';
      }

      echo '
          <h4>Demo</h4>
          <div class="demo-content">
      ';
      include($dirname_and_filename . ".php");
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

</div>

</body>
</html>
