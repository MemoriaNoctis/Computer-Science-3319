<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>Remove doctor from database</title>
    </head>

    <body>
        <?php
            include 'connectdb.php';
        ?>

        <?php
            $whichProf = $_POST["doctors"];

            //check if the selected doctor is the head doctor of a hospital
            $headDocQuery = 'SELECT * FROM hospital WHERE headdoc = "' . $whichProf . '"';
            $headDocResult = mysqli_query($connection, $headDocQuery);

            //check if the selected doctor has patients
            $patientQuery = 'SELECT * FROM looksafter WHERE licensenum = "' . $whichProf . '"';
            $patientResult = mysqli_query($connection, $patientQuery);

            echo $headDocQuery; echo "<br>"; echo $patientQuery;

            if (!empty($row = mysqli_fetch_assoc($patientResult))){
                echo "Error: cannot delete doctors assigned to patients.";
            } elseif (empty($row = mysqli_fetch_assoc($headDocResult))){
                //doctor is not a head doctor of a hospital
                $query = 'DELETE FROM doctor WHERE licensenum = "' . $whichProf . '"';
                $result = mysqli_query($connection, $query);

                if (!$result) {
                    die("Error: delete doctor failed-- ".mysqli_error($connection));
                }
                echo "Professor deleted!";
            }
            
        ?>


    </body>
</html>