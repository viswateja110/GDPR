<?php

$con=mysqli_connect('localhost','root','','gdpr');
if(!$con){
    die("ERROR connecting to DB". mysqli_error($connection));
}
