
<div class="container jumbotron">
  <h1 class="jumbotron-heading">Add </h1>
  <p class="lead text-muted">

    This page allows you to add users new users, to the existing list of users.
  </p>
  <p>
    <a href="https://github.com/karim-chebani/rise-up-project" target="_blank" class="btn btn-primary my-2">GitHub repository</a>
  </p>
</div>




<div class="container">
  <?php if ( isset($message['type']) && isset($message['text']) ) { ?>
    <div class="alert <?php if ($message['type'] == 'error') {echo 'alert-danger';} else { echo 'alert-success';} ?>" role="alert">
      <?php echo $message['text']; ?>
    </div>
  <?php } ?>

  <div class="justify-content-center col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h4>User Profile</h4>
                    <hr>
                </div>
            </div>

              <?php
                echo validation_errors();
                echo form_open('http://127.0.0.1:9072/frontend/add/send');
              ?>

              <div class="form-group row">
                <label for="name" class="col-4 col-form-label">First Name*</label>
                <div class="col-8">
                  <?php echo form_input(['name' => 'first_name', 'id' => 'first_name', 'class' => 'form-control here', 'value' => set_value('first_name'), 'placeholder' => 'Karim', 'required' => 'required']); ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="lastname" class="col-4 col-form-label">Last Name*</label>
                <div class="col-8">
                  <?php echo form_input(['name' => 'last_name', 'id' => 'last_name', 'class' => 'form-control', 'value' => set_value('last_name'), 'placeholder' => 'Chebani', 'required' => 'required']); ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="text" class="col-4 col-form-label">Phone*</label>
                <div class="col-8">
                  <?php echo form_input(['name' => 'phone', 'id' => 'phone', 'class' => 'form-control', 'value' => set_value('phone'), 'placeholder' => '+33782202515', 'required' => 'required']); ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-4 col-form-label">Email*</label>
                <div class="col-8">
                  <?php echo form_input(['name' => 'email', 'id' => 'email', 'class' => 'form-control', 'value' => set_value('email'), 'placeholder' => 'karim.chebani@riseup.com', 'required' => 'required']); ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="lastname" class="col-4 col-form-label">Address*</label>
                <div class="col-8">
                  <?php echo form_input(['name' => 'address', 'id' => 'address', 'class' => 'form-control', 'value' => set_value('address'), 'placeholder' => '17 Tech street', 'required' => 'required']); ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="lastname" class="col-4 col-form-label">City*</label>
                <div class="col-8">
                  <?php echo form_input(['name' => 'city', 'id' => 'city', 'class' => 'form-control', 'value' => set_value('city'), 'placeholder' => 'Paris', 'required' => 'required']); ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="lastname" class="col-4 col-form-label">Country*</label>
                <div class="col-8">
                  <?php echo form_input(['name' => 'country', 'id' => 'country', 'class' => 'form-control', 'value' => set_value('country'), 'placeholder' => 'France', 'required' => 'required']); ?>
                </div>
              </div>
              <div class="form-group row">
                <div class="offset-4 col-8">
                  <?php echo form_submit(['type' => 'submit', 'name' => 'add', 'class' => 'btn btn-primary', 'value' => 'Add']); ?>
                </div>
              </div>

  		      </div>
  		    </div>
  		  </div>
  		</div>
  	</div>
</div>
