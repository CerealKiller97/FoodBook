<?php
  if (!userLoggedIn()) {
    redirect('recipes');
  }
?>

<div class="container my-5">
   <div class="row">
      <input type="hidden" id="recipeID" />
      <?= Token::generate() ?>
       <?php component('recipe-add-form'); ?>
       <?php component('recipe-preview'); ?>
   </div>
</div>
