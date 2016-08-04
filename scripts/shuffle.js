ShuffleElements("question", document);

var questions = document.getElementsByClassName("mixAns");
for(var i = 0; i < questions.length; i++){
    ShuffleElements("ans", questions[i]);
}

function ShuffleElements(className, elem){
    var elements = elem.getElementsByClassName(className);
    var inners = new Array();
    for (var i = 0; i < elements.length; i++) {
        inners[i] = elements[i].innerHTML;
        elements[i].innerHTML = "";
    }
    
    inners = ShuffleArray(inners);

    for (var i = 0; i < elements.length; i++) {
        elements[i].innerHTML = inners[i];
    }
}


/*
*Array function
*/

function ShuffleArray(array) {
    for (var i = array.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
    return array;
}