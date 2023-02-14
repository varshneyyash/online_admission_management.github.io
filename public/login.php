
<?php
    require __DIR__ . '/../src/bootstrap.php';

    $person = $_POST['person'];

    $errors = [];
    $inputs = [];

    if(is_post_request() && isset($_POST['cred'])) {

        $fields = [
            'username' => 'string',
            'password' => 'string'
        ];

        [$inputs, $errors] = filter($_POST, $fields);

        $username = $inputs['username'];
        $password = $inputs['password'];

        function authenticate(string $username, string $password, string $person) {
            if($person == "chairman")
                $query = "select * from chairmancred where Username = :username and Password = :password";
            else
                $query = "select * from membercred where Username = :username and Password = :password";

            // echo $query;

            $stmt = db() -> prepare($query);
            $stmt -> bindValue(":username", $username, PDO::PARAM_STR);
            $stmt -> bindValue(":password", $password, PDO::PARAM_STR);
            $stmt -> execute();

            return $stmt -> fetchAll(PDO::FETCH_ASSOC);
        }

        $data = authenticate($username, $password, $person);

        if(count($data) > 0) {
            $id = $data[0]['ID'];
            $query = "select PanelId from panel where memberId = :id";
            $stmt = db() -> prepare($query);
            $stmt -> bindValue(':id', $id, PDO::PARAM_STR);
            $stmt -> execute();
            $panelId = $stmt -> fetchAll(PDO::FETCH_ASSOC);

            $_SESSION['memberInfo'] = [$id, $person, $panelId[0]['PanelId']];
            header("Location: index.php/");
            exit();

        } else {
            echo "Incorrect Username or Password";
        }
    }
?>

<style>
    body {font-family: Arial, Helvetica, sans-serif;}
    /* form {border: 3px solid #f1f1f1;} */
    
    input[type=text], input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }
    button {
        background-color: #862d59;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    button:hover {
        opacity: 0.8;
    }

    .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color:#b6b7ba;
        color: white;
    }
    .container {
        padding: 30px;
        width: 500px;
        margin-left: 65vh;
        margin-top: 10vh;
    }
    span.psw {
        float: right;
        padding-top: 16px;
    }
    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }
        .cancelbtn {
            width: 100%;
        }   
    }

</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <form action="" method="post">
            <h3>Username: <input type="text" name="username" /><br><br>
            <h3>Password: <input type="password" name="password" /><br><br>
            <input type="hidden" name="person" value="<?php echo $person; ?>" />
            <button type="submit" name="cred">Login</button>
        </div>
        <div class="container" style="background-color:#f1f1f1">
            <button type="button" class="cancelbtn"><a href="homepage.php">Cancel</a></button>
            <span class="psw">Forgot <a href="homepage.php">password?</a></span>
        </div>
    </form>
</body>
</html>
