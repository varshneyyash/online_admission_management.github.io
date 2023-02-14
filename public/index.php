<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/index.php';
view('header', ['title' => 'Dashboard']) 
?>

<?php
//Keep your php code here or in /src/index.php file
//Below this start HTML PART 

$member = $_SESSION['memberInfo'];
$memberID = $member[0];
$person = $member[1];
$panelID = $member[2];

$marks = getMarks($panelID);

$salt = "ljabv1231kjalibv@2389lspuqohb";
$randomInt = rand();

$_SESSION['randomInt'] = $randomInt;
$token = hash('sha256', $memberID.$salt.$randomInt.$panelID);

echo "<p class='mycss'> Hello ". $memberID . ", Your Panel ID is $panelID </p>";

?>


<div class="container">
    <?php

if(isset($_GET['studentData'])) {

    $idx = $_GET['idx'];
    $flag = false;
    $examMarks = 0;

    if ($marks[$idx]['PassedExam'] == 'exam1') {
        $examPassed = 'CSIR/UGC-JRF(Valid Fellowship)/GATE: (5 Marks)';
        $examMarks = 5;
    } else if($marks[$idx]['PassedExam'] == 'exam2') {
        $examPassed = 'CSIR/UGC-NET: (3 Marks)';
        $examMarks = 3;
    } else if($marks[$idx]['PassedExam'] == 'exam3') {
        $examMarks = 0;
        $examPassed = 'Other: (0 Marks)';
    }
    
    if($person != "chairman") {
        $info = isStudentEligible($marks, $idx);
        if($info == false)
            $flag = true;
    }

    ?>

<div style="position:absolute; left: 450px; top: 150px;">
    <form action="index.php" method="post" onsubmit="return validate()">
        <table cellpadding="5px">
            <tr>
                <td style="font-weight: bold;"> Roll No. : </td>
                <td> <?php echo $marks[$idx]['RollNo'] ?> </td>
            </tr>

            <tr>
                <td style="font-weight: bold;"> Exam passed : </td>
                <td> <?php echo $examPassed ?> </td>
            </tr>

            <?php
            if($person == "chairman") { 
            ?>
            <tr>
                <td style="font-weight: bold;"> Candidate Possesses the competence in the proposed Area of Research : </td>
                <td> <input type="checkbox" name="check1" id="c1" onclick="checkData('<?php echo $marks[$idx]['RollNo']; ?>', '<?php echo $memberID; ?>', '<?php echo $panelID ?>')" <?php if($marks[$idx]['check1'] == "true") echo "checked"; ?> /> </td>
            </tr>

            <tr>
                <td style="font-weight: bold;"> The Research work can be suitably undertaken in the Department : </td>
                <td> <input type="checkbox" name="check2" id="c2" onclick="checkData('<?php echo $marks[$idx]['RollNo']; ?>', '<?php echo $memberID; ?>', '<?php echo $panelID ?>')" <?php if($marks[$idx]['check2'] == "true") echo "checked"; ?> /> </td>
                <span class="checkmark"></span>
            </tr>

            <tr>
                <td style="font-weight: bold;"> Proposed Area of Research can contribute to New/additional Knowledge : </td>
                <td> <input type="checkbox" name="check3" id="c3" onclick="checkData('<?php echo $marks[$idx]['RollNo']; ?>', '<?php echo $memberID; ?>', '<?php echo $panelID ?>')" <?php if($marks[$idx]['check3'] == "true") echo "checked"; ?> /> </td>
                <span class="checkmark"></span>
            </tr>
            <?php
            }
            ?>

            <tr>
                <td style="font-weight: bold;"> Research Apptitude (10 Marks) : </td>
                <td> <input type="number" name="marks1" id="m1" <?php if($flag) echo "readonly"; ?> /> </td>
            </tr>

            <tr>
                <td style="font-weight: bold;"> Research Proposal Presentation (05 Marks) : </td>
                <td> <input type="number" name="marks2" id="m2" <?php if($flag) echo "readonly"; ?> /> </td>
            </tr>

            <tr>
                <td style="font-weight: bold;"> Subject Knowledge (10 Marks) : </td>
                <td> <input type="number" name="marks3" id="m3" <?php if($flag) echo "readonly"; ?> /> </td>
            </tr>

            <?php
                $newMarks = getMarks($panelID);
                
                $roll = $newMarks[$idx]['RollNo'];
                $m1 = $newMarks[$idx]['M1'];
                $m2 = $newMarks[$idx]['M2']; 
                $m3 = $newMarks[$idx]['M3']; 
                $num = getNumOfMembers($panelID);
                
                $avg = ($m1 + $m2 + $m3 + $num * $examMarks)/ ($num);
                ?>

            <tr>
                <td style="font-weight: bold;"> Total Average Marks of Student : </td>
                <td> <?php echo $avg; ?> </td>
            </tr>

            <div class="button" style="position: fixed; right: 16vh; top: 76vh; font-size: 14px; padding: 4px 4px;">
                 <input type="hidden" value="<?php echo $marks[$idx]['RollNo'] ?>" name="rollno" />
                 <input type="hidden" value="<?php echo $marks[$idx]['PassedExam'] ?>" name="passedExam" /> 
                 <input type="submit" value="Update Marks" name="updateMarks" /> 
        </div>
        </table>
    </form>
</div>

<?php
}
?>

