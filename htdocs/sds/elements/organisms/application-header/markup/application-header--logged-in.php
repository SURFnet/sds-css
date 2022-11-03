<header class="application-header sds--color-palette--red">
  <div class="page-container">
    <div class="application-header--inner">
      <div class="application-header--branding">
        <div class="branding branding--name-bottom">
          <span class="branding--visual">
            <?php include("./sds/assets/images/logo-surf.svg"); ?>
          </span>
          <span class="branding--textual">Productnaam</span>
        </div>
      </div>
      <nav class="application-header--nav">
        <ul>
          <li class="is-active">
            <a href="#">
              <span class="text">Menu-item 1</span>
              <?php sizeable_svg("functional-icons/arrow-down-2", 11.25/16 . "em", 5.47/16 . "em"); ?>
            </a>
          </li>
          <li>
            <a href="#">Menu-item 2</a>
          </li>
          <li>
            <a href="#">Menu-item 3</a>
          </li>
          <li>
            <a href="#">Menu-item 4</a>
          </li>
        </ul>
      </nav>
      <div class="application-header--user">
        <?php include("./sds/elements/additional/language-switcher/markup/language-switcher.php"); ?>
        <button type="button">
          <?php sizeable_svg("functional-icons/alarm-bell", 18/16 . "em", 18/16 . "em"); ?>
        </button>
        <?php include("./sds/elements/additional/user-info/markup/user-info.php"); ?>
      </div>
    </div>
  </div>
</header>
