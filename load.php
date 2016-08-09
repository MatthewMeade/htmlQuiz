<?php 
  
  $settings = parse_ini_file("test.ini", true);

  foreach ($settings as $key => $question){
    echo $key.": ";
    print_r($question);
    echo "<br><br>";
  }
?>