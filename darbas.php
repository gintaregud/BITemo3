<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "test1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// var_dump($conn);
// parasome select uzklausa
$sql = "SELECT id,name,surname FROM test1";

// issitraukiame lenteles test1, kuri yra duomenu bazeje test1 duomenis 
$result = mysqli_query($conn, $sql);

$data = [];
// patikriname ar yra nors viena eilute $result masyve
if ($result->num_rows > 0) {
    // traukiame  duomenis is dvimacio $result masyvo ir kisame  po viena eilute i 
    // vienmati $data masyva 
    while ($row = $result->fetch_assoc()) {
        array_push($data, $row["id"] . ' ' . $row["name"] . ' ' . $row["surname"]);
    }
} else {
    echo "0 results";
}


$conn->close();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="style.css">

<body>
    <div class="grozis">


        <?php


        foreach ($result as $elem) {
            echo "<div class='dydis'>" . $elem["id"] . " " . $elem["name"] . $elem["surname"] . "</div>" . "<br>";
        }


        ?>
    </div>
</body>

</html>