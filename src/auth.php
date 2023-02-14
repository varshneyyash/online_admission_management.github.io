<?php

function getMarks($panelID) {
    $query = "select * from studentmarks where panelID =:panelID";
    $stmt = db() -> prepare($query);
    $stmt -> bindValue(':panelID', $panelID, PDO::PARAM_STR);
    $stmt -> execute();

    return $stmt -> fetchAll(PDO::FETCH_ASSOC);
}

function getNumOfMembers($panelID) {
    $query = "select * from panel where panelID =:panelID";
    $stmt = db() -> prepare($query);
    $stmt -> bindValue(':panelID', $panelID, PDO::PARAM_STR);
    $stmt -> execute();

    return count($stmt -> fetchAll(PDO::FETCH_ASSOC));
}

// function studentCheck($roll) {
//     $query = "select * from studentmarks where RollNo = :roll";
//     $stmt = db() -> prepare($query);
//     $stmt -> bindValue(':roll', $roll, PDO::PARAM_STR);
//     $stmt -> execute();

//     return $stmt -> fetchAll(PDO::FETCH_ASSOC); 
// }

function isStudentEligible($marks, $idx) {
    if($marks[$idx]['check1'] == 'false' || $marks[$idx]['check2'] == 'false' || $marks[$idx]['check3'] == 'false')
        return false;

    return true;
}

?>