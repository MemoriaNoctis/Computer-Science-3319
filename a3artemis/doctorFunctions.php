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
        <link rel="stylesheet" href="styleSheet.css">
    </head>

    <body>
        <?php
            include 'connectdb.php';
        ?>

        <!--
            List all the information about the doctors.  User can order the data by Last Name OR by Birthdate.  For each of these 2 fields (Last Name or Birthdate)  user may either order them in ascending or descending order.
        -->
        <h1>Alter and view doctor information</h1>
        <h2>List all doctors</h2>
        <div class="center">
            <h3>Choose how to order the results: </h3>
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

                <br><input type="submit" value="Submit">
            </form>
        </div>        

        <!--
            User can select one of the specialties to list all the doctor information about just doctors with this specialty.
        -->
        
        <h2>List doctors in one speciality</h2>
        <div class="center">
            <h3>Choose which speciality to list: </h3> 
            <form action="getSpeciality.php" method="post">
                <?php 
                    include 'getSpecialityData.php';
                ?>

                <br><input type="submit" value="Get Doctors in Speciality">
            </form>
        </div>

        <!--
            Insert a new doctor, prompting user for the necessary data. 
        -->
        <h2>Insert a new doctor</h2>
        <div class="center">
            <h3>Input new doctor's information: </h3>
            <form action="addDoctor.php" method="post">
                <label>License Number:</label> <input type="text" name="licensenum" required><br>
                <label>First Name:</label> <input type="text" name="firstname" required><br>
                <label>Last Name:</label> <input type="text" name="lastname" required><br>
                <label>License date:</label> <input type="date" name="licensedate" required><br>
                <label>Birthdate:</label> <input type="date" name="birthdate" required><br>
                <label>Hospital of employment:</label> <input type="text" name="hosworksat" required><br>
                <label>Speciality:</label> <input type="text" name="speciality" required><br>
                <br><input type="submit" value="Add New Doctor"><br>

            </form>
        </div>
        
        <!--
            Delete an existing doctor, prompting user for the license number corresponding to the doctor. 
        -->
        <h2>Remove an existing doctor from the database</h2>
        <div class="center">
            <h3>Select doctor to delete: </h3>
            <form action="removeDoctor.php" method="post" onsubmit="return confirm('Are you sure you want to delete this doctor from the database?');">
                <?php
                    include 'getDoctorData.php'
                ?>
                <br><input type="submit" value="Delete Doctor">
            </form>
        </div>

        <!--
            Assigns a doctor to a patient unless the relationship already exists.  
        -->
        <h2>Assign a doctor to a patient</h2>
        
        <div class="center">
            <h3>Select doctor and patient to assign: </h3>
            <form action="addLooksAfter.php" method="post">
                <?php
                    include "getDoctorPatientData.php"
                ?>
                <br><input type="submit" value="Assign Patient to Doctor">
            </form>
        </div>
        
        <!-- 
            Retrieves the first name, last name, and ohip number of any patient treated by a selected doctor.
        -->
        <h2>See all patients of a doctor</h2>
        <div class="center">
            <h3>Select a doctor to view their patients: </h3>
            <form action="getPatients.php" method="post">
                <?php
                    include 'getDoctorData.php'
                ?>
                <br><input type="submit" value="See Patients">
            </form>
        </div><br>

        <div class="link">
            <a href="index.php">Return to home page</a>
        </div>
        

        
        <?php
            mysqli_close($connection);
        ?>
    </body>
    


</html>