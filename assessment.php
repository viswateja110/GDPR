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
   
   <?php
   session_start();
   require_once('config.php');
   $categoryid=$_GET['assessid'];
   $sql="SELECT * from category where categoryid=".$categoryid;
   if($res=mysqli_query($con,$sql)){
        while($row=mysqli_fetch_row($res)){
            echo ' <nav>
            <div class="nav-wrapper blue-grey white-text">
              <div class="col s12">
                <a href="#!" class="breadcrumb">GDPR Compliance</a>
                <a href="#!" class="breadcrumb">'.$row[1].'</a>
                
              </div>
            </div>
          </nav>';
        }
   }


   ?>

   <br>
   <div class="container">
   <form action="process.php" method="POST">
       <?php
       $sql="SELECT * from questions WHERE categoryid=".$categoryid;
       $cnt=0;
       if($res=mysqli_query($con,$sql)){
           $cnt=1;
          while($row=mysqli_fetch_row($res)){
              $question=$row[1];
              $jsonIterator = new RecursiveIteratorIterator(
                new RecursiveArrayIterator(json_decode($row[3], TRUE)),
                RecursiveIteratorIterator::SELF_FIRST);
                
              echo "<div class='row'>";
              echo "<h6>".$cnt.") <b>".$row[1]."</b></h6>";
              foreach ($jsonIterator as $key => $val) {
                if(is_array($val)) {
                    #echo "$key:\n";
                } else {
                    $sql="SELECT * FROM responses where responseid=".$val;
                    if($resObj=mysqli_query($con,$sql)){
                        
                        while($r=mysqli_fetch_row($resObj)){
                            if($r[2]=='radio'){
                                echo '<p>
                            <label>
                              <input class="with-gap" name="'.$cnt.'" type="radio" value='.$r[0].' />
                              <span>'.nl2br($r[1]."\n",false).'</span>
                            </label>
                          </p>' ;
                            }else{
                                echo '<p>
                                <label>
                                  <input type="checkbox" class="filled-in" name="'.$cnt.'[]" value='.$r[0].' />
                                  <span>'.nl2br($r[1]."\n",false).'</span>
                                </label>
                              </p>' ;

                            }
                            
                          
                        }
                    }
                }
            }
              echo "</div>";
              $cnt++;
          }
          echo '<button class="btn waves-effect waves-light" type="submit" name="action">Submit
          <i class="material-icons right">send</i>
        </button>';
       }
       $_SESSION['cnt']=$cnt;
       



?>
</form>
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