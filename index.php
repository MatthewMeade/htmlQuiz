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
  
  <!--
  <link type="text/css" rel="stylesheet" href="styles/form.css">
  <link type="text/css" rel="stylesheet" href="styles/page.css">
  <link type="text/css" rel="stylesheet" href="styles/img.css">
  
-->
  
  <style>
    body {
      background-image: url('images/code.jpg');
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
      /*font-family: sans-serif;*/
    }

    .jumbotron{
      text-align: center;
      position: relative;
    }
    
    #startButton{
      font-weight: bold;
      font-size: 200%;
    }
    
    .hidden{
      display: none;
    }
    
    #quizDiv{
      background-color: rgba(255,255,255,0.8);
      height: 2000px;
      top: 1000px;
      position: relative;
    }
    
    .navbar-fixed-top{
      top: -100px; 
      padding-left: 50px;
      padding-right: 50px;
    }
    
    
    
    #timeDisplay{
      position: fixed;
      right: -200px;
      bottom: 0px;
      text-align: center;
    }
    
    .card-block{
      padding: 0;
    }
    
    .card-text{
      padding: 5px;
      margin: 0;
      font-size: 150%;
    }
    
    @media only screen and (max-width: 530px) {
        .nav{
          display: none;
        }       
        
    }
    
    @media only screen and (max-width: 1000px) {
        #progLabel{
          display: none;
        }        
        
    }
    
    
    @media only screen and (min-width: 1000px) {
        #progDiv{
          float: right;
          width: 70%;
          /*border: 1px solid red;*/
          height: 20px;
          padding: 0;
          padding-top: 5px;
          }
        
        #prog{
          width: 50%;
          float: right;
          padding-top: 6px;
          padding-right: 15%;
          /*border: 1px solid blue;*/
        }
        
        #progLabel{
          float: left;
          text-align: right;
          width: 29%;
          padding-right: 5px;
          /*border: 1px solid green;*/
        }
    }
    
    #navContent{
      max-width: 1200px;
      margin: 0 auto;
    }
    
    @media screen and (-webkit-min-device-pixel-ratio:0) and (min-resolution:.001dpcm) and (max-width: 1000px){
      #prog{
        padding-top: 50px;
      }
    }
    
    #quizDiv{
      border: 1px solid blue;
    }
    
    #imgRow{
      border: 1px solid red;
    }
    
    #imgCol{
      border: 1px solid green;
    }
    
    .imgTop{
      width: 95%;
      position: relative;
      left: 50%;
      transform: translateX(-50%);
    }
    
    .outputExample{
      text-align: center;
      font-size: 200%;
      background-color: white;
    }
    
    .answer{
      padding: 10px;
      font-size: 200%;
      text-align: center;
    }
    
    h2{
      font-weight: bold;
      border-bottom: 3px solid gray;
      width: 30%;
      
      color: darkgray;
      
      background-color: white;
      border-radius: 2px 10px 10px 2px;
      
      margin-top: 15px;
      padding-left: 5px;
      position: relative;
      left: -15px;
    }
    
    label{
      border: 5px solid lightgray;
      min-width: 150px; 
      
      border-radius: 10px;
    }
    
    input[type="radio"]{
      display: none;
    }
    
    /*.qtitle{
        background-color: white;
        border-radius: 10px;
        display: inline-block;
        padding: 3px;
    }*/
    
    .question{
      border: 3px solid darkgray;
      border-radius:  0 5px 20px 20px;
      background-color: rgba(255,255,255, 0.9);
      
    }
    
    legend{
      border: 3px solid darkgray;
      border-radius: 10px 5px 5px 0;
      width: 50%;
      position: relative;
      left: -3px;
      background-color: rgba(70,160,70, 0.8);
      color: white;
      /*background-color: #4A4;*/
      padding-left: 5px;
      font-weight: bold;
    }
    
    input:checked+label{
      background-color: #449D44;
      color: white;
    }
    
    input:checked{
      background-color: white;
    }
    
    img{
      box-shadow: 0px 3px 3px 3px  gray;
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
            <legend class="qtitle">What HTML creates the following text:</legend>
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