<!--   
    File: getDoctors.php

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

        <ol>
            <?php
                $whichSpeciality = $_POST["speciality"];
                $query = 'SELECT * FROM doctor WHERE speciality = "' . $whichSpeciality . '"';
                
                $result=mysqli_query($connection,$query);
                if (!$result) {
                    die("database query failed.");
                }
                while ($row=mysqli_fetch_assoc($result)) {
                    echo '<li>';
                    echo $row["lastname"];
                    echo "<br>";
                    echo $row["speciality"];
                }
                mysqli_free_result($result);
            ?>
        </ol>
    </body>
</html>