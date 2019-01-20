<footer class="page-footer font-small bg-dark mt-5 pt-0">
  <div class="bg-success">
    <div class="container">
      <div class="row py-4 d-flex align-items-center">
        <div class="col-md-6 col-lg-5 text-center text-md-left mb-2 mb-md-0">
          <h6 class="mb-0 text-uppercase font-weight-light text-light">Get connected with us on social networks!
          </h6>
        </div>

        <?php component('socialnetworks'); ?>

      </div>
    </div>
  </div>


<div  class="container mt-4 mb-4 text-center text-md-left">
  <div class="row mt-3">

    <div class="col-md-3 col-lg-4 col-xl-3 mb-4">
      <h6 class="text-uppercase font-weight-light text-light">
        <strong>FoodBook</strong>
      </h6>
      <hr class="primary-color mb-4 mt-0 d-inline-block mx-auto " style="width: 60px;">
      <p class="text-justify">Here you can use rows and columns here to organize your footer content. Lorem ipsum dolor sit amet, consectetur
        adipisicing elit.</p>
    </div>

    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
      <h6 class="text-uppercase font-weight-light text-light">
        <strong>Links</strong>
      </h6>
      <hr class="primary-color mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
      <?php foreach ($links as $link) : ?>
        <p><a href="<?= $URL . '/' . strtolower($link->link) ?>"><?= $link->link ?></a></p>
     <?php endforeach; ?>
    </div>


    <div class="col-md-4 col-lg-3 col-xl-3">
      <h6 class="text-uppercase font-weight-light text-light">
        <strong>Contact</strong>
      </h6>
      <hr class="primary-color mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
      <p>
        <ion-icon size="small" name="home" class="text-white mr-2"></ion-icon> New York, NY 10012, US</p>
      <p>
        <ion-icon size="small" name="mail" class="text-white mr-2"></ion-icon> info@example.com</p>
      <p>
      <ion-icon size="small" name="call" class="text-white mr-2"></ion-icon> + 01 234 567 88</p>
      <p>
    </div>
  </div>
</div>

<div class="footer-copyright py-3 text-center text-white">
  © <?= date('Y') ?> Copyright:
  <a id="author-link" href="https://cerealkiller97.github.io/portfolio">
    <strong class="text-success"> Stefan Bogdanovic</strong>
  </a>
</div>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/ionicons@4.4.8/dist/ionicons.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
  <script async src="js/shards.min.js"></script>
  <script async src="js/demo.min.js"></script>
  <script src="js/utils.js"></script>
  <script src="js/components.js"></script>

<?php 
  switch ($page) :
      case 'home':
        echo "<script src='js/main.js'></script>";
        break;

      case 'login':
        echo "<script src='js/login.js'></script>";
        break;

      case 'register':
        echo "<script src='js/register.js'></script>";
        break; 

      case 'add-recipe':
      echo "<script src='http://cloud.tinymce.com/5-testing/tinymce.min.js'></script>";
      echo "<script async src='js/add-recipe.js'></script>";
        break;

      case 'recipes':
        echo "<script src='js/recipes.js'></script>";
        break; 

      case 'recipe':
        echo "<script src='js/recipe.js'></script>";
        break;   

      case 'contact':
        echo "<script src='js/contact.js'></script>";
        break;

      case 'profile':
        echo "<script src='js/profile.js'></script>";
        break;
      // default:
      //   echo "<script src='js/main.js'></script>";
      //   break; 
  endswitch;
?>
</body>
</html>