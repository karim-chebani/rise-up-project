<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Rise up project</title>
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
      <a class="navbar-brand" href="#">Rise up   </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?php if($current_nav == 'home') { echo 'active'; } ?>">
            <a class="nav-link" href="/frontend/home">Home</a>
          </li>
          <li class="nav-item <?php if($current_nav == 'show') { echo 'active'; } ?>">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Show</a>
          </li>
          <li class="nav-item <?php if($current_nav == 'add') { echo 'active'; } ?>">
            <a class="nav-link" href="http://localhost:9072/frontend/api/add" tabindex="-1" aria-disabled="true">Add</a>
          </li>
          <li class="nav-item <?php if($current_nav == 'update') { echo 'active'; } ?>">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Update</a>
          </li>
          <li class="nav-item <?php if($current_nav == 'delete') { echo 'active'; } ?>">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Delete</a>
          </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
