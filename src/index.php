<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$errors = [];
$inputs = [];

if (is_post_request()) {
    // echo "Hello World";

    $fields = [
        'rollno' => 'string',
        'marks1' => 'int',
        'marks2' => 'int',
        'marks3' => 'int'
    ];

    [$inputs, $errors] = filter($_POST, $fields);

    $rollno = $inputs['rollno'];
    $marks1 = $inputs['marks1'];
    $marks2 = $inputs['marks2'];
    $marks3 = $inputs['marks3'];

    $queryImportMarks = "select * from studentmarks where RollNo = :rollno";
    $stmt1 = db()->prepare($queryImportMarks);
    $stmt1->bindValue(':rollno', $rollno, PDO::PARAM_STR);
    $stmt1->execute();
    $marks = $stmt1 -> fetchAll(PDO::FETCH_ASSOC);
    
    $m1old = $marks[0]['M1'];
    $m2old = $marks[0]['M2'];
    $m3old = $marks[0]['M3'];

    $marks1 += $m1old;
    $marks2 += $m2old;
    $marks3 += $m3old;

    $querySetMarks = "insert into studentmarks (RollNo, M1, M2, M3) values (:rollno, :marks1, :marks2, :marks3) on duplicate key update RollNo = :rollno, M1 = :marks1, M2 = :marks2, M3 = :marks3";

    $stmt2 = db()->prepare($querySetMarks);
    $stmt2->bindValue(':rollno', $rollno, PDO::PARAM_STR);
    $stmt2->bindValue(':marks1', $marks1, PDO::PARAM_INT);
    $stmt2->bindValue(':marks2', $marks2, PDO::PARAM_INT);
    $stmt2->bindValue(':marks3', $marks3, PDO::PARAM_INT);

    $stmt2->execute();


    // $fields = [
    //     'rollno' => 'string[]',
    //     'c1marks'=>'int[]',
    //     'c2marks'=>'int[]',
    //     'c3marks'=>'int[]',
    //     'c4marks'=>'int[]', 
    //     'testCode' => 'string[]'
    // ];

    // [$inputs, $errors] = filter($_POST, $fields);
    
    // $rollno = $inputs['rollno'];
    // $c1marks = $inputs['c1marks'];
    // $c2marks = $inputs['c2marks'];
    // $c3marks = $inputs['c3marks'];
    // $c4marks = $inputs['c4marks'];
    // $testCode = $inputs['testCode'];
    
    // function updatemarks(string $rollno, string $testCode, int $c1marks, int $c2marks, int $c3marks, int $c4marks) {
    //     //$query = "insert into result (roll, TestCode, c1, c2, c3, c4) values ('$roll', '$testCode', '$c1marks', '$c2marks', '$c3marks', '$c4marks')";

    //     $sql = 'insert into result (roll, TestCode, c1, c2, c3, c4) values (:rollno, :testCode, :c1marks, :c2marks, :c3marks, :c4marks)
    //             on duplicate key update c1=:c1marks, c2=:c2marks, c3=:c3marks, c4=:c4marks';
        
    //     $statement = db()->prepare($sql);
    //     $statement->bindValue(':rollno', $rollno, PDO::PARAM_STR);
    //     $statement->bindValue(':testCode', $testCode, PDO::PARAM_STR);  
    //     $statement->bindValue(':c1marks', $c1marks, PDO::PARAM_INT);
    //     $statement->bindValue(':c2marks', $c2marks, PDO::PARAM_INT);
    //     $statement->bindValue(':c3marks', $c3marks, PDO::PARAM_INT);
    //     $statement->bindValue(':c4marks', $c4marks, PDO::PARAM_INT);

    //     $statement->execute();
    // }

    // $rolls = getRoll('test1');
    
    // for($i = 0; $i < count($rolls); $i++) {
    //     updatemarks($rollno[$i], $testCode[$i], $c1marks[$i], $c2marks[$i], $c3marks[$i], $c4marks[$i]);
    // }
}


//     function update_new_program(string $programid,int $apid, string $programname, string $programlevel){
//     $sql = 'UPDATE Application SET ProgramCode=:pid,Program=:pname,Label=:lbl WHERE ApplicationId=:apid';
    
//     $statement = db()->prepare($sql);
//     $statement->bindValue(':apid', $apid, PDO::PARAM_INT);
//     $statement->bindValue(':pid', $programid, PDO::PARAM_STR);
//     $statement->bindValue(':pname', $programname, PDO::PARAM_STR);
//     $statement->bindValue(':lbl', $programlevel, PDO::PARAM_STR);
//     $statement->execute();
//    // return $statement->fetchAll();
//     //return $statement->fetch(PDO::FETCH_ASSOC);
//     }
    
//     function apply_new_program(string $programid,int $candidateid,string $programname, string $programlevel){
//           $chksql = 'select ApplicationId  from application where CandidateId=:cid and Status=0';
//           $sql = 'Insert into Application(CandidateId, ProgramCode,Program,Label) OUTPUT INSERTED.ApplicationId values (:cid,:pid,:pname,:lbl)';
//     $statement1 = db()->prepare($chksql);
//     $statement1->bindValue(':cid', $candidateid, PDO::PARAM_INT);
//     $statement1->execute();
//     $apid = $statement1->fetch(PDO::FETCH_COLUMN);
//     if(!$apid) {
//          $statement = db()->prepare($sql);
//     $statement->bindValue(':cid', $candidateid, PDO::PARAM_INT);
//     $statement->bindValue(':pid', $programid, PDO::PARAM_STR);
//     $statement->bindValue(':pname', $programname, PDO::PARAM_STR);
//     $statement->bindValue(':lbl', $programlevel, PDO::PARAM_STR);
//     $statement->execute();
//    // return $statement->fetchAll();
//     return $statement->fetch(PDO::FETCH_ASSOC);
//     }
//  else {
//       $res = update_new_program($programid,$apid,$programname,$programlevel);  
//     }


   
//     }
    
    
    
//     $res = apply_new_program($inputs['program'],$inputs['CandidateId'],$programname,$programlevel);
//     $_SESSION["ApplicationId"] = $res['ApplicationId'];
//     $_SESSION["ProgramMode"] = $programid;
//     redirect_to('confirm.php');
    
// }