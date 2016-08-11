<?php 

  $title = "HTML Quiz";
  $leadDescription = "When you are ready to begin click the button below, you will be timed. </br> 
                      Once the quiz is submitted you will be directed to your results page";
                    
  
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
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js" type="text/javascript"></script>
  
  <link type="text/css" rel="stylesheet" href="styles/form.css">
  <link type="text/css" rel="stylesheet" href="styles/page.css">
  
 
  
  <style>
  
    .hidden{
      /*display: none;*/
    }
    
    .tf{
      float: left;
      font-size: 175%;
      /*width: 200px;*/
      text-align: center;
      margin: 0;
    }
    
    .true{
      border-right: none;
      border-top-right-radius: 0;
      border-bottom-right-radius: 0;

    }
    
    .false{
      border-left: none;
      border-top-left-radius: 0;
      border-bottom-left-radius: 0;

    }
    
    .check label{
      margin-right: 10px;

    }
    /*
    input{
        margin-left: 13px;
        background-color: white; !important
        color: white; !important
        z-index: 1;
        
    }*/
    
  

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
        
        <h2>Question -3</h2>
        <fieldset class="question check">
          <legend>Select all inline elements</legend>
          
          <input type="checkbox" name="inlineSelect" value="a" id="inlineSelectA">
          <label for="inlineSelectA">&lt;b&gt;</label>
          
          <input type="checkbox" name="inlineSelect" value="b" id="inlineSelectB">
          <label for="inlineSelectB">&lt;span&gt;</label> 
          
          <br>
          
          <input type="checkbox" name="inlineSelect" value="c" id="inlineSelectC">
          <label for="inlineSelectC">&lt;input&gt;</label>
          
          <input type="checkbox" name="inlineSelect" value="d" id="inlineSelectD">
          <label for="inlineSelectD">&lt;sub&gt;</label>
          
          <br>
          
          <input type="checkbox" name="inlineSelect" value="e" id="inlineSelectE">
          <label for="inlineSelectE">&lt;div&gt;</label>
          
          <input type="checkbox" name="inlineSelect" value="f" id="inlineSelectF">
          <label for="inlineSelectF">&lt;p&gt;</label>
        </fieldset>
        
        <h2>Question -2</h2>
        <fieldset class=" question trueFalse">
            <legend>HTML stands for Hyper Text Markup Language</legend>
            <div class="trueDiv tf">
              <input name="htmlMeaning" value="a" type="radio" id="htmlMeaningA">
              <label for="htmlMeaningA" class="true">True</true>
            </div>
            
            <div class="falseDiv tf">
              <input name="htmlMeaning" value="b" type="radio" id="htmlMeaningB">
              <label for="htmlMeaningB" class="false">False</true>
            </div>
        </fieldset>
        
        <h2>Question -1</h2>
        <fieldset class="question quadImage">
            <legend>Which is the correct wat to start an html page?</legend>
            <div class="row">
                <div class="col-lg-6">
                  <input type="radio" name="htmlTemplate" value="a" id="htmlTemplateA">
                  <label for="htmlTemplateA"><img src='quizSnips/htmlTemplateA.png'></lablel>
                </div>
                <div class="col-lg-6">
                  <input type="radio" name="htmlTemplate" value="b" id="htmlTemplateB">
                  <label for="htmlTemplateB"><img src='quizSnips/htmlTemplateB.png'></lablel>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                  <input type="radio" name="htmlTemplate" value="c" id="htmlTemplateC">
                  <label for="htmlTemplateC"><img src='quizSnips/htmlTemplateC.png'></lablel>
                </div>
                <div class="col-lg-6">
                  <input type="radio" name="htmlTemplate" value="d" id="htmlTemplateD">
                  <label for="htmlTemplateD"><img src='quizSnips/htmlTemplateD.png'></lablel>
                </div>
            </div>
        </fieldset>
        
        <h2>Question 0</h2>
        <fieldset class="question text">
            <legend> Which creates bold text? </legend>
            
            <div class="imgLeftAnswers">
              <input type="radio" name="bold" value="a" id="boldA"required>
              <label for="boldA">&lt;b&gt;Text&lt;/b&gt; </label>
            </div>
            
            <div class="imgLeftAnswers">
              <input type="radio" name="bold" value="b" id="boldB"required>
              <label for="boldB">&lt;bold&gt;Text&lt;/bold&gt;</label>  
            </div>
            
            <div class="imgLeftAnswers">
              <input type="radio" name="bold" value="c" id="boldC"required>
              <label for="boldC">&lt;p style="bold"&gt;Text&lt;/p&gt;</label>
            </div>
            
            <div class="imgLeftAnswers">    
              <input type="radio" name="bold" value="d" id="boldD"required>
              <label for="boldD">&lt;p bold&gt;Text&lt;/p&gt;</label>
            </div>
        </fieldset>
        
        
        <h2>Question 1</h2>
        <fieldset class="question questionImgTop">
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
  <script
			  src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
			  integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
			  crossorigin="anonymous"></script>
        
        
  <script type="text/javascript" src="scripts/start.js"></script>
  
  <script type="text/javascript" src="scripts/timer.js"></script>
  
  <script type="text/javascript">
    

    $(".imgLeftAnswers label").hover(function(){
        $(this).animate({
           left: "20px"
        }, 200);
    }, function(){
      $(this).animate({
         left: "5px"
      }, 200);
    });
    
    
    $(".questionImgTop label").hover(function(){
        $(this).animate({
           bottom: "10px"
        }, 200);
    }, function(){
      $(this).animate({
         bottom: "0px"
      }, 200);
    });
    
    
    
  
    
    
  
  </script>
  </body>
</html>