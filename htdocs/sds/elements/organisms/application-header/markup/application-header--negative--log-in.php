<header class="sds--application-header sds--application-header--negative">
  <div class="sds--page-container">
    <div class="sds--application-header--inner">
      <div class="sds--application-header--branding">
        <div class="sds--branding sds--branding--negative sds--branding--name-bottom">
          <span class="sds--branding--visual">
            <?php include("./sds/assets/images/logo-surf.svg"); ?>
          </span>
          <span class="sds--branding--textual">Productnaam</span>
        </div>
      </div>
      <nav class="sds--application-header--nav">
        <ul>
          <li class="is-active">
            <a href="#">Menu-item 1</a>
          </li>
          <li>
            <a href="#">Menu-item 2</a>
          </li>
          <li>
            <a href="#">
              <span class="text">Menu-item 3</span>
              <?php sizeable_svg("functional-icons/arrow-down-2", 11.25/16 . "em", 5.47/16 . "em"); ?>
            </a>
            <ul>
              <li>
                <a href="#">Sub-menu-item 1</a>
              </li>
              <li>
                <a href="#">Sub-menu-item 3</a>
              </li>
              <li>
                <a href="#">Sub-menu-item 4</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#">Menu-item 4</a>
          </li>
        </ul>
      </nav>
      <div class="sds--application-header--user">
        <?php include("./sds/elements/additional/language-switcher/markup/language-switcher.php"); ?>
        <button type="button">
          <?php sizeable_svg("functional-icons/alarm-bell", 18/16 . "em", 18/16 . "em"); ?>
        </button>
        <?php include("./sds/elements/additional/user-info/markup/user-info.php"); ?>
      </div>
    </div>
  </div>
</header>
