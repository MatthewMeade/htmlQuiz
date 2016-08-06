<?php
    $emailUsed = false;
    $email = NULL;

    if($_POST != NULL){
        if($_POST["userMail"] != NULL){
            $emailUsed = true;
            $email = $_POST["userMail"];
        }
    }else{
        // echo "ERROR POST NULL";
    }
    
    
    if($emailUsed){
        // echo "Email Sent<br>";
    }else{
        // echo "No Email Sent<br>";
    }

    $total = 4;
    $score = 0;

    $answers = array("b", "a", "c", "b");
    $names = array("htmlTemplate", "bold", "textStyle", "escapeError");


    //echo "index // name // answer // correct<br>";

    $i = 0;
    foreach($names as $name){

        $name = $names[$i];
        $answer = $_POST[$name];
        $correct = $answers[$i];

        if($answer == $correct){
            $score++;

            // echo $answer." = ".$correct."<br>";
        }else{
            // echo $answer." != ".$correct."<br>";
        }

        //echo "$i $name $answer $correct <br>";
        $i++;
    }

    $grade = $score/$total * 100;
    // echo "Score: $score/$total = $grade%<br>";

    $finishTime = round(microtime(true) * 1000);
    $startTime = $_POST["startTime"];

    $totalTime = ($finishTime - $startTime) / 1000;

    $outString = "";

    $seconds = $totalTime;
    $minutes = 0;
    $hours = 0;

    while($seconds > 60){
        $minutes++;
        $seconds -= 60;
    }

    while($minutes > 60){
      $hours++;
      $minutes -= 60;
    }

    //echo 'Time to complete: ';

    if($hours > 0){
      //echo $hours."h ";
      $outString = $outString.$hours."h ";
    }

    if($minutes > 0){
      // echo $minutes."m ";
      $outString = $outString.$minutes."m ";
    }
    
    $outString = $outString.round($seconds, 0, PHP_ROUND_HALF_DOWN)."s";

    // echo floor($seconds)."s<br>";

    // echo "Total in seconds: ".$totalTime."s<br>";

    // echo $outString;
    
    $grade = 60;

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
        left: -700px;
      }
      
      #wrongList{
        position: relative;
        left: 700px;
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
        <h4>Time to complete: <?php echo $outString; ?></h2>
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
          fontSize: "100%",
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


























