<!--   
    File: getDoctorData.php

    Programmer Name: 85

    Description: retrieve all doctor names from the database for user selection.

-->

<?php
    $query = "SELECT * FROM doctor";
    $result = mysqli_query($connection,$query);
    if (!$result) {
            die("databases query failed.");
        }
    while ($row = mysqli_fetch_assoc($result)) {
            echo '<input type="radio" name="doctors" value="';
            echo $row["licensenum"];
            echo '">' . $row["licensenum"] . ": " . $row["firstname"] . " " . $row["lastname"] . "<br>";
    }
    mysqli_free_result($result);
?>