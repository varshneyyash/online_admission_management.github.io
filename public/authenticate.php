<?php
require __DIR__ . '/../src/bootstrap.php';
$errors = [];
$inputs = [];

if(is_post_request()) {

    $fields = [
        'check1' => 'string',
        'check2' => 'string',
        'check3' => 'string',
        'roll' => 'string',
        'token' => 'string',
        'member' => 'string',
        'panel' => 'string'
    ];

    [$inputs, $errors] = filter($_POST, $fields);
    $randomInt = $_SESSION['randomInt'];

    $data1 = $inputs['check1'];
    $data2 = $inputs['check2'];
    $data3 = $inputs['check3'];
    $roll = $inputs['roll'];
    $token = $inputs['token'];
    $member = $inputs['member'];
    $panel = $inputs['panel'];
    
    $salt = "ljabv1231kjalibv@2389lspuqohb";
    $orgToken = hash('sha256', $member.$salt.$randomInt.$panel);
    
    if($orgToken == $token) {
        $query = "insert into studentmarks (RollNo, check1, check2, check3) values (:roll, :data1, :data2, :data3) on duplicate key update check1=:data1, check2=:data2,check3=:data3";
        
        $stmt = db()->prepare($query);
        $stmt->bindValue(":data1", $data1, PDO::PARAM_STR);
        $stmt->bindValue(":data2", $data2, PDO::PARAM_STR);
        $stmt->bindValue(":data3", $data3, PDO::PARAM_STR);
        $stmt->bindValue(":roll", $roll, PDO::PARAM_STR);
        
        $stmt->execute();

        // echo "success";
    }
}
?> 