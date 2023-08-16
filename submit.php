<?php
if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $combinedFormData = $_POST;

    // Unpacking the array into variables
    $availRating = $combinedFormData[0];
    $availComent = $combinedFormData[1];
    $fitRating = $combinedFormData[2];
    $fitComment = $combinedFormData[3];
    $aesthRating = $combinedFormData[4];
    $aesthComment = $combinedFormData[5];
    $qualRating = $combinedFormData[6];
    $qualComment = $combinedFormData[7];

    // $i = 0;
    // foreach($combinedFormData as $data) {
    //     echo $i . ": " . $data . "\n";
    //     $i++;
    // }
}
?>
