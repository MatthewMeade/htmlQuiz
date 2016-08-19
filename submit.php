<?php
    include 'load.php';
    // print_r($tags);
    
    
    $total = 0;
    $score = 0;
    
    $answers = json_decode(file_get_contents("correctAnswers"));
    
    $questionTags = json_decode(file_get_contents("tags"), true);
    // print_r($questionTags);
    
    $tags = $settings["tags"];
    
    
    $tagScore;// = array();
    $tagCount;// = array();
    $tagGrades;// = array();
    
    foreach ($tags as $value) {
        $tagScore[$value] = 0;
        $tagCount[$value] = 0;
        $tagGrades[$value] = 0;
    }


    
    if($_POST == NULL){
      echo "<h1>Something went wrong!</h1> <a href='index.php'>If you didn't take the test yet, click here</a>";
      return;
    }
    
    foreach ($answers as $question => $correctAnswer) {
      
      $t = $questionTags[$question];
      $total++;
      $tagCount[$t]++;
      
      if(!isset($_POST[$question])){
        continue;
      }
      
      if(is_array($_POST[$question])){
        $total ++;
        $score += CompareArray($_POST[$question], $correctAnswer, 6);
        $tagScore[$t]++;
       }
       else if($_POST[$question] == strtolower($correctAnswer)){
          $score++;
          $tagScore[$t]++;
      }
      
      if($tagCount[$t] != 0){
        $tagGrades[$t] = $tagScore[$t] / $tagCount[$t];
      }
     
      
    }
    // echo "<br><br>";
    // print_r($questionTags);
    

    $grade = $score/$total * 100;
    
    if($_POST == NULL){
      $grade = 80;
    }
    
    $grade = round($grade);
    
    

    /* TIME */
    $totalTime = GetTotalTime();
    $timeDisplay = ConvertTime($totalTime);

    
    
    function ConvertTime($sec){
      $outString = "";
      $minutes = 0;
      $hours = 0;
  
      while($sec > 60){ 
          $minutes++;
          $sec -= 60;
      }
  
      while($minutes > 60){
        $hours++;
        $minutes -= 60;
      }
  
      if($hours > 0){
        $outString = $outString.$hours."h ";
      }
  
      if($minutes > 0){
        $outString = $outString.$minutes."m ";
      }
      
      $outString = $outString.round($sec, 0, PHP_ROUND_HALF_DOWN)."s";
  
      return $outString;
    }
    
    function GetTotalTime(){
      $finishTime = round(microtime(true) * 1000);
      $startTime = $_POST["startTime"];
      
      if($_POST["startTime"] == null){
        $totalTime = 100;
      }else{
        $totalTime = ($finishTime - $startTime) / 1000;
      }
      
      return $totalTime;
    } 
    
    
    //Compares array to a space seperated string of answers
    //Checked = array / correct = string
    function CompareArray($checked, $correct, $num){
        $correct = strtolower($correct);
        $correctArray = explode(" ", $correct);
        
        echo "<h2>~~~</h2>CORRECT ANSWERS: ";
        print_r($correctArray);
        echo "<br>USER SELECTED: ";
        print_r($checked);
        echo "<br><br>";
        
        $optionsArray = array("a", "b", "c", "d", "e", "f", "g", "h", "i");
        $score = 0;
        
        for($i = 0; $i < $num; $i++){
          $j = $optionsArray[$i];
          if(in_array($j, $correctArray) == in_array($j, $checked)){
            $score++;
          }
        }
        
        return $score / $num * 2;
        
    }
    
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Results: <?php echo $grade; ?>%</title>
    
    <!-- Required meta tags always come first -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta http-equiv="x-ua-compatible" content="ie=edge">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    
    <style type="text/css">
      h1{
        text-align: center;
      }
      
      .jumbotron{
        padding-top: 10px; 
        padding-bottom: 5px;
        
      }
      
      .goodScoreTron{
        border: 5px solid limegreen;
      }
      
      #gradeDisplay{
        font-weight: bold;
      }
      
      h4{
        text-align: center;
      }
      
      a{
        font-weight: bold;
        
      }
      
      .tag{
        background-color:#EEE;
        border-radius: 30%;
        
      }
      
      #top{
        position: relative;
        top: -300px;
      }
      
      #rightList{
        position: relative;
        left: -1000px;
      }
      
      #wrongList{
        position: relative;
        left: 1000px;
      }
      
      .list-group-item{
        height: 0px;
        font-size: 0px;
        padding-top: 0;
        padding-bottom: 5px;
      }
      
    </style>
  </head>
  <body>
    
    <span id="top">
    <h1 class="display-3" id="title">Results</h1>
    <div class="container">
      <div class="jumbotron gootScoreTron">
        <h1 class="display-1" id="gradeDisplay">??%</h1>
        <progress class="progress progress-striped progress-success" value="0" max="100"></progress>
        <h4>Time to complete: <?php echo $timeDisplay; ?></h2>
      </div>
    </div>
    </span>
    
    <div class="container">
      <div class="col-md-4" id="rightList">
        <h3>What you know</h3>
        <div class="list-group">
          
          <?php $correctCounter = 0 ?>
          <?php foreach ($tagGrades as $key => $value): ?>
            <?php  if($value == 1): ?>
              <?php $correctCounter++ ?>
              <a class="list-group-item list-group-item-action list-group-item-success">
              <?= strtoupper($key) ?>
              <span class="tag tag-default tag-pill pull-xs-right"><?= round($value * 100); ?>%</span>
              </a>
            <?php endif; ?> 
          <?php endforeach; ?>
          <?php if($correctCounter == 0): ?>
              <a class="list-group-item list-group-item-action list-group-item-danger"> Nothing! 
                <span class="tag tag-default tag-pill pull-xs-right">D:</span>
              </a>
          <?php endif; ?>
        </div>
      </div>
      
      <div class="col-md-4" id="center">
        
      </div>
      
      <div class="col-md-4" id="wrongList">
        <h3>What you don't know</h3>
        <div class="list-group">
          <?php $incorrectCounter = 0 ?>
          <?php foreach ($tagGrades as $key => $value): ?>
            <?php  if($value != 1): ?>
            <?php $incorrectCounter++ ?>
            <a class="list-group-item list-group-item-action list-group-item-danger">
            <?= strtoupper($key) ?>
            <span class="tag tag-default tag-pill pull-xs-right"><?= round($value * 100); ?>%</span>
            </a>
          <?php endif; ?> 
        <?php endforeach; ?>
        <?php if($incorrectCounter == 0): ?>
            <a class="list-group-item list-group-item-action list-group-item-success"> Nothing! 
              <span class="tag tag-default tag-pill pull-xs-right">:D</span>
            </a>
        <?php endif; ?>
        </div>
    </div>

    <!-- jQUERY AND BOOSTRAP SCRIPTS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  
    
    <script type="text/javascript">
    
      StartPageAnim();
      
      
      function StartPageAnim(){
        TopAnim();
        
      }
      
      function TopAnim(){
        $("#top").animate({
          top: "0px"
        }, 1000, function(){
          ListAnim("#rightList");
          ListAnim("#wrongList");
          
        });
      }
      
      var setIntervalID = null;
      
      function ListAnim(list){
        
        $(list).animate({
          left: "0"
        }, 1000, function(){
          ListElementAnim()
          if(setIntervalID == null){
              setIntervalID = setInterval(ScoreDisplay, 50);
              
          }
        });
      }
      
      
      
      function ListElementAnim(){
        $(".list-group-item").animate({
          height: "50px", 
          fontSize: "120%",
          padding: "5px"
        }, 1000, function(){
          
        });
      }
      
      
      var displayCounter = 0;
      
      function ScoreDisplay(){
        if(displayCounter <= <?php echo $grade; ?>){
          $("#gradeDisplay").html(displayCounter+"%");
          $(".progress").attr("value", displayCounter)
          displayCounter++;
        }else{
          clearInterval(setIntervalID);
        }
        
      }
          
    </script>
  </body>

</html>


























