<?php
if($_SERVER['REQUEST_METHOD'] === 'POST') {

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
    
    // Test the database connection
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
    
    $combinedFormData = $_POST;

    $i = 0;
    foreach($combinedFormData as $data) {
        echo $i . ": " . $data . "\n";
        $i++;
    }

    echo "\n an array value: ". $combinedFormData[7]. "\n";

    // Unpacking the array into variables
    $availRating = $combinedFormData[0];
    $availComent = $combinedFormData[1];
    $fitRating = $combinedFormData[2];
    $fitComment = $combinedFormData[3];
    $aesthRating = $combinedFormData[4];
    $aesthComment = $combinedFormData[5];
    $qualRating = $combinedFormData["qualRating"];
    $qualComment = $combinedFormData["qualComment"];

    $query = "
    INSERT INTO Rating (facilityID, qualityRating, qualityComment)
    VALUES (1, {$qualRating}, \"{$qualComment}\");
    ";

    echo "<br>" . $query . "<br>";

    submitToDatabase($connnection, $query);
}
?>
