<div class="card">
  <div class="alert alert--status-warning">
    <div class="alert--inner">
      <div class="alert--visual">
        <?php sizeable_svg("functional-icons/alert-triangle", 22.5/16 . "em", 22.5/16 . "em"); ?>
      </div>
      <div class="alert--textual">
        <p>Het gebruik van Eduroam zit op 99%. </p>
      </div>
    </div>
  </div>
  <div class="card--inner">
    <h5 class="space--bottom--1">SURFeduhub</h5>
    <p class="text--body--small">Datadiensten</p>
    <div class="divider space--top--1"></div>
    <div class="card--price-and-contact space--top--1">
      <div class="price">
        <h6 class="space--bottom--1">Prijs p.m.</h6>
        <p class="text--h4">€ 16.000,-</p>
      </div>
      <div class="contact">
        <h6 class="space--bottom--1">SURF contact</h6>
        <?php include("./sds/elements/components/contact-person/markup/contact-person.php"); ?>
      </div>
    </div>
    <div class="space--top--3">
      <h6 class="space--bottom--1">Verbruik</h6>
      <?php include("./sds/elements/additional/table-basic/markup/table-basic.php"); ?>
    </div>
  </div>
</div>
