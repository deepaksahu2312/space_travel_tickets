<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo (CSSPATH . "$cssItem");?>">;?>
    <title>Appointment</title>
<?php
  define('CSSPATH', 'space travel agency/css/'); //define css path
  $cssItem = 'style1.css'; //css item to display
?>
</head>
<body>
<h1>Your entry has been submitted successfully. Unique id will be <?php 
   session_start();
   echo $_SESSION['n'];
   ?> </h1>
    <div id="setcenter">
        <nav class="navbar">
          <ul class="navlist">
            <!-- <img src="/img/logo.jpg" alt="spacetraveller" id="space-travel"> -->
            <div id="logo" align="center">
              <h5 class="set">Space-Traveller</h5>
              <li> <a href="index.html">Home</a> </li>
              <li><a href="history.html">History</a></li>
              <li><a href="gallery.html">Gallery</a></li>
              <li><a href="space.html">Become an Astronaut</a></li>
              <li><a href="careers.html">Careers</a></li>
              <li><a href="about.html">About</a></li>
              <li><a href="admin.html">Admin login</a></li>
            </div>
          </ul>
        </nav>
      </div>

    <form action="/space travel agency/php files/check.php" method="POST" class="form">
        <h1>Fix your Day</h1>
        <legend class="sjade">
        <input type="text" name="text" id="unique-id" placeholder="Unique id"><br>
        <input type="date" name="date" id="date" placeholder="Date"><br>
        <input type="submit" value="Fix your day" id="submit">
        </legend>
    </form>
    

<!-- <form action="/space travel agency/php files/check.php" method="post">
 <div class="form-group">
        <label for="name">unique_id</label>
        <input type="text" name="id" class="form-control" aria-describedby="emailHelp" Required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form> -->
</body>
</html>