<?php

class Calculador
{
    private $operator;

    public function __construct(string $operation)
    {
        switch ($operation)
        {
            case "+":
                $this->operator = new Sumar();
            break;
            case "-":
                $this->operator = new Restar();
            break;
            case "*":
                $this->operator = new Multiplicar();
            break;
            case "/":
                $this->operator = new Dividir();
            break;
            case "doble":
                $this->operator = new Duplicar();
            break;
            default:
                throw new \InvalidArgumentException("{$operation} is not supported");
        }
    }

    public function resolver(array $operandos): float
    {
        return $this->operator->resultado($operandos);
    }
}

interface Result
{
    public function resultado(array $operandos): float;
}

class Sumar implements Result
{
    public function resultado(array $operandos): float
    {
        return array_sum($operandos);
    }
}

class Restar implements Result
{
    public function resultado(array $operandos): float
    {
        $result = $operandos[0];
        for ($i = 1; $i < sizeof($operandos); $i++)
        {
            $result = $result - $operandos[$i];
        }

        return $result;
    }
}

class Multiplicar implements Result
{
    public function resultado(array $operandos): float
    {
        $result = $operandos[0];
        for ($i = 1; $i < sizeof($operandos); $i++)
        {
            $result = $result * $operandos[$i];
        }

        return $result;
    }
}

class Dividir implements Result
{
    public function resultado(array $operandos): float
    {
        $result = $operandos[0];
        for ($i = 1; $i < sizeof($operandos); $i++)
        {
            $result = $result / $operandos[$i];
        }

        return $result;
    }
}

class Duplicar implements Result
{
    public function resultado(array $operandos): float
    {
        return $operandos[0] * $operandos[0];
    }
}

?>