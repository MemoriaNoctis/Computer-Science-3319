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
    </head>

    <body>
        <?php
            include 'connectdb.php';
        ?>

        <?php
            $whichDoctor = $_POST["doctors"];
            $whichPatient = $_POST["patients"];

            $looksAfterQuery = 'SELECT * FROM looksafter WHERE licensenum = "' . $whichDoctor . '" AND ohipnum = "' . $whichPatient . '"';
            $looksAfterResult = mysqli_query($connection,$looksAfterQuery);

            echo $looksAfterQuery;

            if (!empty($row = mysqli_fetch_assoc($looksAfterResult))){
                echo "Error: Patient is already assigned to this doctor."
            } else{
                $query = 'INSERT INTO looksafter VALUES ("' . $whichDoctor . '", "' . $whichPatient . '")';
                $result = mysqli_query($connection, $query);

                if (!$result) {
                    die("Error: assign doctor to patient failed-- ".mysqli_error($connection));
                }
                echo "<h1>Doctor has been assigned to the patient.</h1>";
            }

            echo '<br><a href="doctorFunctions.php">Return to accessing doctor information</a> <br>'; 

        ?>
    </body>
</html>