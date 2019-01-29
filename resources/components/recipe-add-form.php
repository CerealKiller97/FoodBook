<div class="col-lg-8">
  <h6 class="text-center">Recipe Form</h6> 

  <input type="hidden" id="_userID" value="<?= auth()->id ?>" />
  
  <div class="form-group row">
    <label for="title" class="col-4 col-form-label">Title</label> 
    <div class="col-8">
        <input id="title" type="text" placeholder="Recipe title" class="form-control" />
    </div>
  </div>

  <div class="form-group row">
    <label for="ingridents" class="col-4 col-form-label">Ingridients</label>
    <div class="col-8">
      <input id="ingridients" type="text" placeholder="Press enter to add ingridient" class="form-control" />
    </div>
  </div>

    <div id="ingridientsList"></div>

  <div class="form-group row"> 
    <label for="description" class="col-4 col-form-label">Description</label> 
    <div class="col-8">
      <textarea name="content" id="editor"></textarea>
    </div>
  </div>

  <div class="form-group row">
    <label for="customRange1">Preparation time:</label> 
    <span id="mins" class="ml-4"></span>
    <input type="range" class="custom-range" id="time" value="0" />
  </div>

  <div class="custom-file">
    <input type="file" class="custom-file-input" id="recipeImage" />
    <label class="custom-file-label" for="customFileLang">Recipe image</label>
</div>

  <div class="form-group mt-4">
    <button id="btn" class="btn btn-success btn-block">Add Recipe</button>
  </div>

  <div id="errors" class="my-5"></div>

</div>

<?= Token::generate() ?>

