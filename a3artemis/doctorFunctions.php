<!--   
    File: doctorFunctions.php

    Programmer Name: 85

    Description: holds all functions that users can use to acccess/alter doctor information from the hospital database.

-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Doctor Functions - Hospital Database</title>
    </head>

    <body>
        <?php
        include 'connectdb.php';
        ?>

        <h2>List all doctors</h2>
        <form action="getDoctors.php" method="post">
            List doctors by:
            <fieldset id="list by">
                <input type="radio" name="list by" value="lastname">Last Name<br>
                <input type="radio" name="list by" value="birthdate">Birthdate<br>
            </fieldset>
            
            <br>Order results by:
            <fieldset id="order by">
                <input type="radio" name="order by" value="ascending">Ascending<br>
                <input type="radio" name="order by" value="descending">Descending<br>
            </fieldset>

            <input type="submit" value="Submit">

        </form>
        
        <h2>List doctors in one speciality</h2>
        <form action="getDoctorsInSpecialty.php" method="post">
            <?php 
            include 'getSpecialties.php';
            ?>

            <input type="submit" value="Submit">
        </form>

        <h2>Insert a new doctor</h2>
        <form action="addNewDoctor.php" method="post">
            License Number: <input type="text" name="licensenum"><br>
            First Name: <input type="text" name="firstname"><br>
            Last Name: <input type="text" name="lastname"><br>
            License date: <input type="date" name="licensedate"><br>
            Birthdate: <input type="date" name="birthdate"><br>
            speciality: <input type="text" name="speciality"><br>
            <input type="submit" value="Add New Doctor"><br>

        </form>
        
        <h2>Remove a doctor</h2>
        <form action="removeDoctor.php" method="post">
            License Number: <input type="text" name="licensenum"><br>
            <input type="submit" value="Remove Doctor"><br>
        </form>

        <h2>Assign a doctor to a patient</h2>
        <?php
        Include "addNewLooksafter.php"
        ?>

        <h2>See all patients of a doctor</h2>
        <?php
        Include "getPatients.php"
        ?>
        
        <?php
        mysqli_close($connection);
        ?>
    </body>
    


</html>