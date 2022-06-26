<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $dob = $_POST['DOB'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $country = $_POST['country'];
        $pass = $_POST['Passport'];
      // Connecting to the Database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "space";
        
      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);
      // Die if connection was not successful
      if (!$conn){
          die("Sorry we failed to connect: ". mysqli_connect_error());
      }
      else{
        // Submit these to a database
        // Sql query to be executed 
        $inc= "SELECT max(SNO) From booking";
        $inc++;
        $sql = "INSERT INTO `booking` (`SNo`,`name`, `dob`, `email`, `mobile`, `country`, `passport`) VALUES ('$inc','$name', '$dob', '$email', '$mobile', '$country', '$pass')";
        $result = mysqli_query($conn, $sql);
        $sql = "SELECT * FROM `booking` ORDER BY `SNo` DESC LIMIT 1";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
          while($row = mysqli_fetch_assoc($result))
          {
            $num = $row["SNo"];
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your entry has been submitted successfully! Unique Id Will Be '.$num.'
            </div>';
            session_start();
            $_SESSION['n']=$num;
            
            header("location:/space_travel_agency/fixappointment.php");
          }
        }
        
        else{
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> We are facing some technical issue and your entry was not submitted successfully! We regret for the inconvinience caused!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"></span>
          </button>
        </div>';
        }


      }

    }
?>