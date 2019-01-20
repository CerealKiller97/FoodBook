<div class="container my-5">
  <h1 class="text-center my-2">Recipes</h1>
  <?php component('searchRecipe'); ?>
  <?= Token::generate() ?>


  <div>
    <div id="recipe-list" class="d-flex justify-content-around">
    
    </div>
    <div id="pagination">
      <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center my-5">
        <li class="page-item">
          <a class="page-link" href="#" tabindex="-1">Previous</a>
        </li>
        <li class="page-item"><a class="page-link paginate active" href="#" data-page="1">1</a></li>
        <li class="page-item"><a class="page-link paginate" href="#" data-page="2">2</a></li>
        <li class="page-item"><a class="page-link paginate" href="#" data-page="3">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </nav>
    </div>
  </div>

  <div id="notification"></div>


</div>