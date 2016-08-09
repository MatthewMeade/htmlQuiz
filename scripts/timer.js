
  var t = 0;
  
  function TimerDisplay(){
    t++;
    $(".card-text").html(SecondsToString(t));
  }
  
  function SecondsToString(totalSeconds){
    hours = Math.floor(totalSeconds / 3600);
    totalSeconds %= 3600;
    minutes = Math.floor(totalSeconds / 60);
    seconds = totalSeconds % 60;
    
    var outString = '';
    
    outString = seconds + "s";
    if(seconds   < 10){
      outString = "0" + outString;
    }
     
    
    if(minutes == 0 && hours == 0){
      return outString;
    }
    outString = minutes + "m " + outString;
    if(minutes < 10){
      outString = "0" + outString;
    }
    
    if(hours == 0){
      return outString;
    }
    outString = hours + "h " + outString;

    
    
    
    return outString;
    
    
    
  }
