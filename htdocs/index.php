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

<div class="demo-page page-container">
  <h1>SURF Design System</h1>

  <ul>
    <li>Normalize</li>
    <li>Eén gecombineerde css-file <code>sds.css</code></li>
    <li>CSS variables</li>
    <li>Naamgeving prefixen?</li>
  </ul>

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
        <article>
          <h3>' . ucfirst($parts['filename']) . '</h3>
          <h4>Demo</h4>
      ';

      if (file_exists($dirname . "/comment.html")) {
        echo '<div class="demo-comment">';
        include($dirname . "/comment.html");
        echo '</div>';
      }

      echo '<div class="demo-content">';
      include($dirname_and_filename . ".php");
      echo '</div>';

      echo '
          <h4>Code</h4>
          <details>
            <summary>HTML</summary>
            <xmp>' . $file_content_php . '</xmp>
          </details>
          <details>
            <summary>SASS</summary>
            <xmp>' . $file_content_scss . '</xmp>
          </details>
        </article>
      ';
    }
  ?>

</div>

</body>
</html>
