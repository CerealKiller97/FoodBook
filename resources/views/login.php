<?php
  if (userLoggedIn()) 
    redirect('recipes');
?>

<div class="container my-5">
  <div class="row">
    <div class="col-sm-9 col-md-10 col-lg-5 mx-auto">

    <div id="notification"></div>
      
      <div class="card card-signin my-5">
        <div class="card-body">
          <h5 class="card-title text-center">Login</h5>
            <div class="form-label-group ">
              <label for="email">Email address</label>
              <input type="text" id="email" class="form-control" placeholder="Email address" autofocus />
              <small id="email-hint" class="form-text"></small>
            </div>

            <div class="form-label-group my-2">
              <label for="password">Password</label>
              <input type="password" id="password" class="form-control" placeholder="Password" />
              <small id="password-hint" class="form-text"></small>
            </div>

            <button id="loginBtn" class="btn btn-success btn-block text-uppercase mt-4">Login</button>
            <?= Token::generate() ?>
            <input type="hidden" id="_previousPage" value=<?= $_SERVER['HTTP_REFERER'] ?? 'recipes' ?> />
        </div>
      </div>
    </div>
  </div>
</div>
