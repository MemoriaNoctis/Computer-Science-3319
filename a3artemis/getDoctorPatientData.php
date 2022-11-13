<!--   
    File: getDoctorPatientData.php

    Programmer Name: 85

    Description: retrieve all doctor and patient names from the database for user selection in creating new looksafter relations.

-->

<?php
    $doctorQuery = "SELECT * FROM doctor";
    $doctorResult = mysqli_query($connection, $doctorQuery);

    $patientQuery = "SELECT * FROM patient";
    $patientResult = mysqli_query($connection, $patientQuery);

    if (!$doctorResult || !$patientResult) {
        die("databases queries failed.");
    }

    echo "<h3>Select a doctor and patient to assign the selected patient to the selected doctor: </h3><br>";

    echo "Doctor:";
    echo '<fieldset id="doctors">';
    while ($row = mysqli_fetch_assoc($doctorResult)) {
        echo '<input type="radio" name="doctors" value="';
        echo $row["licensenum"];
        echo '">' . $row["licensenum"] . ": " . $row["firstname"] . " " . $row["lastname"] . "<br>";
    }
    echo "</fieldset>";

    echo "Patient:";
    echo '<fieldset id="patients">';
    while ($row = mysqli_fetch_assoc($patientResult)) {
        echo '<input type="radio" name="patients" value="';
        echo $row["ohipnum"];
        echo '">' . $row["ohipnum"] . ": " . $row["firstname"] . " " . $row["lastname"] . "<br>";
    }
    echo "</fieldset>";

    mysqli_free_result($doctorResult);
    mysqli_free_result($patientResult);

?>