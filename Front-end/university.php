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
        <a class="navbar-brand" href="student_index.php">MEBIS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="university.php">University</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="student.php">Student</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile.php">Profile</a>
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
      
                <form method="post" action="university.php" > 
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
        <div class="card">
          <div class="card-header" id="headingThree">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Student Clubs
              </button>
            </h5>
          </div>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body">
                  <div class="card-group">
                    <div class="card">
                      <img class="card-img-top" src="https://scontent.fsaw2-2.fna.fbcdn.net/v/t1.0-9/52977665_2034042623344413_4116790474646224896_o.jpg?_nc_cat=105&_nc_sid=730e14&_nc_ohc=OQdRshqb1rIAX8XzCPi&_nc_ht=scontent.fsaw2-2.fna&oh=cfbddfef513fc40c86bca92c5f754bc3&oe=5F118115" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title">Medipol Türk Kızılayı</h5>
                        <form method="post" action="university.php">
                          <button type="submit" class="btn btn-primary" name="participate_kizilay">Participate</button>
                        </form>
                      </div>
                    </div>
                    <div class="card">
                      <img class="card-img-top" src="https://site.ieee.org/sb-medipol/files/2015/01/cropped-IEEEWHATT-1.png" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title">IEEE</h5>
                        <form method="post" action="university.php">
                          <button type="submit" class="btn btn-primary" name="participate_ieee">Participate</button>
                        </form>
                      </div>
                    </div>
                    <div class="card">
                      <img class="card-img-top" src="https://scontent.fsaw2-2.fna.fbcdn.net/v/t1.0-9/10255112_202750493400248_8873659773297450965_n.jpg?_nc_cat=106&_nc_sid=e3f864&_nc_ohc=PzpRWTBfe_YAX-VUXHJ&_nc_ht=scontent.fsaw2-2.fna&oh=bf867f64f07bab504e1e6ba712c4ed58&oe=5F12B64C" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title">Girişimcilik Kulübü</h5>
                        <form method="post" action="university.php">
                          <button type="submit" class="btn btn-primary" name="participate_girisimcilik">Participate</button>
                        </form>
                      </div>
                    </div>
                    <div class="card">
                      <img class="card-img-top" src="https://pbs.twimg.com/profile_images/809668910584889346/79t7M5gb_400x400.jpg" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title">MEC (Management and Economics Clubs)</h5>
                        <form method="post" action="university.php">
                          <button type="submit" class="btn btn-primary" name="participate_mec">Participate</button>
                        </form>
                      </div>
                    </div>
                  </div>
            </div>
          </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingFour">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  Programs
                </button>
              </h5>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
              <div class="card-body">
                <div class="jumbotron">
                    <h1 class="display-4">Mevlana</h1>
                    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                    <hr class="my-4">
                    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                    <p class="lead">
                      <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                    </p>
                  </div>
              </div>
              <div class="jumbotron">
                <h1 class="display-4">Erasmus</h1>
                <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                <hr class="my-4">
                <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                <p class="lead">
                  <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                </p>
              </div>
              <div class="jumbotron">
                <h1 class="display-4">Farabi</h1>
                <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                <hr class="my-4">
                <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                <p class="lead">
                  <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                </p>
              </div>
            </div>
        </div>
      </div>
</body>
</html>