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
                <th>License Number</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>License Date</th>
                <th>Birthdate</th>
                <th>Hospital of Employment</th>
                <th>Speciality</th>
            </tr>';


            while ($row=mysqli_fetch_assoc($result)){
                echo '<tr><td>' . $row["licensenum"] . '</td><td>' . $row["firstname"] . '</td><td>' . $row["lastname"] . '</td><td>' . $row["licensedate"] . '</td><td>' . $row["birthdate"] . '</td><td>' . $row["hosworksat"] . '</td><td>' . $row["speciality"] . '</td></tr>';
            }
            echo "</table>";
            mysqli_free_result($result);
            mysqli_close($connection);


        ?>

        <div class="link">
            <br><a href="doctorFunctions.php">Return to accessing doctor information</a> 
        </div>
                
    </body>
</html>
