<div class="text-field">
  <label for="unique-input-id">Label</label>
  <input id="unique-input-id" class="text-field--input" type="text" name="unique-input-name" placeholder="Placeholder"/>
</div>
<div class="text-field">
  <input id="unique-input-id--2" class="text-field--input" type="text" name="unique-input-name--2" placeholder="Placeholder" disabled/>
</div>
<div class="text-field text-field--status-error">
  <input id="unique-input-id--3" class="text-field--input" type="text" name="unique-input-name--3" placeholder="Placeholder"/>
  <p class="text-field--message">Error message</p>
</div>
<div class="text-field text-field--has-icon">
  <div class="text-field--shape">
    <div class="text-field--input-and-icon">
      <input id="unique-input-id--4" class="text-field--input" type="search" name="unique-input-name--4" placeholder="Placeholder"/>
      <span class="text-field--icon">
        <?php sizeable_svg("functional-icons/search", 15/16 . "em", 15/16 . "em"); ?>
      </span>
    </div>
    <button type="button" class="btn btn--primary">Search</button>
  </div>
  <p class="text-field--message">Helper text</p>
</div>
