<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Add new doctor</title>
    </head>

    <body>
        <?php 
            include 'connectdb.php';
        ?>

        <?php
            $licenseNum = $_POST["licensenum"];
            $firstName = $_POST["firstname"];
            $lastName = $_POST["lastname"];
            $licenseDate = $_POST["licensedate"];
            $birthdate = $_POST["birthdate"];
            $hosWorksAt = $_POST["hosworksat"];
            $speciality = $_POST["speciality"];

            $hosValidQuery = 'SELECT hoscode FROM hospital WHERE hoscode = "' . $hosWorksAt . '"';
            $hosValid = mysqli_query($connection,$hosValidQuery);

            $licenseNumExistsQuery = 'SELECT licensenum FROM doctor WHERE licensenum = "' . $licenseNum '"';
            $licenseNumExists = mysqli_query($connection,$licenseNumExistsQuery);

            $query = 'INSERT INTO doctor VALUES ("' . $licenseNum . '", "' . $firstName . '", "' . $lastName . '", "' . $licenseDate . '", "' . $birthdate '", "' . $hosWorksAt . '", "' . $speciality . '")';

            echo $hosValidQuery 
            echo '<br>'
            echo $licenseNumExistsQuery 
            echo '<br>'
            echo $query 
            echo '<br>'

            
            if (!fnmatch([A-Z][A-Z][0-9][0-9], $licenseNum)){
                echo "Error: invalid license number (2 capital letters followed by 2 numbers).";
            } else if (!fnmatch([A-Z][A-Z][A-Z], $hosWorksAt)){
                echo "Error: invalid hospital code (3 capital letters).";
            } else if (!$hosValid){
                echo "Error: hospital of employment does not exist.";
            } else if ($licenseNumExists){
                echo "Error: doctor's license number is already exists in the database.";
            } else{
                if (!mysqli_query($connection, $query)) {
                    die("Error: insert failed" . mysqli_error($connection));
                }
               echo "Doctor added!";
               mysqli_close($connection);

            }
        ?>


    </body>
</html>