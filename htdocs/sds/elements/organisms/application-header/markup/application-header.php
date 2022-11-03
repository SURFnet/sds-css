<header class="sds--application-header">
  <div class="sds--page-container">
    <div class="sds--application-header--inner">
      <div class="sds--application-header--branding">
        <div class="sds--branding sds--branding--name-bottom">
          <span class="sds--branding--visual">
            <?php include("./sds/assets/images/logo-surf.svg"); ?>
          </span>
          <span class="sds--branding--textual">Productnaam</span>
        </div>
      </div>
      <nav class="sds--application-header--nav">
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
          <li class="is-open">
            <a href="#">
              <span class="text">Menu-item 4</span>
              <?php sizeable_svg("functional-icons/arrow-down-2", 11.25/16 . "em", 5.47/16 . "em"); ?>
            </a>
            <ul>
              </li>
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
        </ul>
      </nav>
      <div class="sds--application-header--user">
        <button type="button" class="sds--btn sds--btn--small sds--btn--ghost--dark">Login</button>
      </div>
    </div>
  </div>
</header>
