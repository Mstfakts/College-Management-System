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

      <div class="card" style="width: 20rem;">
        <img class="card-img-top" src="http://leblebiakademi.com/wp-content/uploads/2018/08/student-3500990_1920-e1533751134585-300x169.jpg" alt="Card image cap">
        <div class="card-body">

            <?php  
            
            $cur_email = $_SESSION['email'];
            $query = "SELECT * FROM student WHERE email = '$cur_email'";

            $results = mysqli_query($db, $query);

            $student = mysqli_fetch_array($results); ?>

          
            <h5 class="card-title"><?php echo $student['name']; ?></h5>


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
                    <li class="list-group-item"><?php echo $student['email']; ?></li>
                    <li class="list-group-item"><?php echo $student['birthdate']; ?></li>
                    <li class="list-group-item"><?php echo $student['department']; ?></li>
                    <li class="list-group-item"><?php echo $student['scholarship']; echo " | "; echo $student['degree'];?></li>
                    <li class="list-group-item"><?php echo $student['grade']; echo ". grade" ?></li>
                    <li class="list-group-item">
                    <?php
                      $cur_email = $_SESSION['email'];
                      $st_id = $student['student_id'];
                      $query = "SELECT * FROM student_past_courses WHERE student_id = '$st_id'";
                      $results = mysqli_query($db, $query);
                      $total_grade = 0;
                      $total_course = 0;
                      
                      while($row = mysqli_fetch_array($results))
                      {
                        $total_grade = $total_grade + $row['final_grade'];
                        $total_course = $total_course + 1;
                      }

                        $mean = $total_grade/$total_course;
                        echo "GPA: "; echo round($mean/25,3);
                      ?>
                        
                      </li>
                    <li class="list-group-item"><?php echo "Student id: "; echo $student['student_id']; ?></li>
                    <li class="list-group-item"><?php echo "Role: "; echo $student['emp_type']; ?></li>
                    <li class="list-group-item">Advisor:
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <?php echo $student['advisor_name'];  ?>
                        </button>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    My Library
                  </button>
                </h5>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                  <ul class="list-group list-group-flush">
                    <?php 

                      $st_id = $student['student_id'];

                      $query = "SELECT * FROM student_book WHERE student_id = '$st_id' ";
                      $results = mysqli_query($db, $query);
                      while($row = mysqli_fetch_array($results))
                      { ?>
                    <li class="list-group-item"> 

                        <?php 
                          echo $row['book_name']; ?>
                         
                      </li>  <?php  }?>
                  </ul>  
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Memberships
                  </button>
                </h5>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                  <ul class="list-group list-group-flush">

                    <?php 

                      $st_id = $student['student_id'];

                      $query = "SELECT * FROM student_club_participants WHERE participant_id = '$st_id' ";
                      $results = mysqli_query($db, $query);
                      while($row = mysqli_fetch_array($results))
                      {

                      $leader = $row['leader_id'];

                      $query = "SELECT * FROM student_club WHERE leader_id = '$leader' ";
                      $results2 = mysqli_query($db, $query);
                      $club = mysqli_fetch_array($results2);   
                       ?>
                    <li class="list-group-item"><?php echo $club['club_name'];?> </li> <?php   }?>
                  </ul>
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
                    <ul class="list-group list-group-flush">
                      <?php 

                      $st_id = $student['student_id'];

                      $query = "SELECT * FROM program WHERE student_id = '$st_id' ";
                      $results = mysqli_query($db, $query);
                      while($row = mysqli_fetch_array($results))
                      { ?>

                       <?php echo $row['program_name']; echo " | "; echo $row['other_uni_name']; ?> 
                        

                        <?php } ?>
                    </ul>
                </div>
                </div>
              </div>
          </div>
      </div>

      <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo $student['advisor_name']; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                ...
                </div>
                <div class="modal-footer">
                  <?php 
                $advisor = $student['advisor_name'];
                $query = "SELECT * FROM lecturer WHERE lecturer_name = '$advisor'";
                $results = mysqli_query($db, $query);
                $row = mysqli_fetch_array($results);

                $website = $row['website'];
                 ?>
                <a href= <?php echo $website;?> "" role="button" class="btn btn-primary" target="_blank">Web Site</a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </div>
            </div>
        </div>
</body>
</html>