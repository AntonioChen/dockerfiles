<html>

<head>
    <meta charset="UTF-8">
    <title>easy_sql</title>
</head>

<body>
<!-- sqlmap是没有灵魂的 -->
<form method="get">
    姿势: <input type="text" name="inject" value="1">
    <input type="submit">
</form>

<pre>
<?php
function waf1($inject) {
    preg_match("/select|update|delete|drop|insert|where|\./",$inject) && die('return preg_match("/select|update|delete|drop|insert|where|\./",$inject);');
}
function waf2($inject) {
    preg_match("/order| /i",$inject) && die('u can u up');
}
function replace($inject) {
    $inject = str_ireplace("select","",$inject);
    $inject = str_ireplace("by","",$inject);
    $inject = str_ireplace("and","",$inject);
    $inject = str_ireplace("union","",$inject);
    return $inject;
}
if(isset($_GET['inject'])) {
    $id = $_GET['inject'];
    $id = replace($id);
    waf1($id);
    waf2($id);
    $mysqli = new mysqli("127.0.0.1","root","root","supersqli");
    //多条sql语句
    $sql = "select * from `words` where id = '$id';";

    $res = $mysqli->multi_query($sql);

    if ($res){//使用multi_query()执行一条或多条sql语句
      do{
        if ($rs = $mysqli->store_result()){//store_result()方法获取第一条sql语句查询结果
          while ($row = $rs->fetch_row()){
            var_dump($row);
            echo "<br>";
          }
          $rs->Close(); //关闭结果集
          if ($mysqli->more_results()){  //判断是否还有更多结果集
            echo "<hr>";
          }
        }
      }while($mysqli->next_result()); //next_result()方法获取下一结果集，返回bool值
    } else {
      echo "error ".$mysqli->errno." : ".$mysqli->error;
    }
    $mysqli->close();  //关闭数据库连接
}


?>
</pre>

</body>

</html>
