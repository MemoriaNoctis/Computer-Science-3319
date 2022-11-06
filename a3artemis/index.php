<!--   
    File: index.php

    Programmer Name: 85

    Description: homepage of the website, directs users to either access doctor or hospital information.

-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Hospital Database</title>
    </head>

    <body>
        <?php
        include 'connectdb.php';
        ?>

        <h1>Welcome to the Hospital Database</h1>
        <h2>Access information on the doctors</h2>
        Functions include:
        <ul>
            <li>List all information about the doctors</li>
            <li>List all doctors within one speciality</li>
            <li>Insert a new doctor</li>
            <li>Delete an existing doctor</li>
            <li>Assign doctors to patients</li>
            <li>See the patients of a doctor</li>
        </ul>

        <a href="doctorFunctions.php">View and change doctor information</a>

        <h2>View information about a hospital</h2>
        <?php
        Include 'getHospital.php'
        ?>

        <?php
        mysqli_close($connection);
        ?>
        
    </body>
</html>