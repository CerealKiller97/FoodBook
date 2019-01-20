<?php
  $socials = DB::table('socialnetwork');
?>

<div id="social-component" class="col-md-6 col-lg-7 text-center text-md-right">
  <?php foreach ($socials as $social) : ?>    
    <a href="<?= $social->url ?>">
      <ion-icon 
        size="small" 
        name="logo-<?= $social->icon ?>"
        class="text-white mr-2"
        data-toggle="tooltip"
        data-placement="top"
        title="<?= $social->tooltip . ' ' . ucfirst($social->icon) ?>">
      </ion-icon>
    </a>
  <?php endforeach; ?>
</div>