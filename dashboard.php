<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GDPR COMPLIANCE TOOl</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="main.js"></script>
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }
        
        main {
            flex: 1 0 auto;
        }
        
        .parallax-container {
            height: 300px;
        }
    </style>
</head>

<body bgcolor="#eeeeee" style=" font-family: 'Montserrat', sans-serif;">
    <nav>
        <div class="nav-wrapper blue-grey darken-4">
            <a href="#" class="brand-logo">GDPR COMPLIANCE TOOL</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
            </ul>
        </div>
    </nav>
   <h3 class="center"> Dashboard</h1>
   <hr width="50%" class="center"/>
   <p class="center">Choose a Category to take assessment</p>
   <div class="">
   <div class="row" >
        <?php
            require_once('config.php');

            $sql="SELECT * FROM category";
            $res=mysqli_query($con,$sql);
            if($res){
                while ($row=mysqli_fetch_row($res)){
                    echo ' <div class="col s12 m3">
                    <div class="card small blue-grey darken-1 center">
                      <div class="card-content white-text">
                        <span class="card-title">'.$row[1].'</span>
                      </div>
                      <div class="card-action">
                        <a href="assessment.php?assessid='.$row[0].'">proceed</a>
                      </div>
                    </div>
                  </div>';
                }
            }
            ?>
    </div>
    </div>



    <footer class="page-footer blue-grey darken-4">
        <div>
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">GDPR COMPLIANCE TOOL</h5>
                    <p class="grey-text text-lighten-4"></p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Links</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="#!">Home</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">ABOUT</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                © 2018 Copyright
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.parallax').parallax();
        });
    </script>
</body>

</html>