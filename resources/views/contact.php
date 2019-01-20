<div class="container contact-form my-5">
  <h3>Drop Us a Message</h3>
  <div class="row">
      <div class="col-md-6">
          <div class="form-group">
              <input type="text" name="txtName" class="form-control" placeholder="Your Name *" />
          </div>
          <div class="form-group">
              <input type="text" name="txtEmail" class="form-control" placeholder="Your Email *" />
          </div>
          <div class="form-group">
              <button id="contact" class="btn btn-primary" value="Send Message">Send Message</button>
          </div>
      </div>
      <div class="col-md-6">
          <div class="form-group">
              <textarea name="txtMsg" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
          </div>
          <?= Token::generate() ?>
      </div>
  </div>
</div>