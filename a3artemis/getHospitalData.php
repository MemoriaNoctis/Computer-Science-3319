<!--   
    File: getHospitalData.php

    Programmer Name: 85

    Description: retrieves all hospitals for user selection.

-->

<?php
    $query = "SELECT * FROM hospital";
    $result = mysqli_query($connection,$query);
    if (!$result) {
            die("databases query failed.");
        }
    while ($row = mysqli_fetch_assoc($result)) {
            echo '<input type="radio" name="hospitals" value="';
            echo $row["hoscode"];
            echo '">' . $row["hosname"] . ", " . $row["city"] . ", " . $row["prov"] . "<br>";
    }
    mysqli_free_result($result);
?>