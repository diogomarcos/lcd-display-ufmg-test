<?php
/**
 * LcdDisplay
 *
 * @author  Diogo Marcos <contato@diogomarcos.com>
 * @version 1.0
 */

namespace php;


class LcdDisplay
{
    private $data_numbers;

    public function __construct()
    {
        $this->initDataNumbers();
    }

    /**
     * Função que irá executar a programa
     *
     * @param int $size
     * @param string $number
     */
    public function runProgram($size, $number)
    {
        for($j = 0; $j < 5; $j++) {
            if ($j === 0 || $j === 2 || $j === 4) {
                $this->printFormattedCharacterLCD($size, $number, $j);
                printf("<br>");
            } else {
                for($k = 0; $k < $size; $k++) {
                    $this->printFormattedCharacterLCD($size, $number, $j);
                    printf("<br>");
                }
            }
        }
        printf("<br>");
    }

    /**
     * Função para imprimir o caractere formatado para o LCD
     *
     * @param int $count
     * @param string $number
     * @param int $j
     */
    private function printFormattedCharacterLCD($count, $number, $j)
    {
        $imax = (int)strlen($number);
        for($i = 0; $i < $imax; $i++) {
            $pos_number = $number[$i] - '0';

            for($x = 0; $x < 3; $x++) {
                $item_data_numbers = $this->data_numbers[$pos_number][$j][$x];
                $this->printSpecificCharacterNumber($count, $item_data_numbers);
            }
            $this->printSpaceBetweenNumber($i, $number);
        }
    }

    /**
     * Função para imprimir espaco entre o número
     *
     * @param int $i
     * @param string $number
     */
    private function printSpaceBetweenNumber($i, $number)
    {
        if($i + 1 !== strlen($number)) {
            printf("&nbsp;");
        }
    }

    /**
     * Função para imprimir o caractere específico para o número
     *
     * @param int $count
     * @param string $c
     */
    private function printSpecificCharacterNumber($count, $c)
    {
        switch ($c) {
            case 'S':
                $this->printCharacterQuantity(1, "&nbsp;");
                break;
            case 'Y':
                $this->printCharacterQuantity($count, "&nbsp;");
                break;
            case '-':
                $this->printCharacterQuantity($count, "-");
                break;
            case '|':
                $this->printCharacterQuantity(1, "|");
                break;
        }
    }

    /**
     * Função para imprimir a quantidade de caractere de acordo com o count
     *
     * @param int $count
     * @param string $c
     */
    private function printCharacterQuantity($count, $c)
    {
        for($i = 0; $i < $count; $i++) {
            printf('%s', $c);
        }
    }

