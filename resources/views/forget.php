<div class="container my-5">
  <div class="row">
    <div class="col-sm-9 col-md-10 col-lg-5 mx-auto">
     <div class="card card-signin my-5">
        <div class="card-body">
          <h5 class="card-title text-center">Forget Password</h5>
            <div class="form-label-group my-2">
              <label for="email">Email address</label>
              <input type="text" id="email" class="form-control" placeholder="Email address"  autofocus />
            </div>

            <div class="form-group">
              <button id="loginBtn" name="login-btn" class="btn btn-success btn-block text-uppercase my-2">Login</button>
              <?= Token::generate() ?>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
