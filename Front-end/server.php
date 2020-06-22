<?php 
session_start();

$db = mysqli_connect('localhost', 'root', '', 'mebis');

if (isset($_POST['register_user'])) {							//Register User

  $name = mysqli_real_escape_string($db, $_POST['name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $acc_type = mysqli_real_escape_string($db, $_POST['acc_type']);

  $user_check_query = "SELECT * FROM visitor WHERE name='$name' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
    if ($user) { 

      if ($user['email'] == $email) {
        $register_message = "The user already registered the system!";
        echo "<script type='text/javascript'>alert('$register_message');</script>";
    }
  }
  else
  {
  	$password = md5($password_1);

    $query = "INSERT INTO visitor (name, email, password, phone, type) 
          VALUES('$name', '$email', '$password', '$phone', '$acc_type')";
    mysqli_query($db, $query);
    echo "<script type='text/javascript'>alert('Successfully registered'); 
    window.location.href='login.php'; </script>";
  }


}

if (isset($_POST['login_lecturer']))           // Lecturer login
{

  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  $password = md5($password);
  $query = "SELECT * FROM visitor WHERE email='$email'";
  $results = mysqli_query($db, $query);


  if(mysqli_num_rows($results) == 0)
  {

    echo "<script type='text/javascript'>alert('User not found!');</script>";

  }
  else if (isset($email) and isset($password) )
  {

    $row = mysqli_fetch_array($results); 
    $username = $row['name'];
    $account_type = $row['type'];


    if($password != $row['password'])
    {
      echo "<script type='text/javascript'>alert('Password is wrong, Please try again!');</script>";
    }
    else if($account_type == 'lecturer' and $password == $row['password'])
    {
      $_SESSION['name'] = $username;
      $_SESSION['email'] = $email;
    
      echo "<script type='text/javascript'>alert('Login Success, Welcome ' + '$username'); 
      window.location.href='lecturer_index.php'; </script>";
    }
    else
    {
      echo "<script type='text/javascript'>alert('The account type is not lecturer!');</script>";
    }
  }
}

if (isset($_POST['login_student']))           // Student login
{

  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  $password = md5($password);
  $query = "SELECT * FROM visitor WHERE email='$email'";
  $results = mysqli_query($db, $query);


  if(mysqli_num_rows($results) == 0)
  {

    echo "<script type='text/javascript'>alert('User not found!');</script>";

  }
  else if (isset($email) and isset($password) )
  {

    $row = mysqli_fetch_array($results); 
    $username = $row['name'];
    $account_type = $row['type'];


    if($password != $row['password'])
    {
      echo "<script type='text/javascript'>alert('Password is wrong, Please try again!');</script>";
    }
    else
    {
      $_SESSION['name'] = $username;
      $_SESSION['email']= $email;
    
      echo "<script type='text/javascript'>alert('Login Success, Welcome ' + '$username'); 
      window.location.href='student_index.php'; </script>";
    }
  }
}


if (isset($_POST['log_out']))					//Log out
{
	      echo "<script type='text/javascript'>alert('Login Success, Welcome); 
      window.location.href='login.php'; </script>";
}    


if(isset($_POST['participate_kizilay']))
{
	$leader_id = 64160014;
	$cur_user_email = $_SESSION['email'];
	$query = "SELECT * FROM student WHERE email='$cur_user_email'";
	$results = mysqli_query($db,$query);
	$row = mysqli_fetch_array($results); 
	
	$st_id = $row['student_id'];

    $query = "INSERT INTO student_club_participants (leader_id, participant_id) 
          VALUES('$leader_id', '$st_id')";
    mysqli_query($db, $query);
    echo "<script type='text/javascript'>alert('Successfully participated a club'); </script>";
}

if(isset($_POST['participate_girisimcilik']))
{
	$leader_id = 61170008;
	$cur_user_email = $_SESSION['email'];
	$query = "SELECT * FROM student WHERE email='$cur_user_email'";
	$results = mysqli_query($db,$query);
	$row = mysqli_fetch_array($results); 
	
	$st_id = $row['student_id'];

    $query = "INSERT INTO student_club_participants (leader_id, participant_id) 
          VALUES('$leader_id', '$st_id')";
    mysqli_query($db, $query);
    echo "<script type='text/javascript'>alert('Successfully participated a club'); </script>";
}

if(isset($_POST['participate_ieee']))
{
	$leader_id = 63150012;
	$cur_user_email = $_SESSION['email'];
	$query = "SELECT * FROM student WHERE email='$cur_user_email'";
	$results = mysqli_query($db,$query);
	$row = mysqli_fetch_array($results); 
	
	$st_id = $row['student_id'];

    $query = "INSERT INTO student_club_participants (leader_id, participant_id) 
          VALUES('$leader_id', '$st_id')";
    mysqli_query($db, $query);
    echo "<script type='text/javascript'>alert('Successfully participated a club'); </script>";
}

if(isset($_POST['participate_mec']))
{
	$leader_id = 62160008;
	$cur_user_email = $_SESSION['email'];
	$query = "SELECT * FROM student WHERE email='$cur_user_email'";
	$results = mysqli_query($db,$query);
	$row = mysqli_fetch_array($results); 
	
	$st_id = $row['student_id'];

    $query = "INSERT INTO student_club_participants (leader_id, participant_id) 
          VALUES('$leader_id', '$st_id')";
    mysqli_query($db, $query);
    echo "<script type='text/javascript'>alert('Successfully participated a club'); </script>";
}























 ?>