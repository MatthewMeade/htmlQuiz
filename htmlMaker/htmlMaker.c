#include "libs/questions.h"
#include "libs/helpers.h"
#include "libs/includes.h"

FILE* file = NULL;
char* className = NULL;
char* name = NULL;

int main(int argc, char* argv[]){

    if(argc != 2){
        printf("USAGE: %s [fileName]\n", argv[0]);
        return 1;
    }

    file = fopen(argv[1], "w");

    if(file == NULL){
        printf("Error opening %s\n", argv[1]);
        fclose(file);
        return 2;
    }

    //This should only be in the maker branch




    className = GetClass();
    name = GetName();

    PrintStart();
    PrintQuestion();

    PrintContents();

    PrintEnd();

    fclose(file);
}
