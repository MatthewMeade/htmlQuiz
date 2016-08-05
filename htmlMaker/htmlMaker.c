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



    int i = 1;

    while(true){
      className = GetClass();
      name = GetName();

      PrintStart(i);
      PrintQuestion();

      
      PrintContents();


      PrintEnd();

      printf("Press enter to continue or type anything to quit: ");
      if(strcmp(GetString(), "") != 0){
          break;
      }


      i++;
    }

    fclose(file);
}
