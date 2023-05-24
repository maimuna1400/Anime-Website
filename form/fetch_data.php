<?php
$host = 'sql207.epizy.com';
$dbname = 'piz_34070187_anime_comment';
$username = 'epiz_34070187';
$password = 'JVuFNQraSq';

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}

$sql = "SELECT name, likes, reason FROM anime_comment";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row["name"];
        $likes = $row["likes"];
        $reason = $row["reason"];

        echo "<p>Name: $name</p>";
        echo "<p>Favorite Anime: $likes</p>";
        echo "<p>Reason: $reason</p>";
        echo "<hr>";
    }
} else {
    echo "No form data found.";
}

mysqli_close($conn);
?>






