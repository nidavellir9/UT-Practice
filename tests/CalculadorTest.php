<?php

include '../src/Calculador.php';

/**
 * La parte que sigue que se encuentra toda comentada, sería la versión simple, como me mencionaste 
 * en un momento en la entrevista, primero la opción que "resuelve" y después lo vamos mejorando.
 * 
 */

/*
$exampleData = array (1,2,3);

$suma = new Calculador('+', $exampleData);
echo $suma->resolver($exampleData) . PHP_EOL;

$resta = new Calculador('-', $exampleData);
echo $resta->resolver($exampleData) . PHP_EOL;

$multiplicacion = new Calculador('*', $exampleData);
echo $multiplicacion->resolver($exampleData) . PHP_EOL;

$division = new Calculador('/', $exampleData);
echo $division->resolver($exampleData) . PHP_EOL;

$exampleData = array (5);

$duplicar = new Calculador('doble', $exampleData);
echo $duplicar->resolver($exampleData) . PHP_EOL;
*/

//$operacion = "1 + (2 * 4) - 5";
$operacion = "5 * 3";

$patron = '@([-/+\*])@';
$salida = preg_split($patron, preg_replace('@\s@', '', $operacion ), -1, PREG_SPLIT_DELIM_CAPTURE);

$j = 0;
for ($i = 0; $i < sizeof($salida); $i++)
{
    if (($salida[$i] == '+') || ($salida[$i] == '-') || ($salida[$i] == '*') || ($salida[$i] == '/'))
    {
        switch ($salida[$i])
        {
            case '+':
                $operandos[$j] = $salida[$i-1];
                $j++;
                $operandos[$j] = $salida[$i+1];
                $operation = new Calculador('+');
                echo $operation->resolver($operandos) . PHP_EOL;
            break;
            case '-':
                $operandos[$j] = $salida[$i-1];
                $j++;
                $operandos[$j] = $salida[$i+1];
                $operation = new Calculador('-');
                echo $operation->resolver($operandos) . PHP_EOL;
            break;
            case '*':
                $operandos[$j] = $salida[$i-1];
                $j++;
                $operandos[$j] = $salida[$i+1];
                $operation = new Calculador('*');
                echo $operation->resolver($operandos) . PHP_EOL;
            break;
            case '/':
                $operandos[$j] = $salida[$i-1];
                $j++;
                $operandos[$j] = $salida[$i+1];
                $operation = new Calculador('/');
                echo $operation->resolver($operandos) . PHP_EOL;
            break;
        }
    }
}

?>