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

      <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" id="exam-tab" data-toggle="tab"  href="#exam" aria-controls="exam">Courses</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="students-tab" data-toggle="tab"  href="#students" aria-controls="students">Students</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="myprofile-tab" data-toggle="tab"  href="#myprofile" aria-controls="myprofile">My Profile</a>
      </li>
      </ul>
      <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade" id="exam" role="tabpanel" aria-labelledby="exam-tab">
            <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Course Name</th>
                <th scope="col">Class</th>
              </tr>
            </thead>

            <tbody>
              
                <?php

                $cur_email = $_SESSION['email'];
                
                $query = "SELECT * FROM lecturer WHERE email = '$cur_email'";

                $results = mysqli_query($db, $query); 

                $row = mysqli_fetch_array($results); 

                $l_name =  $row['lecturer_name'];   //hocayı buldu

                $query2 = "SELECT * FROM course WHERE lecturer = '$l_name'";
                $results2 = mysqli_query($db, $query2); //derslerin tuple ları buldu

                while($row2 = mysqli_fetch_array($results2))
                {
                  ?>
                  <tr>
                  <td scope="row"><?php echo $row2['course_name'] ?></td>
                  <td scope="row"><?php echo $row2['class_no'] ?></td> 
                  </tr>
                <?php } ?>

                 
              
            </tbody>
          </table>
        </div>

        <div class="tab-pane fade" id="students" role="tabpanel" aria-labelledby="students-tab">
          <?php

              $cur_email = $_SESSION['email'];
                
                $query = "SELECT * FROM lecturer WHERE email = '$cur_email'";

                $results = mysqli_query($db, $query); 

                $row = mysqli_fetch_array($results); 

                $l_name =  $row['lecturer_name']; 
                ?>

            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" id="undergrad-tab" data-toggle="tab"  href="#undergrad" aria-controls="undergrad">Undergrad</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="grad-tab" data-toggle="tab"  href="#grad" aria-controls="grad">Graduation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="phd-tab" data-toggle="tab"  href="#phd" aria-controls="phd">Ph.D.</a>
                </li>
            </ul>
            <div class="tab-pane fade" id="undergrad" role="tabpanel" aria-labelledby="undergrad-tab">
                <table class="table table-striped">
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Student ID</th>
                        <th scope="col">Scholarship</th>
                        <th scope="col">Grade</th>
                        <th scope="col">Department</th>
                        <th scope="col">Email</th>
                      </tr>
                      <?php 

                        $query2 = "SELECT * FROM student WHERE advisor_name = '$l_name' and degree = 'Undergrad'";
                        $results2 = mysqli_query($db, $query2);
                        while($row2 = mysqli_fetch_array($results2))
                        { ?>

                          <tr> 
                            <td><?php echo $row2['name']; ?></td>
                            <td><?php echo $row2['student_id']; ?></td>
                            <td><?php echo $row2['scholarship']; ?></td>
                            <td><?php echo $row2['grade']; ?></td>
                            <td><?php echo $row2['department']; ?></td>
                            <td><?php echo $row2['email']; ?></td>
                          </tr>

                       <?php } 

                      ?> 
                    
                  </table>
            </div>
            <div class="tab-pane fade" id="grad" role="tabpanel" aria-labelledby="grad-tab">
                <table class="table table-striped">
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Student ID</th>
                        <th scope="col">Scholarship</th>
                        <th scope="col">Grade</th>
                        <th scope="col">Department</th>
                        <th scope="col">Email</th>
                      </tr>
                      <?php 

                        $query2 = "SELECT * FROM student WHERE advisor_name = '$l_name' and degree = 'Grad'";
                        $results2 = mysqli_query($db, $query2);
                        while($row2 = mysqli_fetch_array($results2))
                        { ?>

                          <tr> 
                            <td><?php echo $row2['name']; ?></td>
                            <td><?php echo $row2['student_id']; ?></td>
                            <td><?php echo $row2['scholarship']; ?></td>
                            <td><?php echo $row2['grade']; ?></td>
                            <td><?php echo $row2['department']; ?></td>
                            <td><?php echo $row2['email']; ?></td>
                          </tr>

                       <?php } 

                      ?> 
                    
                  </table>
            </div>
            <div class="tab-pane fade" id="phd" role="tabpanel" aria-labelledby="phd-tab">
                <table class="table table-striped">
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Student ID</th>
                        <th scope="col">Scholarship</th>
                        <th scope="col">Grade</th>
                        <th scope="col">Department</th>
                        <th scope="col">Email</th>
                      </tr>
                      <?php 

                        $query2 = "SELECT * FROM student WHERE advisor_name = '$l_name' and degree = 'Phd'";
                        $results2 = mysqli_query($db, $query2);
                        while($row2 = mysqli_fetch_array($results2))
                        { ?>

                          <tr> 
                            <td><?php echo $row2['name']; ?></td>
                            <td><?php echo $row2['student_id']; ?></td>
                            <td><?php echo $row2['scholarship']; ?></td>
                            <td><?php echo $row2['grade']; ?></td>
                            <td><?php echo $row2['department']; ?></td>
                            <td><?php echo $row2['email']; ?></td>
                          </tr>

                       <?php } 

                      ?> 
                    
                  </table>
            </div>
        </div>

        <div class="tab-pane fade" id="myprofile" role="tabpanel" aria-labelledby="myprofile-tab">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="http://leblebiakademi.com/wp-content/uploads/2018/08/student-3500990_1920-e1533751134585-300x169.jpg" alt="Card image cap">
            <div class="card-body">
              <?php

              $cur_email = $_SESSION['email'];
                
                $query = "SELECT * FROM lecturer WHERE email = '$cur_email'";

                $results = mysqli_query($db, $query); 

                $row = mysqli_fetch_array($results); 

                $l_name =  $row['lecturer_name']; 
                ?>
                  <h5 class="card-title"><?php echo $row['lecturer_name']; ?></h5>
              
            </div>
              <div id="accordion">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Information
                        
                      </button>
                    </h5>
                  </div>
              
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?php echo $row['email']; ?></li>
                        <li class="list-group-item"><?php echo $row['birthdate']; ?></li>
                        <li class="list-group-item"><?php echo $row['role']; ?></li>
                        <li class="list-group-item"><?php echo $row['degree']; ?></li>
                      </ul>
                    </div>
                  </div>
                </div>

              </div>
          </div>
        </div>

      </div>
      
</body>
</html>