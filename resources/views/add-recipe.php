<?php
  if (!userLoggedIn()) {
    redirect('recipes');
  }
?>

<div class="container my-5">
  <div id="notification"></div>
   <div class="row">
       <?php component('recipe-add-form'); ?>
       <?php component('recipe-preview'); ?>
   </div>
</div>
