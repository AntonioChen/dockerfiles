<?php 

if(!isset($_GET['password'])) {
    die('please input your password');
}

if($_GET['password'] != 'lcrc0423') {
    die('try again agai aga ag a ');
}



if(!isset($_GET['host'])) {
    highlight_file(__FILE__);
} else {
    $host = $_GET['host'];
    $sandbox = md5("glzjin". $_SERVER['REMOTE_ADDR']);
    echo 'you are in sandbox '.$sandbox;
    @mkdir($sandbox);
    chdir($sandbox);
    echo system("ping -c 5 ".$host);
}
