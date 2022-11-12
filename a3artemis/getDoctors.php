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
    </head>
    <body>
        <?php
            include 'connectdb.php';
        ?>
        <h1>List of all doctors in the database</h1>

        <ol>
            <?php
                $listBy = $_POST["listby"];
                $orderBy = $_POST["orderby"];
                $query = 'SELECT * FROM doctor ORDER BY ' . $listBy . ' ' .  $orderBy;
			
                $result = mysqli_query($connection, $query);

                if (!$result) {
                    die("database query failed.");
                }

                while ($row=mysqli_fetch_assoc($result)){
                    echo '<li>';
                    echo $row["lastname"];
                    echo $row["birthdate"];
                }

                mysqli_free_result($result);

            ?>

        </ol>

        
    </body>
</html>
