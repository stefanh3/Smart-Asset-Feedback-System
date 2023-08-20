<!DOCTYPE html>
<html lang="en">

<head>
    <title>Facilities</title>
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
</nav>

<div class="container">
    <h1 style="text-align: center; padding-top: 20px;">Select A Facility</h1>


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

        $query = "SELECT facilityName FROM Facility";
        $result = $connection->query($query);

        echo '<div class="card-columns">';
        while ($row = $result->fetch_assoc()) {
            // echo "Facility Name: " . $row["facilityName"] . "<br>";
            echo '
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <p class="card-text">'.$row["facilityName"].'</p>
                    </div>
                </div>';
        }
        echo '</div>';

        // Close the database connection
        $connection->close();
    ?>
</div>

</body>
</html>
