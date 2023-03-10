<!--   
    File: updateNumOfBeds.php

    Programmer Name: 85

    Description: updates the number of beds in a selected hospital.

-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>Update hospital bed numbers</title>
        <link rel="stylesheet" href="styleSheet.css">
    </head>
    <body>
        <?php
            include 'connectdb.php';
        ?>

        <?php
            $newNumBeds = $_POST["newNumBeds"];
            $whichHospital = $_POST["hospitals"];
            $query = 'UPDATE hospital SET numofbed = "' . $newNumBeds . '" WHERE hoscode = "' . $whichHospital . '"';

            $result = mysqli_query($connection, $query);

            if (!mysqli_query($connection, $query)) {
                echo '<div class="center"';
                die("Error: update failed-- " . mysqli_error($connection));
                echo '</div>';
            }
            echo "<h2>Number of hospital beds updated</h2>";
            mysqli_close($connection);
        ?>

        <div class="link">
            <br><br><a href="index.php">Return to home page</a>
        </div>
        
        
    </body>
</html>