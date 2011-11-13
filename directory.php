<?php

 $server_host = $_SERVER['HTTP_HOST'];
  $script_name = $_SERVER['SCRIPT_NAME'];
 echo $server_host."<br/>";
echo $script_name."<br/>"; 
echo "<br/>";
    $url = 'http://' . $server_host . rtrim($script_name, 'directory.php') . 'category.php?title=';
echo $url;
echo "<br/>";
echo "<br/>";  
$username = 'kwilliams';
  $password = 'mongo1234';
  $connection = new Mongo("mongodb://${username}:${password}@localhost/test",array("persist" => "x"));

  $db = $connection->recipe;
  $collection = $db->stuff;
  $cursor = $db->command(array("distinct" => "stuff", "key" => "Shrt_Desc.title"));
  
        foreach($cursor as $record){

           foreach($record as $key => $value){

              echo '<a href="' . $url . $value . '">' . $value . '</a></br>' . "\r\n";

       }
              }

     echo 'done';
?>
