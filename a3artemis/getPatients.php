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
        <link rel="stylesheet" href="styleSheet.css">
    </head>
    <body>
        <?php
            include 'connectdb.php'
        ?>

        <h2>List of patients treated by the selected doctor: </h2>
        
        <?php
            $whichDoctor = $_POST["doctors"];
            $query = 'SELECT patient.firstname, patient.lastname, patient.ohipnum FROM doctor, looksafter, patient WHERE doctor.licensenum = "' . $whichDoctor . '" AND doctor.licensenum = looksafter.licensenum AND looksafter.ohipnum = patient.ohipnum';
            $result = mysqli_query($connection, $query);

            
            if (!$result) {
                die("database query failed.");
            }
            
            echo '<table>
            <tr>
                <th style="padding:10px">First Name</th>
                <th style="padding:10px">Last Name</th>
                <th style="padding:10px">OHIP Number</th>
            </tr>';


            while ($row=mysqli_fetch_assoc($result)){
                echo '<tr><td>' . $row["firstname"] . '</td><td>' . $row["lastname"] . '</td><td>' . $row["ohipnum"] . '</td></tr>';
            }
            echo "</table>";

            mysqli_free_result($result);
            mysqli_close($connection);
            
        ?>

    
        <br><a href="doctorFunctions.php">Return to accessing doctor information</a>

        
    </body>
</html>