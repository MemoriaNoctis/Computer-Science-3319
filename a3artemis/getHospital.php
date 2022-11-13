<!--   
    File: getHospital.php

    Programmer Name: 85

    Description: displays hospital name, city, province, number of beds, head doctor's name, all doctors working at the hospital.

-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>Hospital data</title>
    </head>

    <body>
        <?php 
            include 'connectdb.php';
        ?>

        <?php
            $whichHospital = $_POST["hospitals"];
            $query = 'SELECT * FROM hospital WHERE hoscode = "' . $whichHospital . '"';
            $result = mysqli_query($connection,$query);
            
            
            $headDocQuery = 'SELECT firstname, lastname FROM hospital, doctor WHERE hoscode = "' . $whichHospital . '" AND headdoc = licensenum;
            ';
            echo $headDocQuery;
            $headDocResult = mysqli_query($connection, $headDocQuery);

            $employeeQuery = 'SELECT firstname, lastname FROM doctor WHERE hosworksat = "' . $whichHospital . '"';
            $employeeResult = mysqli_query($connection, $employeeQuery);
                
            if (!$result || !$headDocResult || !$employeeResult) {
                    die("databases queries failed.");
            }

            while ($row=mysqli_fetch_assoc($result)){
                echo "<h1>" . $row["hosname"] . "</h1>";
                echo '<font size = "+1"> <b>' . $row["city"] . ", " . $row["prov"] . "</b></font>";

                echo "<u>Number of beds: </u>" . $row["numofbed"] . "<br>";
                
                echo "<u>Head Doctor</u><br>";
                while ($headDocRow=mysqli_fetch_assoc($headDocResult)){
                    echo $headDocRow["firstname"] . " " . $headDocRow["lastname"];
                }

                echo "<br>";

                echo "<u>Doctors employed at hospital</u><br>";
                echo "<ol>";
                while ($employeeRow=mysqli_fetch_assoc($employeeResult)){
                    echo '<li>';
                    echo $employeeRow["firstname"] . " " . $employeeRow["lastname"];
                }
                echo "</ol>";
                
            }

            mysqli_free_result($result);
        ?>
    </body>
</html>