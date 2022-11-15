<!--   
    File: removeDoctor.php

    Programmer Name: 85

    Description: processes the removal of a selected doctor from the database. Considers if the selected doctor is a head doctor or has patients, in which case the deletion cannot take place.

-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>Remove doctor from database</title>
        <link rel="stylesheet" href="styleSheet.css">
    </head>

    <body>
        <?php
            include 'connectdb.php';
        ?>

        <?php
            $whichProf = $_POST["doctors"];

            //check if the selected doctor is the head doctor of a hospital
            $headDocQuery = 'SELECT * FROM hospital WHERE headdoc = "' . $whichProf . '"';
            $headDocResult = mysqli_query($connection, $headDocQuery);

            //check if the selected doctor has patients
            $patientQuery = 'SELECT * FROM looksafter WHERE licensenum = "' . $whichProf . '"';
            $patientResult = mysqli_query($connection, $patientQuery);

            if (!empty($row = mysqli_fetch_assoc($patientResult)) || !empty($row = mysqli_fetch_assoc($headDocResult))){
                echo "Error: cannot delete doctors assigned to patients and/or doctors who are the head doctor of a hospital.";
            } else{
                $query = 'DELETE FROM doctor WHERE licensenum = "' . $whichProf . '"';
                $result = mysqli_query($connection, $query);

                if (!$result) {
                    die("Error: delete doctor failed-- ".mysqli_error($connection));
                }
                echo "<h1>Doctor deleted from the database.</h1>";
            }
            mysqli_close($connection);
        ?>

        <div class="link">
            <br><a href="doctorFunctions.php">Return to accessing doctor information</a> <br>
        </div>
        


    </body>
</html>