<?php
if(isset($_GET['logout'])) {
    session_destroy();
    header("Location: /../Interview/Interview/public/homePage.php");
    exit();
}
?>

<form action="" method="get" class="button" style="position: absolute; right: 16vh; top: 24vh">
    <input type="submit" value="Logout" name="logout">
</form>

<table border="1px" class="tablecss">
    <tr>
        <th style = "text-align: center"> Serial No. </th>
        <th style = "text-align: center"> Roll Number </th>
        <th style = "text-align: center"></th>
    </tr>
    
    <?php
    for($i = 0; $i < count($marks); $i++) {
        ?>
        <form action="" method="get">
            <tr>
                <td style = "text-align: center; border: 1px solid"> <?php echo ($i+1)."."; ?> </td>
                <td style = "text-align: center; border: 1px solid"> <?php echo $marks[$i]['RollNo']; ?>
                <input type="hidden" name="idx" value="<?php echo $i; ?>" /></td>
                <td style = "text-align: center; border: 1px solid"> <input type="submit" value="view" name="studentData" /> </td>
            </tr>
        </form>
    <?php
    }
    ?>

</table>

<style>
    /* .container{
        margin-left: 15vh; */
    }
    .container input:checked ~ .checkmark{
        background-color: #862d59;
    }

    .mycss{
        font-size: large;
        font-weight: bold;
        text-align: right;
    }
    
    table {
        border-collapse: collapse;
        margin-left: 8px;
        margin-top: 80px;
    }

    th, td {
        text-align: left;
        padding: 5px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #ddd;
    }

    th {
        background-color: #862d59;
        color: white;
    }

    .button {
  
      background-color: #862d59; 
      border: none;
      color: white;
      padding: 4px 4px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      margin: 1px 2px;
      cursor: pointer;
      -webkit-transition-duration: 0.1s; /* Safari */
      transition-duration: 0.2s;
    }

    .button:hover {
      box-shadow: 0 12px 16px 0 rgba(0,0,0,0.05),0 17px 50px 0 rgba(0,0,0,0.05);
    } 
</style>

<script>
    function validate() {
        const m1 = parseInt(document.getElementById("m1").value, 10);
        const m2 = parseInt(document.getElementById("m2").value, 10);
        const m3 = parseInt(document.getElementById("m3").value, 10);

        let flag = true;

        if(m1 < 0 || m1 > 10) {
            flag = false;
        } else if(m2 < 0 || m2 > 5) {
            flag = false;
        } else if(m3 < 0 || m3 > 10) {
            flag = false;
        }

        if(flag == false) {
            alert("Given marks should be within the specified range");
            return false;
        }

        return true;
    }

    function checkData(roll, member, panel) {
        const req = new XMLHttpRequest();

        const c1 = document.querySelector("#c1");
        const c2 = document.querySelector("#c2");
        const c3 = document.querySelector("#c3");
        const token = "<?php echo $token; ?>";

        const c1Data = c1.checked;
        const c2Data = c2.checked;
        const c3Data = c3.checked;

        req.open("POST", "http://localhost/Interview/Interview/public/authenticate.php", true);
        req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        req.send("check1="+c1Data+"&check2="+c2Data+"&check3="+c3Data+"&roll="+roll+"&token="+token+"&member="+member+"&panel="+panel);

        // req.onreadystatechange = function() {
        //     if(req.readyState == 4 && req.status == 200)
        //         document.getElementById("testing").innerHTML = req.responseText;
        // }
    }
</script>
</div>


<?php view('footer') ?>