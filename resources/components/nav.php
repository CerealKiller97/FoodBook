<?php
  $links = DB::table('navigation');
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <img src="images/shards-logo.svg" alt="FoodBook logo" class="mr-2" height="30" />
  <a class="navbar-brand" href="<?= getDomain() ?>">FoodBook</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse mr-auto" id="nav">
    <ul class="navbar-nav mr-auto">
      <?php foreach($links as $link) : ?>
        <li class="nav-item <?= ($page === strtolower($link->link) ? 'active' : '') ?>">
          <a class="nav-link" href="?page=<?=  strtolower($link->link) ?>"><?= $link->link ?></a>
        </li>
      <?php endforeach; ?>

      <?php if (adminLoggedIn()) : ?>
        <li class="nav-item">
          <a class="nav-link" href="admin/">Admin</a>
        </li>
      <?php endif; ?>
      
    </ul>
  <?php if (!userLoggedIn()) : ?>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a href="?page=login" class="btn btn-light">Login</a>
        <a href="?page=register" class="btn btn-dark">Register</a>
      </li>
    </ul>


<?php else: ?>
  <ul class="navbar-nav nav-flex-icons">
<li class="nav-item">
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" id="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <ion-icon name="person"></ion-icon>
      <?= auth()->username ?>
    </a>
  <div class="dropdown-menu dropdown-default p-0" aria-labelledby="dropdown">
  <a class="dropdown-item bg-success text-white" href="?page=add-recipe">
    <ion-icon 
      name="pizza"
      class="pr-2">
    </ion-icon> Add Recipe 
    </a>
    <a class="dropdown-item" href="?page=profile">
    <ion-icon 
      name="person"
      class="pr-2">
    </ion-icon> Profile
    </a>
    <a class="dropdown-item" href="resources/components/logout.php">
      <ion-icon 
        name="log-out" 
        class="pr-2">
      </ion-icon> Logout 
    </a>
  </div>
</li>
</li>
  <?php endif; ?>
  </div>
</nav>

<!-- NIGHT MODE 
<div class="custom-control custom-toggle d-block my-2">
        <input type="checkbox" id="mode" class="custom-control-input" />
        <label class="custom-control-label" for="mode">Night Mode</label>
      </div>
 -->