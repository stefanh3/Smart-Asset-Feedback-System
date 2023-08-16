<?php 

include "formSubmissionHeader.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputRating = $_POST["qualRating"];
    $comment = $_POST["qualComment"];
    $outputRating = processStarRating($inputRating);

    echo "<br>Output Rating is " . $outputRating;
    echo "Input Rating is " . $inputRating;
    echo "The comment is" . $comment . "<br>";

    $query = "
    INSERT INTO Rating (facilityID, qualityRating, qualityComment)
    VALUES (1, {$outputRating}, \"{$comment}\");
    ";

    echo "<br>" . $query . "<br>";

    submitToDatabase($connnection, $query);
}

?>
