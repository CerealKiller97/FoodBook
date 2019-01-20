<div class="col-lg-8">
  <h6 class="text-center">Recipe Form</h6> 

  <div class="form-group row">
    <label for="title" class="col-4 col-form-label">Title</label> 
    <div class="col-8">
        <input id="title" type="text" placeholder="Recipe title" class="form-control" />
    </div>
  </div>

  <div class="form-group row">
    <label for="ingridents" class="col-4 col-form-label">Ingridients</label>
    <div class="col-8">
      <input id="ingridients" type="text" placeholder="Ingridients" class="form-control" />
    </div>
  </div>

  <div class="form-group row"> 
    <label for="description" class="col-4 col-form-label">Description</label> 
    <div class="col-8">
    <textarea name="content" id="editor"></textarea>
    </div>
  </div>

    <label for="">Aproximated time for preparing a meal (mins)</label>
    <div id="shards-custom-slider">
      <input id="approximatedTime" type="hidden" class='custom-slider-input' name="custom-slider-value-1" >
    </div>

    <div class="custom-file">
  <input type="file" class="custom-file-input" id="customFileLang" lang="es">
  <label class="custom-file-label" for="customFileLang">Recipe image</label>
</div>

  <div class="form-group mt-4">
    <button id="btn" class="btn btn-primary btn-block">Add Recipe</button>
  </div>
</div>
