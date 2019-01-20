<!-- <div class="container my-5">
  <div class="row">
    <?= '' #Token::generate() ?>
    <div class="col-lg-6 offset-lg-3">
      <h1 class="text-center font-weight-light">Search recipe</h1>
      <div class="form-group">
        <label for="search">Search</label>
        <input type="text" id="search" class="form-control" placeholder="Search..." />
        <small id="helpId" class="text-muted"></small>
        <button class="btn btn-sucess">Search</button>
      </div>
    </div>
  </div>
</div> -->


<form class="form-inline d-table my-5 mx-auto">
  <div class="form-group">
    <input class="form-control border-0 mr-3 mb-2 mr-sm-0" type="text" placeholder="Search recipe..." />
    <button class="btn btn-success mb-2 ml-2">Search</button>
  </div>
  <?= Token::generate() ?>
</form>