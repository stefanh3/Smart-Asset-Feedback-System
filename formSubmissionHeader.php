<?php
//This file contains function and code that is used across all the php submission scripts

// Because the star ratings are reversed, this function turns a five star rating into a one star to reflect what order they're actually in on the front page
function processStarRating($inputRating) {
    switch($inputRating) {
        case 1:
            $outputRating = 5;
            break;
        case 2:
            $outputRating = 4;
            break;
        case 3:
            $outputRating = 3;
            break;
        case 4:
            $outputRating = 2;
            break;
        case 5:
            $outputRating = 1;
            break;
    }
    return $outputRating;
}

// Processes an SQL query with error checking.
function submitToDatabase($connection, $query) {
    if($connection -> query($query) === TRUE) {
        echo "<br>New Record Created Successfully!<br>";
    } else {
        echo "<br>Error: " . $connection->error . "<br>";
    }
}

// Create a database connection
$hostname = "localhost";
$username = "root";
$password = "root";
$databaseName = "AssetDB";
$connnection = @new mysqli($hostname, $username, $password, $databaseName);

if($connnection->connect_error) {
    echo "Database Connection Error!";
    echo "<br>";
    echo "Error Number: " . $connnection->connect_errno;
    echo "<br>";
    echo "Error: " . $connnection->connect_error;
    exit();
} else{
    echo "<br>Database Connection Succeeded!<br>";
}

//Test Cases
// echo "processStarRating(5): " . processStarRating(5) . "\n";
?>
