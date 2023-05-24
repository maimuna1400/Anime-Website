<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php

$name = $_POST["name"];
$likes = $_POST["likes"];
$reason = $_POST["reason"];


$host = 'sql207.epizy.com';
$dbname = 'piz_34070187_anime_comment';
$username = 'epiz_34070187';
$password = 'JVuFNQraSq';

$conn = mysqli_connect ($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die("Connection error " . mysqli_connect_errno());
}

$sql = "INSERT INTO anime_comment (name, likes, reason)
VALUES ('$name', '$likes', '$reason')";

if ($conn->query($sql) === TRUE) {
    echo "response saved";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>