<!--   
    File: updateNumOfBeds.php

    Programmer Name: 85

    Description: updates the number of beds in a selected hospital.

-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>Hospital data</title>
    </head>
    <body>
        <?php
            include 'connectdb.php';
            include 'getHospital.php';
        ?>

        <?php
            $newNumBeds = $_POST["newNumBeds"];
            $query = 'UPDATE hospital SET numofbed = "' . $newNumBeds . '" WHERE hoscode = "' . $whichHospital . '"';
            echo $whichHospital;
            echo $query;

            $result = mysqli_query($connection, $query);

            if (!mysqli_query($connection, $query)) {
                die("Error: update failed-- " . mysqli_error($connection));
            }
            echo "<h2>Number of hospital beds updated</h2>";
            mysqli_close($connection);
            echo '<br><a href="getHospital.php">Return to hospital information</a> <br>';
        ?>
        
    </body>
</html>