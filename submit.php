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

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Results: <?php echo $grade; ?>%</title>
  </head>
  <body>
    <div id="page">
      <!-- TITLE -->
      <h1>Results</h1>
      <!-- SCORE -->
      <div id="scoreDisplay">
        <p><?php echo $grade; ?>%</p>
        <h2>Your Score</h2>
      </div>
      <!--TIME-->
      <div id="timeDisplay">
        <h2>Your Time:</h2>
        <p><?php echo $outString; ?></p>
      </div>
      
      <!-- WHAT YOU KNOW -->
      <div id="correctList" class="listDiv">
        <h3>What you know</h3>
        <ul>
          <li><a a href="http://www.w3schools.com/html/html_intro.asp" target="_blank">Structure</a></li>
          <li><a href="http://www.w3schools.com/html/html_formatting.asp" target="_blank">Text</a></li>
          <li><a href="http://www.w3schools.com/html/html_lists.asp" target="_blank">Lists</a></li>
          <li><a href="http://www.w3schools.com/html/html_links.asp" target="_blank">Links</a></li>
          <li><a href="http://www.w3schools.com/html/html_images.asp" target="_blank">Images</a></li>
          <li><a href="http://www.w3schools.com/html/html_tables.asp" target="_blank">Tables</a></li>
          <li><a href="http://www.w3schools.com/html/html_forms.asp" target="_blank">Forms</a></li>
          <li><a href="http://www.w3schools.com/html/html5_audio.asp" target="_blank">Audio</a></li>
          <li><a href="http://www.w3schools.com/html/html5_video.asp" target="_blank">Video</a></li>
          <li><a href="http://www.w3schools.com/html/html_blocks.asp" target="_blank">Inline/Block</a></li>
          <li><a href="http://www.w3schools.com/html/html_attributes.asp" target="_blank">Attributes</a></li>
          <li><a href="http://www.w3schools.com/html/html_iframe.asp" target="_blank">iFrames</a></li>
        </ul>
      <div>
      
      <!-- SUBJECT STATS -->
      <div id="subjectStats">
        <h3>Stats</h3>
        <p>Structure: 0% </p>
        <p>Text: <?php //echo $textScore; ?>0% </p>
        <p>Lists: <?php //echo $textScore; ?>0% </p>
        <p>Links: <?php //echo $textScore; ?>0% </p>
        <p>Images: <?php //echo $textScore; ?>0% </p>
        <p>Tables: <?php //echo $textScore; ?>0% </p>
        <p>Forms: <?php //echo $textScore; ?>0% </p>
        <p>Audio: <?php //echo $textScore; ?>0% </p>
        <p>Video: <?php //echo $textScore; ?>0% </p>
        <p>Inline/Block: <?php //echo $textScore; ?>0% </p>
        <p>Attributes: <?php //echo $textScore; ?>0% </p>
        <p>iFrames: <?php //echo $textScore; ?>0% </p>
      </div>    
        
      <!-- WHAT YOU DON'T KNOW -->
      <div id="wrongList" class="listDiv">
        <h3>What you know</h3>
        <ul>
          <li><a a href="http://www.w3schools.com/html/html_intro.asp" target="_blank">Structure</a></li>
          <li><a href="http://www.w3schools.com/html/html_formatting.asp" target="_blank">Text</a></li>
          <li><a href="http://www.w3schools.com/html/html_lists.asp" target="_blank">Lists</a></li>
          <li><a href="http://www.w3schools.com/html/html_links.asp" target="_blank">Links</a></li>
          <li><a href="http://www.w3schools.com/html/html_images.asp" target="_blank">Images</a></li>
          <li><a href="http://www.w3schools.com/html/html_tables.asp" target="_blank">Tables</a></li>
          <li><a href="http://www.w3schools.com/html/html_forms.asp" target="_blank">Forms</a></li>
          <li><a href="http://www.w3schools.com/html/html5_audio.asp" target="_blank">Audio</a></li>
          <li><a href="http://www.w3schools.com/html/html5_video.asp" target="_blank">Video</a></li>
          <li><a href="http://www.w3schools.com/html/html_blocks.asp" target="_blank">Inline/Block</a></li>
          <li><a href="http://www.w3schools.com/html/html_attributes.asp" target="_blank">Attributes</a></li>
          <li><a href="http://www.w3schools.com/html/html_iframe.asp" target="_blank">iFrames</a></li>
        </ul>
      </div>
      
    
      
    </div>
  </body>

</html>


























