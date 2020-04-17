<?php
error_reporting(0);
if (empty($_GET['id'])) {
        show_source(__FILE__);
        die();
} else {
        include ('flag.php');
        $a = 'lcrcbank';
        $id = $_GET['id'];
        @parse_str($id);
        if ($a != $b && md5($a) === md5($b)) {
                echo $flag;
        } else {
                exit('try again, agai, aga, ag, a,  ');
        }
}
?>

