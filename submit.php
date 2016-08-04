<?php
    $emailUsed = false;
    $email = NULL;

    if($_POST != NULL){
        if($_POST["userMail"] != NULL){
            $emailUsed = true;
            $email = $_POST["userMail"];
        }
    }else{
        echo "ERROR POST NULL";
    }

    if($emailUsed){
        echo "Email Sent<br>";
    }else{
        echo "No Email Sent<br>";
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

            echo $answer." = ".$correct."<br>";
        }else{
            echo $answer." != ".$correct."<br>";
        }

        //echo "$i $name $answer $correct <br>";
        $i++;
    }

    $grade = $score/$total * 100;
    echo "Score: $score/$total = $grade%<br>";

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

    echo 'Time to complete: ';

    if($hours > 0){
      echo $hours."h ";
    }

    if($minutes > 0){
      echo $minutes."m ";
    }


    echo floor($seconds)."s<br>";

    echo "Total in seconds: ".$totalTime."s<br>";








    echo $outString;








?>