    /**
     * Função para inicializar os números desenhados
     */
    private function initDataNumbers()
    {
        $this->data_numbers =
            array(
                array(
                    // start 0
                    array('S', '-', 'S'), // [0][0][0] = 'S'; [0][0][1] = '-'; [0][0][2] = 'S'
                    array('|', 'Y', '|'), // [0][1][0] = '|'; [0][1][1] = 'Y'; [0][1][2] = '|'
                    array('S', 'Y', 'S'), // [0][2][0] = 'S'; [0][2][1] = 'Y'; [0][2][2] = 'S'
                    array('|', 'Y', '|'), // [0][3][0] = '|'; [0][3][1] = 'Y'; [0][3][2] = '|'
                    array('S', '-', 'S')  // [0][4][0] = 'S'; [0][4][1] = '-'; [0][4][2] = 'S'
                    // end 0
                ),
                array(
                    // start 1
                    array('S', 'Y', 'S'), // [1][0][0] = 'S'; [1][0][1] = 'Y'; [1][0][2] = 'S'
                    array('S', 'Y', '|'), // [1][1][0] = 'S'; [1][1][1] = 'Y'; [1][1][2] = '|'
                    array('S', 'Y', 'S'), // [1][2][0] = 'S'; [1][2][1] = 'Y'; [1][2][2] = 'S'
                    array('S', 'Y', '|'), // [1][3][0] = 'S'; [1][3][1] = 'Y'; [1][3][2] = '|'
                    array('S', 'Y', 'S')  // [1][4][0] = 'S'; [1][4][1] = 'Y'; [1][4][2] = 'S'
                    // end 1
                ),
                array(
                    // start 2
                    array('S', '-', 'S'), // [2][0][0] = 'S'; [2][0][1] = '-'; [2][0][2] = 'S'
                    array('S', 'Y', '|'), // [2][1][0] = 'S'; [2][1][1] = 'Y'; [2][1][2] = '|'
                    array('S', '-', 'S'), // [2][2][0] = 'S'; [2][2][1] = '-'; [2][2][2] = 'S'
                    array('|', 'Y', 'S'), // [2][3][0] = '|'; [2][3][1] = 'Y'; [2][3][2] = 'S'
                    array('S', '-', 'S')  // [2][4][0] = 'S'; [2][4][1] = '-'; [2][4][2] = 'S'
                    // end 2
                ),
                array(
                    // start 3
                    array('S', '-', 'S'), // [3][0][0] = 'S'; [3][0][1] = '-'; [3][0][2] = 'S'
                    array('S', 'Y', '|'), // [3][1][0] = 'S'; [3][1][1] = 'Y'; [3][1][2] = '|'
                    array('S', '-', 'S'), // [3][2][0] = 'S'; [3][2][1] = '-'; [3][2][2] = 'S'
                    array('S', 'Y', '|'), // [3][3][0] = 'S'; [3][3][1] = 'Y'; [3][3][2] = '|'
                    array('S', '-', 'S')  // [3][4][0] = 'S'; [3][4][1] = '-'; [3][4][2] = 'S'
                    // end 3
                ),
                array(
                    // start 4
                    array('S', 'Y', 'S'), // [4][0][0] = 'S'; [4][0][1] = 'Y'; [4][0][2] = 'S'
                    array('|', 'Y', '|'), // [4][1][0] = '|'; [4][1][1] = 'Y'; [4][1][2] = '|'
                    array('S', '-', 'S'), // [4][2][0] = 'S'; [4][2][1] = '-'; [4][2][2] = 'S'
                    array('S', 'Y', '|'), // [4][3][0] = 'S'; [4][3][1] = 'Y'; [4][3][2] = '|'
                    array('S', 'Y', 'S')  // [4][4][0] = 'S'; [4][4][1] = 'Y'; [4][4][2] = 'S'
                    // end 4
                ),
                array(
                    // start 5
                    array('S', '-', 'S'), // [5][0][0] = 'S'; [5][0][1] = '-'; [5][0][2] = 'S'
                    array('|', 'Y', 'S'), // [5][1][0] = '|'; [5][1][1] = 'Y'; [5][1][2] = 'S'
                    array('S', '-', 'S'), // [5][2][0] = 'S'; [5][2][1] = '-'; [5][2][2] = 'S'
                    array('S', 'Y', '|'), // [5][3][0] = 'S'; [5][3][1] = 'Y'; [5][3][2] = '|'
                    array('S', '-', 'S')  // [5][4][0] = 'S'; [5][4][1] = '-'; [5][4][2] = 'S'
                    // end 5
                ),
                array(
                    // start 6
                    array('S', '-', 'S'), // [6][0][0] = 'S'; [6][0][1] = '-'; [6][0][2] = 'S'
                    array('|', 'Y', 'S'), // [6][1][0] = '|'; [6][1][1] = 'Y'; [6][1][2] = 'S'
                    array('S', '-', 'S'), // [6][2][0] = 'S'; [6][2][1] = '-'; [6][2][2] = 'S'
                    array('|', 'Y', '|'), // [6][3][0] = '|'; [6][3][1] = 'Y'; [6][3][2] = '|'
                    array('S', '-', 'S')  // [6][4][0] = 'S'; [6][4][1] = '-'; [6][4][2] = 'S'
                    // end 6
                ),
                array(
                    // start 7
                    array('S', '-', 'S'), // [7][0][0] = 'S'; [7][0][1] = '-'; [7][0][2] = 'S'
                    array('S', 'Y', '|'), // [7][1][0] = 'S'; [7][1][1] = 'Y'; [7][1][2] = '|'
                    array('S', 'Y', 'S'), // [7][2][0] = 'S'; [7][2][1] = 'Y'; [7][2][2] = 'S'
                    array('S', 'Y', '|'), // [7][3][0] = 'S'; [7][3][1] = 'Y'; [7][3][2] = '|'
                    array('S', 'Y', 'S')  // [7][4][0] = 'S'; [7][4][1] = 'Y'; [7][4][2] = 'S'
                    // end 7
                ),
                array(
                    // start 8
                    array('S', '-', 'S'), // [8][0][0] = 'S'; [8][0][1] = '-'; [8][0][2] = 'S'
                    array('|', 'Y', '|'), // [8][1][0] = '|'; [8][1][1] = 'Y'; [8][1][2] = '|'
                    array('S', '-', 'S'), // [8][2][0] = 'S'; [8][2][1] = '-'; [8][2][2] = 'S'
                    array('|', 'Y', '|'), // [8][3][0] = '|'; [8][3][1] = 'Y'; [8][3][2] = '|'
                    array('S', '-', 'S')  // [8][4][0] = 'S'; [8][4][1] = '-'; [8][4][2] = 'S'
                    // end 8
                ),
                array(
                    // start 9
                    array('S', '-', 'S'), // [9][0][0] = 'S'; [9][0][1] = '-'; [9][0][2] = 'S'
                    array('|', 'Y', '|'), // [9][1][0] = '|'; [9][1][1] = 'Y'; [9][1][2] = '|'
                    array('S', '-', 'S'), // [9][2][0] = 'S'; [9][2][1] = '-'; [9][2][2] = 'S'
                    array('S', 'Y', '|'), // [9][3][0] = 'S'; [9][3][1] = 'Y'; [9][3][2] = '|'
                    array('S', '-', 'S')  // [9][4][0] = 'S'; [9][4][1] = '-'; [9][4][2] = 'S'
                    // end 9
                ),
            );
    } //end initDataNumbers
}
