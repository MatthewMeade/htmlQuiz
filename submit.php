<?php

    include 'load.php';
    
    $total = 0;
    $score = 0;

    $answers = json_decode(file_get_contents("correctAnswers"));
    // print_r($answers);
    // echo "<br>";
    // print_r($_POST);
    // echo "<br><br><br>";
    // print_r($_POST["inlineSelect"]);
    
    if($_POST == NULL){
      echo "<h1>Something went wrong!</h1> <a href='index.php'>If you didn't take the test yet, click here</a>";
      return;
    }

    foreach ($answers as $question => $correctAnswer) {
      $total++;
      if(is_array($_POST[$question])){
        $total += 2;
        $score += CompareArray($_POST[$question], $correctAnswer, 6);
       }
       else if($_POST[$question] == strtolower($correctAnswer)){
          $score++;
      }
     
      
    }

    $grade = $score/$total * 100;
    
    if($_POST == NULL){
      $grade = 80;
    }
    
    

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
        
        // echo "<h2>~~~</h2>CORRECT ANSWERS: ";
        // print_r($correctArray);
        // echo "<br>USER SELECTED: ";
        // print_r($checked);
        // echo "<br><br>";
        
        for($i = 'a', $j = 0; $i < 'g'; $i++){
            // echo "$i";
            if(in_array($i, $correctArray) == in_array($i, $correctArray)){
                // echo "<br>MATCH</br>";
                $j++;
            }
        }
        
        $perc = $j / $num;
        // echo "<br>Correct = $j / $num = $perc<br>";
        
        return $j / 2;
        
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
          <a a href="http://www.w3schools.com/html/html_intro.asp" target="_blank"  class="list-group-item list-group-item-action list-group-item-success">
            Structure
            <span class="tag tag-default tag-pill pull-xs-right">100%</span>
          </a>
          
          <a href="http://www.w3schools.com/html/html_formatting.asp" target="_blank" class="list-group-item list-group-item-action list-group-item-success">
            Text
            <span class="tag tag-default tag-pill pull-xs-right">100%</span>
          </a>
          
          <a href="http://www.w3schools.com/html/html_lists.asp" target="_blank" class="list-group-item list-group-item-action list-group-item-success">
            Lists
            <span class="tag tag-default tag-pill pull-xs-right">100%</span>
          </a>
          
          <a href="http://www.w3schools.com/html/html_links.asp" target="_blank" class="list-group-item list-group-item-action list-group-item-success">
            Links
            <span class="tag tag-default tag-pill pull-xs-right">100%</span>
          </a>
          
          <a href="http://www.w3schools.com/html/html_images.asp" target="_blank" class="list-group-item list-group-item-action list-group-item-success">
            Images
            <span class="tag tag-default tag-pill pull-xs-right">100%</span>
          </a>
          
          <a href="http://www.w3schools.com/html/html_tables.asp" target="_blank" class="list-group-item list-group-item-action list-group-item-success">
            Tables
            <span class="tag tag-default tag-pill pull-xs-right">100%</span>
          </a>
          
          <a href="http://www.w3schools.com/html/html_forms.asp" target="_blank" class="list-group-item list-group-item-action list-group-item-success">
            Forms
            <span class="tag tag-default tag-pill pull-xs-right">100%</span>
          </a>
          
          <a href="http://www.w3schools.com/html/html5_audio.asp" target="_blank" class="list-group-item list-group-item-action list-group-item-success">
            Audio
            <span class="tag tag-default tag-pill pull-xs-right">100%</span>
          </a>
          
          <a href="http://www.w3schools.com/html/html5_video.asp" target="_blank" class="list-group-item list-group-item-action list-group-item-success">
            Video
            <span class="tag tag-default tag-pill pull-xs-right">100%</span>
          </a>
          
          <a href="http://www.w3schools.com/html/html_blocks.asp" target="_blank" class="list-group-item list-group-item-action list-group-item-success">
            Inline/Block
            <span class="tag tag-default tag-pill pull-xs-right">100%</span>
          </a>
          
          <a href="http://www.w3schools.com/html/html_attributes.asp" target="_blank" class="list-group-item list-group-item-action list-group-item-success">
            Attributes
            <span class="tag tag-default tag-pill pull-xs-right">100%</span>
          </a>
          
          <a href="http://www.w3schools.com/html/html_iframe.asp" target="_blank" class="list-group-item list-group-item-action list-group-item-success">
            iFrames
            <span class="tag tag-default tag-pill pull-xs-right">100%</span>
          </a>
          
        </div>
      </div>
      
      <div class="col-md-4" id="center">
        
      </div>
      
      <div class="col-md-4" id="wrongList">
        <h3>What you don't know</h3>
        <div class="list-group">
          <a a href="http://www.w3schools.com/html/html_intro.asp" target="_blank"  class="list-group-item list-group-item-action list-group-item-danger">
            Structure
            <span class="tag tag-default tag-pill pull-xs-right">10%</span>
          </a>
          
          <a href="http://www.w3schools.com/html/html_formatting.asp" target="_blank" class="list-group-item list-group-item-action list-group-item-danger">
            Text
            <span class="tag tag-default tag-pill pull-xs-right">10%</span>
          </a>
          
          <a href="http://www.w3schools.com/html/html_lists.asp" target="_blank" class="list-group-item list-group-item-action list-group-item-danger">
            Lists
            <span class="tag tag-default tag-pill pull-xs-right">10%</span>
          </a>
          
          <a href="http://www.w3schools.com/html/html_links.asp" target="_blank" class="list-group-item list-group-item-action list-group-item-danger">
            Links
            <span class="tag tag-default tag-pill pull-xs-right">10%</span>
          </a>
          
          <a href="http://www.w3schools.com/html/html_images.asp" target="_blank" class="list-group-item list-group-item-action list-group-item-danger">
            Images
            <span class="tag tag-default tag-pill pull-xs-right">10%</span>
          </a>
          
          <a href="http://www.w3schools.com/html/html_tables.asp" target="_blank" class="list-group-item list-group-item-action list-group-item-danger">
            Tables
            <span class="tag tag-default tag-pill pull-xs-right">10%</span>
          </a>
          
          <a href="http://www.w3schools.com/html/html_forms.asp" target="_blank" class="list-group-item list-group-item-action list-group-item-danger">
            Forms
            <span class="tag tag-default tag-pill pull-xs-right">10%</span>
          </a>
          
          <a href="http://www.w3schools.com/html/html5_audio.asp" target="_blank" class="list-group-item list-group-item-action list-group-item-danger">
            Audio
            <span class="tag tag-default tag-pill pull-xs-right">10%</span>
          </a>
          
          <a href="http://www.w3schools.com/html/html5_video.asp" target="_blank" class="list-group-item list-group-item-action list-group-item-danger">
            Video
            <span class="tag tag-default tag-pill pull-xs-right">10%</span>
          </a>
          
          <a href="http://www.w3schools.com/html/html_blocks.asp" target="_blank" class="list-group-item list-group-item-action list-group-item-danger">
            Inline/Block
            <span class="tag tag-default tag-pill pull-xs-right">10%</span>
          </a>
          
          <a href="http://www.w3schools.com/html/html_attributes.asp" target="_blank" class="list-group-item list-group-item-action list-group-item-danger">
            Attributes
            <span class="tag tag-default tag-pill pull-xs-right">10%</span>
          </a>
          
          <a href="http://www.w3schools.com/html/html_iframe.asp" target="_blank" class="list-group-item list-group-item-action list-group-item-danger">
            iFrames
            <span class="tag tag-default tag-pill pull-xs-right">10%</span>
          </a>
          
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


























