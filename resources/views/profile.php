<?php
  if (!userLoggedIn()) {
    redirect('/');
  }
?>

<div class="container-fluid my-5">
  <div class="row">
    <div class="col-lg-6 offset-lg-3">
        <ul class="nav nav-pills  nav-justified" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Recipes</a>
          </li>
        </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="mt-5">
              <h4>Profile</h4>
              <input id="userID" type="hidden" value="<?= auth()->id ?>" />
              <div id="notification"></div>
              <div class="form-group">
                <label for="exampleInputEmail1">First Name</label>
                <input type="email" class="form-control" id="firstname" value="<?= auth()->firstname ?>" /> 
                <small id="emailHelp" class="form-text text-muted"></small>
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Last Name</label>
                <input type="text" class="form-control" id="lastname" value="<?= auth()->lastname ?>" />
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Username</label>
                <input type="text" class="form-control" id="username" value="<?= auth()->username ?>" />
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="text" class="form-control" id="email" value="<?= auth()->email ?>" />
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="password" />
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Member since</label>
                <input type="text" class="form-control" value="<?= auth()->created ?>" disabled />
              </div>
              <button class="btn btn-primary">Update profile</button>
              <button id="delete-user" class="btn btn-danger" data-id="<?= auth()->id ?>">Delete profile</button>
              <?= Token::generate() ?>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
          <div class="mt-5">
            <h4>Recipes</h4>
            <div id="notification-recipes"></div>
            <div id="recipes" class="d-flex justify-content-around">

            </div>      
        </div>
      </div>  
    </div>
    </div>
  </div>
</div>