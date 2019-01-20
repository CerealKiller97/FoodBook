<?php
  if (userLoggedIn()) 
    redirect('recipes');
?>

<div class="container my-5">
  <div class="row">
    <div class="col-sm-9 col-md-10 col-lg-5 mx-auto">
      <div class="card card-signin flex-row my-5">
        <div class="card-body">
          <h5 class="card-title text-center">Register</h5>
          
          <div id="notification"></div>

          <div class="form-label-group my-2">
              <label for="fullname">First name</label>
              <input type="text" id="reg-firstname" class="form-control" placeholder="First name" autofocus />
              <small id="firstname-hint" class="form-text"></small>
            </div>

            <div class="form-label-group my-2">
              <label for="fullname">Last name</label>
              <input type="text" id="reg-lastname" class="form-control" placeholder="Last name" />
              <small id="lastname-hint" class="form-text"></small>
            </div>

            <div class="form-label-group my-2">
              <label for="username">Username</label>
              <input type="text" id="reg-username" class="form-control" placeholder="Username" />
              <small id="username-hint" class="form-text"></small>
            </div>

            <div class="form-label-group my-2">
              <label for="email">Email address</label>
              <input type="email" id="reg-email" class="form-control" placeholder="Email address" />
              <small id="email-hint" class="form-text"></small>
            </div>
            
            <hr>

            <div class="form-label-group my-2">
              <label for="password">Password</label>
              <input type="password" id="reg-password" class="form-control" placeholder="Password" />
              <small id="password-hint" class="form-text"></small>
            </div>
            
            <div class="form-label-group my-2">
              <label for="confirm-password">Confirm password</label>
              <input type="password" id="reg-confirm" class="form-control" placeholder="Password" />
              <small id="confirm-hint" class="form-text"></small>
            </div>
            <?= Token::generate() ?>
            <button id="register-btn" class="btn btn-lg btn-success btn-block text-uppercase">Register</button>
        </div>
      </div>
    </div>
  </div>
</div>
