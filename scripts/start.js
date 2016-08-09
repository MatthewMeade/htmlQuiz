var button = document.getElementById("startButton");
var startPage = document.getElementById("jumbo");
var quizPage = document.getElementById("quizDiv");

button.onclick = function () {
    StartQuiz();
};

function StartQuiz() {
  
    $(startPage).animate({
      top: "-1000px"
    }, 1000, function(){
      $(startPage).css("display", "none");
      AnimQuiz();
      AnimNav();
    });

    
}

function AnimNav(){
    $(".navbar-fixed-top").animate({
      top: "0px"
    }, 2000);
}

function AnimQuiz(){
  $(quizPage).toggleClass("hidden");
  $(quizPage).animate({
    top: ($("nav").outerHeight() + 10) + "px"
  }, 1500, function(){
    StartTimer();
  });
}

function StartTimer(){
  AnimTimer()
  var currentTime = Date.now();
  document.getElementById("startTime").value = currentTime;
  setInterval(TimerDisplay, 1000);
}

function AnimTimer(){
  $("#timeDisplay").animate({
    right: "5px"
  }, 2000, function(){

  });
}




