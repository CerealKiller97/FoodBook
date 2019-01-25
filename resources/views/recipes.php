<div class="container my-5">
  <h1 class="text-center my-5">Recipes</h1>
  <?php //component('searchRecipe'); ?>
  <?= Token::generate() ?>
  <div>

  <div class="spinner"></div>

  <!-- <div id="progress-indicator" class="progress progress-sm my-5">
  <div id="progress" class="progress-bar" role="progressbar" data-percentage="60" style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div> -->


    <div id="recipe-list" class="d-flex justify-content-around">
    
    </div>
    <div id="pagination">
      <nav aria-label="Page navigation example">
      <ul id="pagination-links" class="pagination justify-content-center my-5">
      </ul>
    </nav>
    </div>
  </div>
  <div id="notification"></div>
</div>