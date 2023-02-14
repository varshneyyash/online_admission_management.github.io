<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="/Interview/Interview/src/inc/theme.css" rel="stylesheet"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      
        <script>
          $(document).ready(function(){
            $("#verifyotp").click(function(){
                
              //
              // https://2factor.in/API/V1/86ff2c3e-91b3-11ec-a4c2-0200cd936042/SMS/"+ $("#mobile").val() +"/AUTOGEN
                $.ajax({url: "https://2factor.in/API/V1/86ff2c3e-91b3-11ec-a4c2-0200cd936042/SMS/"+ $("#mobile").val() +"/"+ $("#otpsent").val(), success: function(result){
                $("#div1").html(result);
              }});
            });
          });
          </script>
   
    <title><?= $title ?? 'GBU: Admission 2022' ?></title>
    <?php flash() ?>
    
    <style>
        @media print{
             body {
        display: none;
    }
    
       .noprint {
                  visibility: hidden;
               }
        }
            
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
<!--     
    <nav class="py-2 bg-light border-bottom">
        <div class="container d-flex flex-wrap">
          <ul class="nav me-auto">
            <li class="nav-item"><a href="#" class="nav-link link-dark px-2 active" aria-current="page">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Features</a></li>
            <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Pricing</a></li>
            <li class="nav-item"><a href="#" class="nav-link link-dark px-2">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link link-dark px-2">About</a></li>
          </ul>
          <ul class="nav">
            <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Login</a></li>
            <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Sign up</a></li>
          </ul>
        </div>
      </nav>
      -->
      <nav class="navbar navbar-dark py-0 navbar-expand py-md-0 gb-dark" id="first-nav">
        <div class="navbar-collapse collapse" id="">
       <br/>
                <div class="clearfix py-1" />
        </div>
    </nav>
      <header class="py-3 mb-3 border-bottom">
       
        <div class="container d-flex flex-wrap justify-content-center">
          <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
          <img src="/Interview/Interview/gbu.jpg" style="height: 10vh; opacity:1;" alt="logo">
          <!-- <img src="/Interview/Interview/gbu.jpg" style="height: 60px;" class="logo" /> -->
          </a>
          WhatsApp Only: +911202344255<br/>
          HELPDESK (9:30 AM to 5:30 PM):  0120-234-4234/ 4247/ 4244 <br/> 
 help@gbu.ac.in <br/>
 
  
        </div>
        
      </header>

    <div class="container">
  
 
      