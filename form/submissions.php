<?php

$host = 'sql207.epizy.com';
$dbname = 'epiz_34070187_anime_comment';
$username = 'epiz_34070187';
$password = 'JVuFNQraSq';

//use this order//
$conn = mysqli_connect ($host, $username, $password, $dbname);

//if there is an error it will print out the error//
if (mysqli_connect_errno()) {
    die("Connection error " . mysqli_connect_errno());
}

$sql = "SELECT * FROM anime_comment;";
//creating results variable with the data from the table
$result = mysqli_query($conn, $sql);
//checking to see if we got any results//
$resultCheck = mysqli_num_rows($result);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Comment</title>
</head>
<header>
    <!-- HAMBURGER MENU -->
    <div class="navigation">
      <button class="hamburger" onclick="show()">
          <div id="bar1" class="bar"></div>
          <div id="bar2" class="bar"></div>
          <div id="bar3" class="bar"></div>
      </button>

      <nav>
          <ul>
              <li><a href="/topAnime/topAnime.html">Top Anime</a></li>
              <li><a href="/Seasons/current.html">Current</a></li>
              <li><a href="/Seasons/upcoming.html">Upcoming</a></li>
              <li><a href="/Characters/character.html">Characters</a></li>
              <li><a href="form/form.html">Comments</a></li>
          </ul>
      </nav>

  </div>
    <!-- LOGO -->
    <div class="logo"><a href="/home.html" class="title">AnimeList</a></div>
  </header>
<body>
    <div class = 'response_list'>
        <h1>Survey Submissions</h1>
        <h3>Here's the list of some amazing people who submitted the form</h3>
        <ul>
            <?php
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<li>' . $row['name'] ."</li>";
                    echo '<li>' . $row['likes'] ."</li>";
                    echo '<li>' . $row['reason'] ."</li>";
                }
            }
            ?>

        </ul>
    </div>
    
</body>
</html>