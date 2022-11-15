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
        <link rel="stylesheet" href="styleSheet.css">
    </head>

    <body>

 
        <?php
        include 'connectdb.php';
        ?>

        <h1>Welcome to the Hospital Database</h1>
        <h2>Access information on the doctors</h2>
        <div class="center">
            <font size = "+1" class="artichoke">Functions include:</font>        
            <ul class="artichoke">
                <li>List all information about the doctors</li>
                <li>List all doctors within one speciality</li>
                <li>Insert a new doctor</li>
                <li>Delete an existing doctor</li>
                <li>Assign doctors to patients</li>
                <li>See the patients of a doctor</li>
            </ul>
        </div>
        
        <div class="link">
            <a href="doctorFunctions.php">View and change doctor information</a>
        </div>        

        <h2>View and Change information on hospitals</h2>

        <div class="center">
            <font size = "+1" class="artichoke">Select a hospital to view its information</font>
            <form action="getHospital.php" method="post">
                <?php 
                    include 'getHospitalData.php';
                ?>
                <input type="submit" value="View Information">
            </form>
        </div>       

        <br><br>

        <div class="center">
            <font size = "+1">Update the number of beds in a hospital</font>
            <br>
            <form action="updateNumOfBeds.php" method="post">
                Select hospital to update:<br>
                <?php 
                    include 'getHospitalData.php';
                ?>
                <br>
                Updated number of Beds: <input type="number" name="newNumBeds" required><br>
                <input type="submit" value="Update">
            </form>
        </div>

        
        <?php
            mysqli_close($connection);
        ?>
        
    </body>
</html>