

<!--   
    File: getSpecialty.php

    Programmer Name: 85

    Description: display all doctors in a chosen speciality. 
-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>All doctors in speciality</title>
    </head>

    <body>
        <?php
            include 'connectdb.php';
        ?>

        <h1>All doctors in the chosen speciality</h1>
        <?php
            $whichSpeciality = $_POST["speciality"];
            $query = 'SELECT * FROM doctor WHERE speciality = "' . $whichSpeciality . '"';
            
            $result=mysqli_query($connection,$query);
            if (!$result) {
                die("database query failed.");
            }
            echo '<table>
            <tr>
                <th style="padding:10px">License Number</th>
                <th style="padding:10px">First Name</th>
                <th style="padding:10px">Last Name</th>
                <th style="padding:10px">License Date</th>
                <th style="padding:10px">Birthdate</th>
                <th style="padding:10px">Hospital of Employment</th>
                <th style="padding:10px">Speciality</th>
            </tr>';


            while ($row=mysqli_fetch_assoc($result)){
                echo '<tr><td>' . $row["licensenum"] . '</td><td>' . $row["firstname"] . '</td><td>' . $row["lastname"] . '</td><td>' . $row["licensedate"] . '</td><td>' . $row["birthdate"] . '</td><td>' . $row["hosworksat"] . '</td><td>' . $row["speciality"] . '</td></tr>';
            }
            echo "</table>";
            mysqli_free_result($result);
        ?>
    </body>
</html>