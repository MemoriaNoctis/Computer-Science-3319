<!--   
    File: getDoctors.php

    Programmer Name: 85

    Description: return all doctor information listed by either last name or birthdate, and by ascending or descending order.

-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>List all Doctors - Hospital Database</title>
    </head>
    <body>
        <?php
            include 'connectdb.php';
        ?>
        <h1>List of all doctors in the database</h1>

        <?php
            $listBy = $_POST["listby"]
            $orderBy = $_POST["orderby"]
            $query = 'SELECT * FROM doctor ORDER BY ' . $listBy . $orderBy;

            $result = mysqli_query($connection, $query);

            if (!$result) {
                die("database query failed.");
            }

            

        ?>

    </body>
</html>
