
<html>

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"></meta>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="main.js"></script>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    <div class="center">
    <h4 >Your Score</h4>
    <hr width="50%"/>
</div>
<?php
session_start();
require_once('config.php');
$total=$_SESSION['cnt']*100-100;

$resarr=array();
for($i=0;$i<$_SESSION['cnt']-1;$i++){

    if(isset($_POST["".($i+1).""])){
        $resarr[$i]=$_POST["".($i+1).""];
    }
    

}
$sql="SELECT * FROM responses where responseid=";
$sum=0;
foreach($resarr as $x){
    if($res=mysqli_query($con,$sql.$x)){
        while($row=mysqli_fetch_row($res)){
            $sum=$sum+$row[3];
        }
    }

}
$percentage=($sum/$total)*100;
echo '<h1 class="center">'.$percentage.'</h1>';
?>
<div class="center" style="margin-top:50px;">
        <h3>Recommendations To Be Followed</h3>
        <hr width="50%"/>
</div>
<div class="container" style="text-align:justify;">
    
        <?php
            $cnt=1;
            $sql="SELECT * from recommendation";
            if($res=mysqli_query($con,$sql)){
                while($row=mysqli_fetch_row($res)){
                    echo '<div class="row">';
                    echo "<h6>".$cnt.") <b>".$row[1]."</b></h6>";
                    echo '</div>';
                    $cnt++;
                }
            }
            ?>
    </div>

</div>




 <!--JavaScript at end of body for optimized loading-->
 <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>

</html>