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

        <!--
            List all the information about the doctors.  User can order the data by Last Name OR by Birthdate.  For each of these 2 fields (Last Name or Birthdate)  user may either order them in ascending or descending order.
        -->
        <h1>Functions to alter and view doctor information</h1>
        <h2>List all doctors</h2>
        <form action="getDoctors.php" method="post">
            List doctors by:
            <fieldset id="list by">
                <input type="radio" name="listby" value="lastname">Last Name<br>
                <input type="radio" name="listby" value="birthdate">Birthdate<br>
            </fieldset>
            
            <br>Order results by:
            <fieldset id="order by">
                <input type="radio" name="orderby" value="ASC">Ascending<br>
                <input type="radio" name="orderby" value="DESC">Descending<br>
            </fieldset>

            <input type="submit" value="Submit">

        </form>

        <!--
            User can select one of the specialties to list all the doctor information about just doctors with this specialty.
        -->
        
        <h2>List doctors in one speciality</h2>
        <form action="getSpeciality.php" method="post">
            <?php 
                include 'getSpecialityData.php';
            ?>

            <input type="submit" value="Get Doctors in Speciality">
        </form>

        <!--
            Insert a new doctor, prompting user for the necessary data. 
        -->
        <h2>Insert a new doctor</h2>
        <form action="addDoctor.php" method="post">
            License Number: <input type="text" name="licensenum" required><br>
            First Name: <input type="text" name="firstname" required><br>
            Last Name: <input type="text" name="lastname" required><br>
            License date: <input type="date" name="licensedate" required><br>
            Birthdate: <input type="date" name="birthdate" required><br>
            Hospital of employment: <input type="text" name="hosworksat" required><br>
            Speciality: <input type="text" name="speciality" required><br>
            <input type="submit" value="Add New Doctor"><br>

        </form>
        
        <!--
            Delete an existing doctor, prompting user for the license number corresponding to the doctor. 
        -->
        <h2>Remove an existing doctor from the database</h2>
        <h3>Select doctor to delete: </h3>
        <form action="removeDoctor.php" method="post" onsubmit="return confirm('Are you sure you want to delete this doctor from the database?');">
            <?php
                include 'getDoctorData.php'
            ?>
            <input type="submit" value="Delete Doctor">
        </form>

        <!--
            Assigns a doctor to a patient unless the relationship already exists.  
        -->
        <h2>Assign a doctor to a patient</h2>
        <form action="addLooksAfter.php" method="post">
            <?php
                include "getDoctorPatientData.php"
            ?>
            <input type="submit" value="Assign Patient to Doctor">
        </form>
        
        <!-- 
            Retrieves the first name, last name, and ohip number of any patient treated by a selected doctor.
        -->
        <h2>See all patients of a doctor</h2>
        <form action="getPatients.php" method="post">
            <?php
                include 'getDoctorData.php'
            ?>
            <input type="submit" value="See Patients">
        </form>

        <br><a href="index.php">Return to home page</a>

        
        <?php
            mysqli_close($connection);
        ?>
    </body>
    


</html>