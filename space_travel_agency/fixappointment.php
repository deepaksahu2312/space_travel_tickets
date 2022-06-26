<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style1.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <style>
    
    .deep {
      margin-top: 30px;
      padding: 20px;
      background: lightgreen;
      font-size: larger;
    }

    .powercss{
      margin-top:30px;
    }

    .deepak{
      width: 60%;
      background: lightgray;
    }
  </style>
  <title>Appointment</title>
</head>

<body style="background-color: skyblue;">
  <div id="setcenter">
    <nav class="navbar">
      <ul class="navlist">
        <div id="logo" style="margin: auto;">
          <h5 class="set">Space-Traveller</h5>
          <li> <a href="/space_travel_agency/home.html">Home</a> </li>
          <li><a href="/space_travel_agency/history.html">History</a></li>
          <li><a href="/space_travel_agency/gallery.html">Gallery</a></li>
          <li><a href="/space_travel_agency/space.html">Become an Astronaut</a></li>
          <li><a href="/space_travel_agency/php-files/scheduledjourney.php">Scheduled Journeys</a></li>
          <li><a href="/space_travel_agency/about.html">About</a></li>

        </div>
      </ul>
    </nav>
  </div>
  <?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
  $uniqueid = $_POST['uniqueid'];
  $date = $_POST['doj'];
  
     // Connecting to the Database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "space";
    
      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);
      if (!$conn){
        die("Sorry we failed to connect: ". mysqli_connect_error());
    }
    else{
      $select = mysqli_query($conn, "SELECT * FROM `scheduledjourney` WHERE `uniqueid` = '".$_POST['uniqueid']."'");
        if(mysqli_num_rows($select)) {
          echo '<div class="alert alert-danger alert-dismissible fade show powercss" role="alert">
          <strong>Error!</strong> Your journey already has been scheduled or your unique id does not exists.</div>';
        }
      else{
      $sql = "INSERT INTO `scheduledjourney` (`uniqueid`, `doj`) VALUES ('$uniqueid', '$date')";
      $result = mysqli_query($conn, $sql);
      if($result)
      {
        
        echo '<div class="alert alert-success alert-dismissible fade show powercss" role="alert">
        <strong>Success!</strong> You have scheduled your journey successfully! And Your scheduled date of journey is ' .$date. '</div>';
      }
      }
    }
}
?>
  <div class="alert alert-success alert-dismissible fade show deep" role="alert">
    <strong>Success!</strong> Your entry has been submitted successfully! Unique Id is <?php session_start(); echo $_SESSION['n'] ?>
  </div>

  <div class="container" >
    <form action="/space_travel_agency/fixappointment.php" method="post"
      style="width: 60%; padding: 10px ; margin: auto; margin-top: 60px;background-color:white;border-radius:10px;">
      <legend>Schedule Your Journey</legend>
      <div class="form-group" style="margin:5% 50px 10px 50px;">
        <label for="uniqueid">Unique Id</label>
        <input type="text" name="uniqueid" class="form-control deepak" id="uniqueid" aria-describedby="emailHelp"
          placeholder="Enter Unique Id" Required>
      </div>
      <div class="form-group" style="margin:2% 50px 50px;">
        <label for="doj">Date Of Journey</label>
        <input type="date" name="doj" class="form-control deepak" id="doj" aria-describedby="emailHelp" Required>
      </div>
      <button type="submit" class="btn btn-primary" style="margin:10px 60px;">Submit</button>

    </form>
  </div>

</body>

</html>