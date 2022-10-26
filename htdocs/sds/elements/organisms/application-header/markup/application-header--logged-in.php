<header class="application-header color-palette--red">
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
        <button type="button">
          <?php sizeable_svg("functional-icons/alarm-bell", 18/16 . "em", 18/16 . "em"); ?>
        </button>
        <div class="user-info">
          <div class="user-info--textual">
            <p class="name">Username</p>
            <p class="role text--body--small">Role or Organization</p>
          </div>
          <button type="button" class="user-info--button">
            <?php sizeable_svg("functional-icons/arrow-down-2", 11.25/16 . "em", 5.47/16 . "em"); ?>
          </button>
        </div>
      </div>
    </div>
  </div>
</header>
