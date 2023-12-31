<!DOCTYPE html>
<html lang="en">

<head>
    <title>Feedback</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="feedback-style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,500;0,600;0,700;0,800;0,900;1,300;1,400&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<!-- Navigation bar for the top -->
<nav class="navbar sticky-top bg-light">
    <a class="navbar-brand" href="#">
        <img src="logo.png" alt="logo" style="width:70px;">
    </a>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="facilitySelector.php">View Other Facilities</a>
        </li>
    </ul>
</nav>

<!-- Retrieval of the facility name from the ID -->
<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Create a database connection
    $hostname = "localhost";
    $username = "root";
    $password = "root";
    $databaseName = "AssetDB";
    $connection = @new mysqli($hostname, $username, $password, $databaseName);

    // Test the database connection
    if($connection->connect_error) {
        echo "Database Connection Error!";
        echo "<br>";
        echo "Error Number: " . $connection->connect_errno;
        echo "<br>";
        echo "Error: " . $connection->connect_error;
        exit();
    }

    if(!isset($_GET['facilityID'])) {
        echo "<h1> ERROR: A facility has not been specified!</h1>";
    } else {
        $facilityID = $_GET['facilityID'];
        $query = "SELECT facilityName FROM Facility WHERE facilityID = {$facilityID}";
        $result = $connection->query($query);
        $row = mysqli_fetch_assoc($result);
        if(!$row) {
            echo "<h1> ERROR: That facility ID is invalid!</h1>";
        } else {
            $facilityName = $row['facilityName']; 
?>
            <div class="container"> 
                <h1 style="text-align: center; padding-top: 20px;">HOW ARE WE DOING?</h1>
                <p style="text-align: center;">Please take 1 minute to provide your thoughts on how <?php echo $facilityName; ?> lives up to your expectations in these 4 categories:</p>
                <div class="row">

                    <!-- AvailForm -->
                    <div class="col-lg-6" style="background-color:#8cc63f">
                        <h1 class="box">Availability</h1>
                        <p class="box">Can you access this facility when and how you wish?</p>
                        <!-- <form id="availForm" action="availSubmit.php" method="POST"> -->
                        <form id="availForm" method="POST">
                            <div class="rating form-group">
                                <input type="hidden" name="availRating" value="-1">
                                <input type="radio" name="availRating" id="availStar1" value="1">
                                <label for="availStar1"></label>
                                <input type="radio" name="availRating" id="availStar2" value="2">
                                <label for="availStar2"></label>
                                <input type="radio" name="availRating" id="availStar3" value="3">
                                <label for="availStar3"></label>
                                <input type="radio" name="availRating" id="availStar4" value="4">
                                <label for="availStar4"></label>
                                <input type="radio" name="availRating" id="availStar5" value="5">
                                <label for="availStar5"></label>
                            </div>
                            <div class="form-group" style="padding-top: 60px;">
                                <label for="comment">COMMENTS:</label>
                                <!-- <input type="text" id="comment" class="form-control", name="availComment"> -->
                                <textarea id="comment" class="form-control" name="availComment"></textarea>
                            </div>
                        </form>
                    </div>

                    <!-- FitForm -->
                    <div class="col-lg-6" style="background-color:#2d3691">
                        <h1 class="box">Fit For Purpose</h1>
                        <p class="box">Is the facility capable of meeting your needs of it?</p>
                        <!-- <form id="fitForm" action="fitSubmit.php" method="POST"> -->
                        <form id="fitForm" method="POST">
                            <div class="rating form-group">
                                <input type="hidden" name="fitRating" value="-1">
                                <input type="radio" name="fitRating" id="fitStar1" value="1">
                                <label for="fitStar1"></label>
                                <input type="radio" name="fitRating" id="fitStar2" value="2">
                                <label for="fitStar2"></label>
                                <input type="radio" name="fitRating" id="fitStar3" value="3">
                                <label for="fitStar3"></label>
                                <input type="radio" name="fitRating" id="fitStar4" value="4">
                                <label for="fitStar4"></label>
                                <input type="radio" name="fitRating" id="fitStar5" value="5">
                                <label for="fitStar5"></label>
                            </div>
                            <div class="form-group" style="padding-top: 60px;">
                                <label for="comment">COMMENTS:</label>
                                <textarea id="comment" class="form-control" name="fitComment"></textarea>                </div>
                        </form>
                    </div>

                </div>
                <div class="row" style="padding-bottom: 50px;">

                    <!-- AesthForm -->
                    <div class="col-lg-6" style="background-color: #c41230;">
                        <h1 class="box">Aesthetics</h1>
                        <p class="box">Does the facility look overall visually pleasing to the eye?</p>
                        <!-- <form id="aesthForm" action="aesthSubmit.php" method="POST"> -->
                        <form id="aesthForm" method="POST">
                            <div class="rating form-group">
                                <input type="hidden" name="aesthRating" value="-1">
                                <input type="radio" name="aesthRating" id="aesthStar1" value="1">
                                <label for="aesthStar1"></label>
                                <input type="radio" name="aesthRating" id="aesthStar2" value="2">
                                <label for="aesthStar2"></label>
                                <input type="radio" name="aesthRating" id="aesthStar3" value="3">
                                <label for="aesthStar3"></label>
                                <input type="radio" name="aesthRating" id="aesthStar4" value="4">
                                <label for="aesthStar4"></label>
                                <input type="radio" name="aesthRating" id="aesthStar5" value="5">
                                <label for="aesthStar5"></label>
                            </div>
                            <div class="form-group" style="padding-top: 60px;">
                                <label for="comment">COMMENTS:</label>
                                <textarea id="comment" class="form-control" name="aesthComment"></textarea>                </div>
                        </form>
                    </div>

                    <!-- QualForm -->
                    <div class="col-lg-6" style="background-color: #f4911e;">
                        <h1 class="box">Quality</h1>
                        <p class="box">How well does the facility compare to others?</p>
                        <!-- <form id="qualForm" action="qualSubmit.php" method="POST"> -->
                        <form id="qualForm" method="POST">
                            <div class="rating form-group">
                                <input type="hidden" name="qualRating" value="-1">
                                <input type="radio" name="qualRating" id="qualStar1" value="1">
                                <label for="qualStar1"></label>
                                <input type="radio" name="qualRating" id="qualStar2" value="2">
                                <label for="qualStar2"></label>
                                <input type="radio" name="qualRating" id="qualStar3" value="3">
                                <label for="qualStar3"></label>
                                <input type="radio" name="qualRating" id="qualStar4" value="4">
                                <label for="qualStar4"></label>
                                <input type="radio" name="qualRating" id="qualStar5" value="5">
                                <label for="qualStar5"></label>
                            </div>
                            <div class="form-group" style="padding-top: 60px;">
                                <label for="comment">COMMENTS:</label>
                                <textarea id="comment" class="form-control" name="qualComment"></textarea>
                            </div>
                        </form>
                    </div>
                    
                    <footer class="fixed-bottom"
                        <div style="padding-top: 20px; width: 100%;">
                            <button type="button" id="submitButton" class="btn btn-primary btn-block btn-lg rounded-0">Submit</button>
                        </div>
                    </footer>
                    
                </div>
            </div>
<?php
        }
    }
?>

<script>
    document.getElementById('submitButton').addEventListener('click', function() {
        
        var formData = new FormData;
        var formElements = document.querySelectorAll('form');
        formElements.forEach(function(form) {
            var formDataItem = new FormData(form);
            for (var pair of formDataItem.entries()) {
                console.log(pair);
                formData.append(pair[0], pair[1]);
            }
            formData.append("facilityID", <?php echo $facilityID; ?>)
        });

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'submit.php', true)

        xhr.onload = function() {
            if(xhr.status === 200) {
                console.log(xhr.responseText);
            }
        }

        xhr.send(formData);
    });
</script>

</body>
</html>
