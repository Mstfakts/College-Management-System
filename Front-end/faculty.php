<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>MEBIS</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="lecturer_index.php">MEBIS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="faculty.php">Faculty</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profileLecturer.php">Profile</a>
            </li>
          </ul>
        </div>
        <a class="navbar-brand"></a>
        <form method="post" action="login.php" class="form-inline">
            <button type="submit" name="log_out" class="btn btn-default btn-sm">

          <span class="glyphicon glyphicon-log-out"></span> Log out</button>
        </form>
      </nav>
      
      <div id="accordion">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                Dining Hall
              </button>
            </h5>
          </div>
      
          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                   <table class="table table-striped" style="margin: auto;">
                  <th scope="col">Soup</th>
                  <th scope="col">Main Dish</th>
                  <th scope="col">Side dish</th>
                  <th scope="col">Dessert</th>
                  <th scope="col">Date</th>
                  <?php 

                    $query = "SELECT * FROM dining";
                    $results = mysqli_query($db, $query);
                    while($row = mysqli_fetch_array($results))
                    { ?>

                      <tr> 
                        <td><?php echo $row['soup']; ?></td>
                        <td><?php echo $row['main_dish']; ?></td>
                        <td><?php echo $row['side_dish']; ?></td>
                        <td><?php echo $row['dessert']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                      </tr>

                   <?php } ?> 

                   
                </table>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Library
              </button>
            </h5>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
                Search for a book:
      
                <form method="post" action="faculty.php" > 
                    <div class="form-group row">
                      <label for="inlineFormInputName1" class="col-sm-2 col-form-label">Book Name</label>
                      <div class="col-sm-10">
                        <input name="book_name" type="text" class="form-control" id="inlineFormInputName1" placeholder="Ex: 'The Lord of the Rings'">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inlineFormInputName2" class="col-sm-2 col-form-label">Author</label>
                      <div class="col-sm-10">
                        <input name="book_author" type="text" class="form-control" id="inlineFormInputName2" placeholder="Ex: 'J. R. R. Tolkien'">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button name="search_book" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                      </div>
                    </div>


                  </form>

                  <?php

                  if(isset($_POST['search_book']))
                  {
                    $name=$_POST['book_name'];
                    $author=$_POST['book_author'];

                    $query = "SELECT * FROM book WHERE book_name = '$name' AND author = '$author'";
                    $results = mysqli_query($db, $query);

                    $row = mysqli_fetch_array($results);
                  

                   ?>

                   <table class="table table-striped" style="margin: auto;">
                     <th>Book</th>
                     <th>Author</th>
                     <th>Campus</th>
                     <th>Status</th>

                     <tr>
                       <td><?php echo $row['book_name']; ?></td>
                       <td><?php echo $row['author']; ?></td>
                       <td><?php echo $row['library_name']; ?></td>
                       <td><?php echo $row['book_status']; ?></td>
                     </tr>
                   </table>

                   <?php }  ?>
            </div>
          </div>
        </div>
      </div>

</body>
</html>