<div id="recipe" class="container my-5">
  
</div>

<?= Token::generate() ?>

<div class="container">
  <?php if (userLoggedIn()) : ?>
    <h4>Comment section</h4>
    <div id="comments">
    
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Comment</label>
      <textarea id="comment" class="form-control mb-4" placeholder="Enter your comment..."></textarea>
      <button class="btn btn-success">Comment</button>
    </div>
    <?php else: ?>
    <h4>In order to comment you must be logged in</h4>
  <?php endif; ?>
</div>