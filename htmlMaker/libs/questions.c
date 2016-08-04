#include "questions.h"
#include "includes.h"

void quadImage(){
    for(int i = 0; i < 4; i++){
        fprintf(file, "\t\t<label class='option%s ans'>\n", i%2 == 0 ? "L" : "R");

        fprintf(file, "\t\t\t<input type='radio' name='%s' value='%c' required>\n", name, 'a' + i);
        fprintf(file, "\t\t\t<img src='quizSnips/%s%c.png'>\n", name, 'A' + i);

        fprintf(file, "\t\t</label>\n");
    }
}

void textLine(bool multi){
    for(int i = 0; i < 4; i++){
        fprintf(file, "\t\t<label class='ans'>\n");

        fprintf(file, "\t\t\t<input type='radio' name='%s' value='%c' required>", name, 'a' + i);
        //printf("Answer %c: ", 'A' + i);
        fprintf(file, " %s\n", GetString());

        fprintf(file, "\t\t</label>\n%s\n", multi ? " <br>" : "");
    }
}

void trueFalse(){
    for(int i = 0; i < 2; i++){
        fprintf(file, "\t\t<label class='ans'>\n");
        fprintf(file, "\t\t\t<input type='radio' name='%s' value='%c' required> ", name, 'a' + i);
        fprintf(file, "%s\n", i == 0 ? "True" : "False");
        fprintf(file, "\t\t</label>\n");
    }
}

void check(){
    printf("How many options?: ");
    int num = GetInt();
    printf("How many Columbs?: ");
    int col = GetInt();

    for(int i = 0; i < num; i++){
        printf("What is answer %i?: ", i+1);
        fprintf(file, "\t\t<label class='ans'>\n");
        fprintf(file, "\t\t\t<input type='checkbox' name='%s' value='%c'>", name, 'a' + i);
        fprintf(file, "%s\n", GetString());
        fprintf(file, "\t\t</label>%s\n", (i + 1) % col == 0 ? "<br>":"");

    }
}


void imageTop(){
    fprintf(file, "\t\t<img src='quizSnips/%s.png'>\n", name);
    textLine(false);
}

void imageLeft(){
    fprintf(file, "\t\t<img src='quizSnips/%s.png'>\n", name);
    textLine(true);
}
