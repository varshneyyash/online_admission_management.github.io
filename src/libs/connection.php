<?php

/**
 * Connect to the database and returns an instance of PDO class
 * or false if the connection fails
 *
 * @return PDO
 */

      
function db(): PDO {               // function for creating connection object
    static $pdo;

    if (!$pdo) {
      $dsn = "mysql:host=localhost;dbname=interviewresult;charset=UTF8";
      return new PDO($dsn, "root", "");    // return connection object

    //     return new PDO(
    //        sprintf("mysql:host=%s;Database=%s;", DB_HOST, DB_NAME),
    //         DB_USER,
    //         DB_PASSWORD,
    //        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    //    );
    }
    
    return $pdo;
}

// function getPrograms(string $input){
//      $sql = 'SELECT DISTINCT code,programgroup
//                 FROM Programs
//                  WHERE  (admissionopen = 1 AND code NOT IN (SELECT ProgramCode FROM Application WHERE (CandidateId = :currentuser)) AND level=:level) ORDER BY programgroup';

//     $statement = db()->prepare($sql);
//     $statement->bindValue(':level', $input, PDO::PARAM_STR);
//     $statement->bindValue(':currentuser', current_user_id(), PDO::PARAM_INT);
//     $statement->execute();
//     return $statement->fetchAll();
//     //return $statement->fetch(PDO::FETCH_ASSOC);
// }



// function getTestDetails(string $testcode,int $cid){
    
//      $sql = 'SELECT * FROM TestDetails
//              WHERE (Testcode = :tcode) AND (Id = :cid)';

//     $statement = db()->prepare($sql);
//     $statement->bindValue(':tcode', $testcode, PDO::PARAM_STR);
//     $statement->bindValue(':cid', $cid, PDO::PARAM_INT);
//     $statement->execute();
//    // return $statement->fetchAll();
//     return $statement->fetch(PDO::FETCH_ASSOC);
// }
