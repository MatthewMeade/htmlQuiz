var yesButton = document.getElementById("yesEmail");
var noButton = document.getElementById("noEmail");
var userEmail = "";
var warning = document.getElementById("emailWarning");
var startPage = document.getElementById("emailRequest");
var quizPage = document.getElementById("quizDiv");
var form = document.getElementById("quiz");

noButton.onclick = function () {
    document.getElementById("emailPrompt").value = null;
    StartQuiz();
};
yesButton.onclick = function () {
    var userEmail = document.getElementById("emailPrompt").value;
    if (isEmail(userEmail) == false) {
        warning.className = "";
    }
    else {
        StartQuiz();
    }
}





function StartQuiz() {
    quizDiv.className = "";
    startPage.className = "hidden";

    var startTime = Date.now();
    document.getElementById("startTime").value = startTime;

    var quizHeight = document.getElementById("quiz").clientHeight;
    var page =  document.getElementById("page");
    var pageHeight = page.style.height;



    page.style.height = (quizHeight + 200).toString() + "px";


}

function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}
