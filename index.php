<?php 

  $title = "HTML Quiz";
  $leadDescription = "When you are ready to begin click the button below, you will be timed. </br> 
                      Once the quiz is submitted you will be directed to your results page";
                      
  for ($i=0; $i < 10; $i++) { 
    $quizFiller = $quizFiller.$title."<br>";
  }
  
  $groups = array("Multiple Choice", "Check Lists", "True/False");
  $groupsOut = "";
  
  foreach ($groups as $group){
    $groupsOut = $groupsOut."<li class='nav-item active'> <a class='nav-link' href=''>".$group."</a> </li>"."\n";
  }
  


 ?>
<!DOCTYPE html>
<html>
<head>

  <title>Quiz</title>
      
  <!-- Required meta tags always come first -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

      <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
  
  
  <link type="text/css" rel="stylesheet" href="styles/form.css">
  <link type="text/css" rel="stylesheet" href="styles/page.css">
  
 
  
  <style>
  
    .hidden{
      /*display: none;*/
    }
    
    .questionImgLeft{
      padding: 20px;
    }
    
    .imgLeft{
      display: block;
      float: left;
      width: 50%;
    }
    
    .imgLeftAnswers{
      margin-top: 10px;
      float: left;
    }
    
    .imgLeftAnswers .answer{
      padding-bottom: 30px;
    }

  </style>
  </head>
  <body>
    
    <!-- NAVBAR -->
    <nav class="navbar navbar-fixed-top navbar-light bg-faded"> 
      <div id="navContent">
        <a class="navbar-brand" href="#"><?php echo $title; ?></a>
        <ul class="nav navbar-nav">
            <?php echo $groupsOut ?>
        </ul>
        
        <div id="prog">
          <p id="progLabel">Progress: </p>
          <div id="progDiv">
            <progress class="progress progress-success progress-striped progress-animated active" value="10" max="100"></progress>
          </div>
        </div>
      </div>
    </nav>
  
    <!-- jumbotron -->
    <div class="container" id="con">
      <div class="jumbotron" id="jumbo">
        <h1 class="display-1"><?php echo $title; ?></h1>
        <p class="lead"><?echo $leadDescription; ?></p>
        <button type="button" class="btn btn-success" id="startButton">Start Quiz</button>
      </div>
    
    <!-- Quiz Page -->
    <div class="container-fluid hidden" id="quizDiv">
      <form action="submit.php" method="post">
        <input type="hidden" name="startTime" value="" id="startTime">
        
        <h2>Question 1</h2>
        <fieldset class="question">
            <legend>What HTML creates the following text:</legend>
            <p class="outputExample"><b>HTML</b> is <ins>the</ins> best language <i>ever</i></p>
            <img src="quizSnips/textStyle.png" class="imgTop">
            
            <div class="answer col-sm-3">
              <input type="radio" name="textStyle" value="a" id="textStyleA" required>
              <label for="textStyleA">A</label>
            </div>
            
            <div class="answer col-sm-3">
              <input type="radio" name="textStyle" value="b" id="textStyleB" required>
              <label for="textStyleB">B</label>
            </div>
            
            <div class="answer col-sm-3">
              <input type="radio" name="textStyle" value="c" id="textStyleC" required>
              <label for="textStyleC">C</label>
            </div>
            
            <div class="answer col-sm-3">
              <input type="radio" name="textStyle" value="d" id="textStyleD" required>
              <label for="textStyleD">D</label>
            </div>
        </fieldset>
        
        <h2>Question 2</h2>
        <fieldset class="question questionImgLeft">
            <legend>On what line is the mistake?</legend>
            <img src="quizSnips/escapeError.png" class="imgLeft">
            <div class="imgLeftAnswers">
              <div class="answer">
                  <input type="radio" name="escapeError" value="a" id="escapeErrorA" required>
                  <label for="escapeErrorA">8</label>
              </div>
              
              <div class="answer">
                  <input type="radio" name="escapeError" value="b" id="escapeErrorB" required>
                  <label for="escapeErrorB">12</label>
              </div>
              
              <div class="answer">
                  <input type="radio" name="escapeError" value="c" id="escapeErrorC" required>
                  <label for="escapeErrorC">16</label>
              </div>
              
              <div class="answer">
                  <input type="radio" name="escapeError" value="d" id="escapeErrorD" required>
                  <label for="escapeErrorD">15</label>
              </div>
          </div>
        </fieldset>
        

            
        </form>
    </div>
  </div>
  
  <div class="card" id="timeDisplay">
    <div class="card-block">
    <p class="card-text">0s</p>
  </div>
  </div>



  <!-- jQUERY AND BOOSTRAP SCRIPTS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  
  <script type="text/javascript" src="scripts/start.js"></script>
  
  <script type="text/javascript" src="scripts/timer.js"></script>
  </body>
</html>