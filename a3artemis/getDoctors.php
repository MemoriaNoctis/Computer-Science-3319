<!--   
    File: getDoctors.php

    Programmer Name: 85

    Description: return all doctor information listed by either last name or birthdate, and by ascending or descending order.

-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>List all Doctors</title>
        <link rel="stylesheet" href="styleSheet.css">
    </head>
    <body>
        <?php
            include 'connectdb.php';
        ?>
        <h1>List of all doctors in the database</h1>

        <?php
            $listBy = $_POST["listby"];
            $orderBy = $_POST["orderby"];
            $query = 'SELECT * FROM doctor ORDER BY ' . $listBy . ' ' .  $orderBy;
        
            $result = mysqli_query($connection, $query);

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
            mysqli_close($connection);


        ?>


        <br><a href="doctorFunctions.php">Return to accessing doctor information</a> 
        
    </body>
</html>
