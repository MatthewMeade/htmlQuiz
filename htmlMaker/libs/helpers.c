#include "includes.h"
#include "questions.h"
#include "helpers.h"

#define CLASSNUM 7
char* validClasses[CLASSNUM] = {"textMultiLine", "textLine", "imageTop", "imageLeft", "quadImage", "trueFalse", "check"};

void PrintStart(){

    fputs("<div class='question'>\n" , file);
    fprintf(file, "\t<div class='%s %s'>\n", className, MixAns() ? "mixAns" : "");
}

void PrintEnd(){
    fputs("\t</div>\n</div>\n", file);
    printf("\n");
}

void PrintQuestion(){
    printf("What is the question?: ");
    char* heading = GetString();

    fprintf(file, "\t\t<h3>%s</h3>\n", heading);
}

char* GetClass(){
    printf("What class is the question?: ");
    return GetString();
}

bool MixAns(){
    bool mix = false;
    char mixIn = 'x';

    do{
        printf("Shuffle Answers? y/n: ");
        mixIn = tolower(GetChar());
    }while(!(strcmp(&mixIn, "y") == 0 || strcmp(&mixIn, "n") == 0));

    if(strcmp(&mixIn, "y") == 0){
        mix = true;
    }

    return mix;
}

void PrintContents(){
    for(int i = 0; i < CLASSNUM; i++){
       if(strcmp(className, validClasses[i]) == 0){
           switch(i){
                case 0:
                    textLine(true);
                    break;
                case 1:
                    textLine(false);
                    break;
                case 2:
                    imageTop();
                    break;
                case 3:
                    imageLeft();
                    break;
                case 4:
                    quadImage();
                    break;
                case 5:
                    trueFalse();
                    break;
                case 6:
                    check();
                    break;
                default:
                    printf("Unknown class\n");
                    break;
           }
       }
    }
}

char* GetName(){
    printf("What is the name of the question?: ");
    return GetString();
}
