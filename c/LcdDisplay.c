/*
 * LcdDisplay
 */

#include <stdio.h>
#include <string.h>

// Definindo o conjunto para os números em desenhos
char data_numbers[10][5][3];

// Definindo as funções necessários
void initDataNumbers();
void printCharacterQuantity(int, char);
void printSpecificCharacterNumber(int, char);
void printFormattedCharacterLCD(int, char *, int);
void printSpaceBetweenNumber(int, char *);

/*
 * Função que irá executar a programa
 */
int main(){
  initDataNumbers();
  int s;
  char number[100];
  while (1){
      scanf (" %d %s",&s,number);
      if (s == 0 && number[0] == '0') break;
      for (int j = 0; j < 5; j++){
          if (j == 0 || j == 2 || j == 4){
              printFormattedCharacterLCD(s,number, j);
              printf("\n");
          }else{
              for (int k = 0; k < s; k++){
                  printFormattedCharacterLCD(s,number,j);
                 printf("\n");
              }
          }
      }
      printf("\n");
  }

  return 0;
}

/*
 * Função para imprimir o caractere formatado para o LCD
 */
void printFormattedCharacterLCD(int count , char * number, int j){
  for (int i = 0; i < strlen(number); i++){
      int pos_number = number[i] - '0';
      for (int x = 0; x < 3; x++){
          char choose = data_numbers[pos_number][j][x];
          printSpecificCharacterNumber(count,choose);
      }
      printSpaceBetweenNumber(i, number);
  }
}

/*
 * Função para imprimir espaco entre o número
 */
void printSpaceBetweenNumber(int i , char * number){
  if (i + 1 != strlen(number)){
      printf(" ");
  }
}

/*
 * Função para imprimir o caractere específico para o número
 */
void printSpecificCharacterNumber(int count , char c) {
  switch(c) {
      case 'S':
          printCharacterQuantity(1,' ');
          break;
      case 'Y':
          printCharacterQuantity(count,' ');
          break;
      case '-':
          printCharacterQuantity(count,'-');
          break;
      case '|':
          printCharacterQuantity(1,'|');
          break;
  }
}

/*
 * Função para imprimir a quantidade de caractere de acordo com o count
 */
void printCharacterQuantity(int count , char c) {
  for(int i = 0; i < count; i++) {
      printf("%c",c);
  }
}
/*
 * Função para inicializar os números desenhados
 */
