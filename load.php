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
  
  $settings = parse_ini_file("settings/quizSettings.ini", true); //Settings.ini
  
  $groups = $settings["groups"]; //Name of groups
  $classes = $settings["classes"]; // Name of classes
  
  $answers = array(); //Array of answers to be checked with inputs in submit.php
  
  $numQuestions = 0;  //Total number of questions for progress and score
  
  
  //Loop though each of the groups
  foreach ($groups as $groupName) {
      //Load in an array of the questions
      $questionsINI = parse_ini_file("settings/$groupName.ini", true); 
      $questions = loadQuestions($questionsINI); 
      
      
      PrintQuestions($questions, $groupName);
  }
  
  
  
  /*Load Question
   * Takes an input of questions from an ini
   * Loops through each element of the array and converts it to an object
   * Returns array of question objects
   */
  
  function loadQuestions($inArray){
      $retArray = array(); //Declare array to return
      
      //Loop through each element in the ini
      foreach ($inArray as $key => $question) {
          //Convert the element to an object then add it to the reurn array
          $retArray[$key] = CreateQuestion($question, $key);
      }
      
      return $retArray;
  }
  
  
  /*Create Question
   * Takes an input of an array and a name for the question
   * Creates a new question class and set's it values to the cottect array element
   * Returns the new question
   */  
  function CreateQuestion($question, $name){
      //New question to return
      $new = new question();
      
      //Set values for the question equal to the correct array elements
      $new->name = $name;
      $new->type = $question["class"];
      $new->question = $question["question"];
      $new->correct = $question["correct"];
      
      //If the questions should shuffle when the page is loaded
      if(array_key_exists("shuffle", $question)){
        $new->shuffle = $question["shuffle"];  
      }
      
      //Loop through each answer and add it to the answers array
      for ($char = 'A'; array_key_exists("opt".$char, $question) ; $char++) { 
          $new->answers[$char] = $question["opt".$char];
      }
      
      //Add the question correct answer to a global array
      global $answers;
      $answers[$new->name] = $new->correct;
      
      //Increment total questions counter
      global $numQuestions;
      $numQuestions++;
      
      return $new;

      
  }  
  
  function PrintQuestions($questionArray, $groupName){
    
    foreach ($questionArray as $questionName => $question) {
        LoadFromTemplate($question);
    }
    
    
  }
  
  /*Load From Template
   *  Takes an input of a question
   *  Opens a file with the name of the question class then replaces the 
      placeholder text with the correct text
   *  
   */
  function LoadFromTemplate($question){
    
    //Load the file into a string
    $template = file_get_contents("./templates/$question->type.txt");
    
    //Replace the placeholder text with the question values
    $template = str_replace("[QUESTION_CLASS]", $question->type, $template);
    $template = str_replace("[QUESTION_TEXT]", $question->question, $template);
    $template = str_replace("[QUESTION_NAME]", $question->name, $template);
    
    //If the question has text as answers load them all in 
    if(isset($question->answers) == true){
      foreach ($question->answers as $key => $value) {
        $template = str_replace("[ANSWER_.$key.]", $value, $template);
      }
    }
    
    
    //Return string
    //return $template;
    echo $template;
  }
    
  
  
?>