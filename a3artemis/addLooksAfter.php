<!--   
    File: addLooksAfter.php

    Programmer Name: 85

    Description: processes the request to add a new doctor-patient relationship into the database. Considers if the doctor is already treating the patient, in which case the request needn't move forward.

-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>Assign patient to doctor</title>
        <link rel="stylesheet" href="styleSheet.css">
    </head>

    <body>
        <?php
            include 'connectdb.php';
        ?>

        <?php
            $whichDoctor = $_POST["doctors"];
            $whichPatient = $_POST["patients"];

            $looksAfterQuery = 'SELECT * FROM looksafter WHERE licensenum = "' . $whichDoctor . '" AND ohipnum = "' . $whichPatient . '"';
            $looksAfterResult = mysqli_query($connection,$looksAfterQuery);;

            //don't allow assignment if the doctor is already assigned to the patient
            if (!empty($row = mysqli_fetch_assoc($looksAfterResult))){
                echo '<p class="center"> Error: Patient is already assigned to this doctor. </div>';
            } else{
                $query = 'INSERT INTO looksafter VALUES ("' . $whichDoctor . '", "' . $whichPatient . '")';
                $result = mysqli_query($connection, $query);

                if (!$result) {
                    echo '<div class="center"';
                    die("Error: assign doctor to patient failed-- ".mysqli_error($connection));
                    echo '</div>';
                }
                echo "<h1>Doctor has been assigned to the patient.</h1>";
            }

            mysqli_close($connection);
            echo '<div class="link">';
            echo '<br><a href="doctorFunctions.php">Return to accessing doctor information</a> <br>'; 
            echo '</div>';

        ?>
    </body>
</html>