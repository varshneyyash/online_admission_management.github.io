<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        
        <style>
            h1{
                margin-top: -1vh;
            }
            .block{
                display: flex;
                flex-direction: row;
                padding-left: 40vh;
            }
            .container {
                border-style: solid;
                position: relative;
      margin-left: 17vh;
      width: 100%;
      max-width: 400px;
    }
    .container h4{
        font-size: large;
    }

    .container img {
        width: 100%;
        height: auto;
    }
    
    .container .btn {
        position: absolute;
        top: 91%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        background-color: #555;
        color: white;
        font-size: 16px;
        padding: 12px 24px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        text-align: center;
    }
    
    .container .btn:hover {
        opacity: 0.8;
    }
    .container1 {
      border-style: solid;
      position: relative;
      width: 100%;
      max-width: 400px;
    }
    .container1 h4{
        font-size: large;
    }  
    
    .container1 img {
        width: 100%;
        height: auto;
    }
    
    .container1 .btn {
        position: absolute;
        top: 91%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        background-color: #555;
        color: white;
        font-size: 16px;
        padding: 12px 24px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        text-align: center;
    }
    
    .container1 .btn:hover {
        opacity: 0.8;
    }
    </style>
</head>
<body>
    <div class="logo">
        <img src=".\images\gbu.jpg" style="height: 15vh; opacity:1; margin-left:95vh;" alt="logo">
    </div>
    <h1><center>Gautam Buddha University</center></h1>
    <h3><center>Online Addmission Management System </center></h3>
    <div class="block">
        <div class="container1">
        <h4><center>Login as Chairman</center></h4>
            <img src=".\images\chairman logo.jpg" alt="Snow">
            <form action="login.php" method="post">
                <input type="hidden" name="person" value="chairman" />
                <input type="submit" value="Login" class="btn" />
            </form>
        </div>
        <div class="container">
        <h4><center>Login as Member</center></h4>
            <img src=".\images\member logo.jpg" alt="Snow">
            <form action="login.php" method="post">
                <input type="hidden" name="person" value="member" />
                <input type="submit" value="Login" class="btn" />
            </form>
        </div>
    </div>    
</body>
</html>