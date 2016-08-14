<?php 

  include 'load.php';
  
  global $settings;
  
  $pageSettings = $settings["quiz"];
  $title = $pageSettings["title"];
  $leadDescription = $pageSettings["leadDescription"];
  
  $groupNames = $settings["groupsDisplay"];
  $groupNamesOut = "";
  
  
  $firstPrinted = false;
  
  foreach ($groupNames as $key => $group){
    //$groupNamesOut = $groupNamesOut."<li class='nav-item'> <a class='nav-link' href='#".$key."'>".$group."</a> </li>"."\n";
      $groupNamesOut = $groupNamesOut."<li class='nav-item'> <a class='nav-link ";
    if(!$firstPrinted){
      $groupNamesOut = $groupNamesOut."active";
      $firstPrinted = true;
    }
    $groupNamesOut = $groupNamesOut."' href='#".$key."'>".$group."</a> </li>\n";
  }
  
  $groups = $settings["groups"];
  
  $quizPrint = "";
  
  
  foreach ($groups as $key => $group) {
    $quizPrint = $quizPrint . "<div class='group'>\n\t<h1 class='groupTitle' id='" .$group. "'>". $groupNames[$group] . "</h2>\n";
    $quizPrint = $quizPrint . file_get_contents("generated/$group.txt");
    $quizPrint = $quizPrint . "</div>\n";
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
      display: none;
    }
    
    .groupTitle{
      font-weight: bold;
      border-bottom: 4px solid darkgray;
      /*margin-top: 100px;*/
    }
    
    nav a.active{
      /*background-color: rgba(65,160,65, 0.5);*/
      
      border-bottom:  3px solid rgba(65,160,65, 0.5);
      /*border-top:  3px solid rgba(65,160,65, 0.5);*/
      
    }
    
    nav a{
      padding: 0px;
      
      border-radius: 10px;
    }
    
    nav a:hover{
      background-color: white;
    }
    
    
  

  </style>
  </head>
  <body data-spy="scroll" data-target="#nav">
    
    <!-- NAVBAR -->
    <nav class="navbar navbar-fixed-top navbar-light bg-faded" id="nav"> 
      <div id="navContent">
        <a class="navbar-brand" href="#"><?php echo $title; ?></a>
        <ul class="nav navbar-nav">
            <?php echo $groupNamesOut ?>
        </ul>
        
        <div id="prog">
          <p id="progLabel">Progress: </p>
          <div id="progDiv">
            <progress class="progress progress-success progress-striped progress-animated" value="10" max="100"></progress>
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
        <?php echo $quizPrint ?>
        <input type="submit" value="Submit Answers">
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
    
    var headings = document.getElementsByTagName("h2");
    for (var i = 0; i < headings.length; i++) {
      headings[i].innerHTML = "Question " + i;
    }
    
  
    
    
  
  </script>
  </body>
</html>