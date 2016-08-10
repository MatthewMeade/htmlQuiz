<?php 

  class question{
    public $name;
    public $type;
    public $question;
    public $correct;
    public $shuffle;
    public $answers;
    public $html;
  }
  
  $settings = parse_ini_file("quizSettings.ini", true);
  $groups = $settings["groups"];
  $classes = $settings["classes"];
  $answers = array();
  
  $numQuestions = 0;  
  
  

  
  
  
  
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

      global $group;
      $group[$question["group"]][$name] = $new;
      global $numQuestions;
      $numQuestions++;
      
  }  
  
  
  function ConvertQuadImage($question){
    $out = "";
    
    $out = $out . "<h2>Question</h2>\n";
    $out = $out . "<fieldset class='question " . $question->name . "'>\n";
    $out = $out . "\t<legend>" . $question->question . "</legend>\n";
    
    for ($i=0; $i < 2 ; $i++) { 
      $out = $out . "\t<div class='row'>\n";
      for ($j=0; $j < 2; $j++) { 
        $out = $out . "\t\t<div class='col-lg-6'>\n";
        $char = 'A' + (($i * 2) + $j);
        $out = $out . "\t\t\t<input type='radio' name='" . $question->name . "' value='" . strtolower($char) . "' id='". $question->name . $char ."'>\n";
        $out = $out . "\t\t\t<label for='". $question->name . $char . "'><img src='quizSnips/". $question->name . $char. ".png'></lablel>\n";
        $out = $out . "\t\t</div>\n";
      }
      $out = $out . "\t</div>\n";
    }
    
    $out = $out . "</fieldset>\n\n";
    // echo $out;
    return $out;
    
  }
    
  
  
?>