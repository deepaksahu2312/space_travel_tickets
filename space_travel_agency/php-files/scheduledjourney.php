<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/space_travel_agency/css/style1.css">
    <link rel="stylesheet" href="/space_travel_agency/css/career-style.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Scheduled Journeys</title>
</head>
<body>
    <div id="setcenter">
        <nav class="navbar">
          <ul class="navlist">
            <div id="logo">
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

      <br><br><br><br><br><br>hiii
      <?php 
      require '_dbconnect.php';
      $sql = 'INSERT INTO `schedule`(1,`name`,`country`,`doj`) SELECT `schedule.Sno`,`booking.name`,`booking.country`,`scheduledjourney.doj` FROM `booking` JOIN `scheduledjourney` JOIN `schedule` ON `booking.SNo` =`scheduledjourney.uniqueid`';
      $result = mysqli_query($conn,$sql);
      $sql = 'SELECT * FROM `schedule`';
      $result = mysqli_query($conn,$sql);
      if($result)
      {
        while($rows = mysqli_fetch_assoc($result))
        {
          echo "<tr>
          <th>". $rows['Sno']. "</th>
          <td>" .$rows['name']."</td>
          </tr>";
        }
      }
      // while($rows = mysqli_fetch_assoc($result))
      // {
      //   echo $rows['name']. "Hello". $rows['email']. "welcome" . $rows['country']. $rows['doj'];
      // }
      // if($result)
      // {
      //   echo 'query';
      // }
      // else{
      //   die("Sorry Due to some technical issues we are unable to proceed.");
      // }
      ?>
      
      <!-- <br><br><br>
    <section class="headcareer">
      <img src="img/career/1.jpg" alt="" width="100%" height="100%">
      <p id="upper">Better Opportunities Everyday</p>
      <h2 id="latOp">Latest Opportunities</h2>
      
      <div class="career-logo">
        <img src="img/career/v-logo.jpg" alt="">
        <img src="img/career/blue-origin-logo.jpg" alt="">
      </div>
    </section> -->
    
    <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</body>
</html>