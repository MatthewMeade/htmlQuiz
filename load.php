<?php 

  class question{
    public $name;
    public $type;
    public $question;
    public $correct;
    public $shuffle;
    public $answers;
  }
  

  $groups = array();
  
  $settings = parse_ini_file("test.ini", true);

  foreach ($settings as $key => $question){
    if(!array_key_exists($question["class"], $groups)){
      $groups[$question["class"]] = array();
    }
    
    sortQuestion($question, $key);
  } 
  
  print_r($groups["trueFalse"]["htmlMeaning"]);
  
  function sortQuestion($question, $name){
      $new = new question();
      
      $new->name = $name;
      $new->type = $question["class"];
      $new->question = $question["question"];
      $new->correct = $question["correct"];
      
      if(array_key_exists("shuffle", $question)){
        $new->shuffle = $question["shuffle"]; 
      }
      
      for ($char = 'A'; array_key_exists("opt".$char, $question) ; $char++) { 
          $new->answers[$char] = $question["opt".$char];
      }

      global $groups;
      $groups[$question["group"]][$name] = $new;
      
  }
  
  
?>