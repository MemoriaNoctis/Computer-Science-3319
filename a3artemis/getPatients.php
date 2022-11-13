<!--   
    File: getPatients.php

    Programmer Name: 85

    Description: retrieves all patients treated by a selected doctor.

-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Doctor Functions - Hospital Database</title>
    </head>
    <body>
        <?php
            include 'connectdb.php'
        ?>

        <h2>List of patients treated by the selected doctor: </h2>
        <ol>
            <?php
                $whichDoctor = $_POST["doctors"];
                $query = 'SELECT patient.firstname, patient.lastname, patient.ohipnum FROM doctor, looksafter, patient WHERE doctor.licensenum = "' . $whichDoctor . '" AND doctor.licensenum = looksafter.licensenum AND looksafter.ohipnum = patient.ohipnum';
                $result = mysqli_query($connection, $query);

                
                if (!$result) {
                    die("database query failed.");
                }

                while ($row=mysqli_fetch_assoc($result)){
                    echo '<li>';
                    echo $row["firstname"];
                    echo " ";
                    echo $row["lastname"];
                    echo ", OHIP number: ";
                    echo $row["ohipnum"];
                }

                mysqli_free_result($result);
                
            ?>

        </ol>
        <br><a href="doctorFunctions.php">Return to accessing doctor information</a>

        
    </body>
</html>