

<div class="container">

  <div class="container jumbotron">
    <h1 class="jumbotron-heading">Rise up project</h1>
    <p class="lead text-muted">
      Built with 'slim framework 3.12' as a backend API and 'CodeIngiter 3.1.11' as a frontend API client.
      README.md available on the GitHub repository for more information.
      </br>
      This page displays a list of available users. Click on a name to perfome actions.
      </br>
      Or click on "Add" on the nav bar to add a user
    </p>
    <p>
      <a href="https://github.com/karim-chebani/rise-up-project" target="_blank" class="btn btn-primary my-2">GitHub repository</a>
      <a href="#" class="btn btn-secondary my-2">Secondary action</a>
    </p>
  </div>


  <table class="table table-hover">
    <?php if ( isset($message['type']) && isset($message['text']) ) { ?>
      <div class="alert <?php if ($message['type'] == 'error') {echo 'alert-danger';} else { echo 'alert-success';} ?>" role="alert">
        <?php echo $message['text']; ?>
      </div>
    <?php } ?>

    <thead class="thead-dark">
      <tr>
        <th>Id</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Address</th>
        <th>City</th>
        <th>Country</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($user_list as $user):?>
          <tr>
            <td><?php echo $user['id'];?></td>
            <td><a href="http://127.0.0.1:9072/frontend/show/<?php echo $user['id'];?>"><?php echo $user['first_name'] ;?></a></td>
            <td><?php echo $user['last_name'] ;?></td>
            <td><?php echo $user['phone'] ;?></td>
            <td><?php echo $user['email'] ;?></td>
            <td><?php echo $user['address'] ;?></td>
            <td><?php echo $user['city'] ;?></td>
            <td><?php echo $user['country'] ;?></td>
          </tr>
      <?php endforeach;?>
    </tbody>
  </table>

</div> <!-- /container -->
