<!--   
    File: addDoctor.php

    Programmer Name: 85

    Description: takes parameters entered from doctorFunctions.php and inserts a new doctor into the database, provided that all parameters are valid.

-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Add new doctor</title>
        <link rel="stylesheet" href="styleSheet.css">
    </head>

    <body>
        <?php 
            include 'connectdb.php';
        ?>

        <?php
            $licenseNum = $_POST["licensenum"];
            $firstName = $_POST["firstname"];
            $lastName = $_POST["lastname"];
            $licenseDate = $_POST["licensedate"];
            $birthdate = $_POST["birthdate"];
            $hosWorksAt = $_POST["hosworksat"];
            $speciality = $_POST["speciality"];

            $hosValidQuery = 'SELECT hoscode FROM hospital WHERE hoscode = "' . $hosWorksAt . '"';
            $hosValid = mysqli_query($connection,$hosValidQuery);
            echo '<br>';

            $query = 'INSERT INTO doctor VALUES ("' . $licenseNum . '", "' . $firstName . '", "' . $lastName . '", "' . $licenseDate . '", "' . $birthdate . '", "' . $hosWorksAt . '", "' . $speciality . '")';
            
            //Checks for valid license number and hospital code entries.
            if (!fnmatch("[A-Z][A-Z][0-9][0-9]", $licenseNum) || (!empty($hosWorksAt) && !fnmatch("[A-Z][A-Z][A-Z]", $hosWorksAt))){
                echo '<div class="link">';
                echo '<a href="doctorFunctions.php">Return to accessing doctor information</a> <br>';
                echo '</div>';
                echo '<p class="center"> Error: invalid license number (2 capital letters followed by 2 numbers) and/or invalid hospital code (3 capital letters).</div>';
            } 
            
            //Checks for duplicate entries and non-existant hospitals.
            else{
                if (!mysqli_query($connection, $query)) {
                    echo '<div class="link">';                
                    echo '<a href="doctorFunctions.php">Return to accessing doctor information</a> <br>';
                    echo '</div>';
                    echo '<div class="center">';
                    die("Error: insert failed: " . mysqli_error($connection));
                    echo '</div>';
                }
                echo "<h2>Doctor added!</h2>";
                mysqli_close($connection);
                echo '<div class="link">';
                echo '<br><a href="doctorFunctions.php">Return to accessing doctor information</a> <br>';
                echo '</div>';
                
            }
        ?>
    </body>
</html>