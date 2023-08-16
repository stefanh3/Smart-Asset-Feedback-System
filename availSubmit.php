<?php 

if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Check if each variable is set and not empty before assigning it a variable
    if(isset($_POST['availRating']) && !empty($_POST["availRating"])) {
        $rating = $_POST['availRating'];
    }

    if(isset($_POST['availComment']) && !empty($_POST['availComment'])) {
        $comment = $_POST['availComment'];
    }

}

?>