void initDataNumbers() {
  // start 0
  data_numbers[0][0][0] = 'S'; data_numbers[0][0][1] = '-'; data_numbers[0][0][2] = 'S';
  data_numbers[0][1][0] = '|'; data_numbers[0][1][1] = 'Y'; data_numbers[0][1][2] = '|';
  data_numbers[0][2][0] = 'S'; data_numbers[0][2][1] = 'Y'; data_numbers[0][2][2] = 'S';
  data_numbers[0][3][0] = '|'; data_numbers[0][3][1] = 'Y'; data_numbers[0][3][2] = '|';
  data_numbers[0][4][0] = 'S'; data_numbers[0][4][1] = '-'; data_numbers[0][4][2] = 'S';
  // end 0

  // start 1
  data_numbers[1][0][0] = 'S'; data_numbers[1][0][1] = 'Y'; data_numbers[1][0][2] = 'S';
  data_numbers[1][1][0] = 'S'; data_numbers[1][1][1] = 'Y'; data_numbers[1][1][2] = '|';
  data_numbers[1][2][0] = 'S'; data_numbers[1][2][1] = 'Y'; data_numbers[1][2][2] = 'S';
  data_numbers[1][3][0] = 'S'; data_numbers[1][3][1] = 'Y'; data_numbers[1][3][2] = '|';
  data_numbers[1][4][0] = 'S'; data_numbers[1][4][1] = 'Y'; data_numbers[1][4][2] = 'S';
  // end 1

  // start 2
  data_numbers[2][0][0] = 'S'; data_numbers[2][0][1] = '-'; data_numbers[2][0][2] = 'S';
  data_numbers[2][1][0] = 'S'; data_numbers[2][1][1] = 'Y'; data_numbers[2][1][2] = '|';
  data_numbers[2][2][0] = 'S'; data_numbers[2][2][1] = '-'; data_numbers[2][2][2] = 'S';
  data_numbers[2][3][0] = '|'; data_numbers[2][3][1] = 'Y'; data_numbers[2][3][2] = 'S';
  data_numbers[2][4][0] = 'S'; data_numbers[2][4][1] = '-'; data_numbers[2][4][2] = 'S';
  // end 2

  // start 3
  data_numbers[3][0][0] = 'S'; data_numbers[3][0][1] = '-'; data_numbers[3][0][2] = 'S';
  data_numbers[3][1][0] = 'S'; data_numbers[3][1][1] = 'Y'; data_numbers[3][1][2] = '|';
  data_numbers[3][2][0] = 'S'; data_numbers[3][2][1] = '-'; data_numbers[3][2][2] = 'S';
  data_numbers[3][3][0] = 'S'; data_numbers[3][3][1] = 'Y'; data_numbers[3][3][2] = '|';
  data_numbers[3][4][0] = 'S'; data_numbers[3][4][1] = '-'; data_numbers[3][4][2] = 'S';
  // end 3

  // start 4
  data_numbers[4][0][0] = 'S'; data_numbers[4][0][1] = 'Y'; data_numbers[4][0][2] = 'S';
  data_numbers[4][1][0] = '|'; data_numbers[4][1][1] = 'Y'; data_numbers[4][1][2] = '|';
  data_numbers[4][2][0] = 'S'; data_numbers[4][2][1] = '-'; data_numbers[4][2][2] = 'S';
  data_numbers[4][3][0] = 'S'; data_numbers[4][3][1] = 'Y'; data_numbers[4][3][2] = '|';
  data_numbers[4][4][0] = 'S'; data_numbers[4][4][1] = 'Y'; data_numbers[4][4][2] = 'S';
  // end 4

  // start 5
  data_numbers[5][0][0] = 'S'; data_numbers[5][0][1] = '-'; data_numbers[5][0][2] = 'S';
  data_numbers[5][1][0] = '|'; data_numbers[5][1][1] = 'Y'; data_numbers[5][1][2] = 'S';
  data_numbers[5][2][0] = 'S'; data_numbers[5][2][1] = '-'; data_numbers[5][2][2] = 'S';
  data_numbers[5][3][0] = 'S'; data_numbers[5][3][1] = 'Y'; data_numbers[5][3][2] = '|';
  data_numbers[5][4][0] = 'S'; data_numbers[5][4][1] = '-'; data_numbers[5][4][2] = 'S';
  // end 5

  // start 6
  data_numbers[6][0][0] = 'S'; data_numbers[6][0][1] = '-'; data_numbers[6][0][2] = 'S';
  data_numbers[6][1][0] = '|'; data_numbers[6][1][1] = 'Y'; data_numbers[6][1][2] = 'S';
  data_numbers[6][2][0] = 'S'; data_numbers[6][2][1] = '-'; data_numbers[6][2][2] = 'S';
  data_numbers[6][3][0] = '|'; data_numbers[6][3][1] = 'Y'; data_numbers[6][3][2] = '|';
  data_numbers[6][4][0] = 'S'; data_numbers[6][4][1] = '-'; data_numbers[6][4][2] = 'S';
  // end 6

  // start 7
  data_numbers[7][0][0] = 'S'; data_numbers[7][0][1] = '-'; data_numbers[7][0][2] = 'S';
  data_numbers[7][1][0] = 'S'; data_numbers[7][1][1] = 'Y'; data_numbers[7][1][2] = '|';
  data_numbers[7][2][0] = 'S'; data_numbers[7][2][1] = 'Y'; data_numbers[7][2][2] = 'S';
  data_numbers[7][3][0] = 'S'; data_numbers[7][3][1] = 'Y'; data_numbers[7][3][2] = '|';
  data_numbers[7][4][0] = 'S'; data_numbers[7][4][1] = 'Y'; data_numbers[7][4][2] = 'S';
  // end 7

  // start 8
  data_numbers[8][0][0] = 'S'; data_numbers[8][0][1] = '-'; data_numbers[8][0][2] = 'S';
  data_numbers[8][1][0] = '|'; data_numbers[8][1][1] = 'Y'; data_numbers[8][1][2] = '|';
  data_numbers[8][2][0] = 'S'; data_numbers[8][2][1] = '-'; data_numbers[8][2][2] = 'S';
  data_numbers[8][3][0] = '|'; data_numbers[8][3][1] = 'Y'; data_numbers[8][3][2] = '|';
  data_numbers[8][4][0] = 'S'; data_numbers[8][4][1] = '-'; data_numbers[8][4][2] = 'S';
  // end 8

  //start 9
  data_numbers[9][0][0] = 'S'; data_numbers[9][0][1] = '-'; data_numbers[9][0][2] = 'S';
  data_numbers[9][1][0] = '|'; data_numbers[9][1][1] = 'Y'; data_numbers[9][1][2] = '|';
  data_numbers[9][2][0] = 'S'; data_numbers[9][2][1] = '-'; data_numbers[9][2][2] = 'S';
  data_numbers[9][3][0] = 'S'; data_numbers[9][3][1] = 'Y'; data_numbers[9][3][2] = '|';
  data_numbers[9][4][0] = 'S'; data_numbers[9][4][1] = '-'; data_numbers[9][4][2] = 'S';
  // end 9
}