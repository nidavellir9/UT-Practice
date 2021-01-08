<?php
use PHPUnit\Framework\TestCase;

class OperationsTest extends TestCase
{
    private $op;

    public function setUp(): void
    {
        $this->op = new Operations();
    }

    public function dataProvider()
    {
        return [
            "Prueba uno" => [2, 5, 7],
            "Prueba dos" => [2, 2, 4],
            "Prueba tres" => [8, 2, 10],
            "Prueba cuatro" => [10, 7, 17]
        ];
    }

    /**
     * @dataProvider dataProvider
     */
    public function testSumWithTwoValues($num1, $num2, $expected)
    {
        $this->assertEquals($expected, $this->op->sum($num1, $num2));
    }

    public function testSumWithNullValues()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->op->sum(NULL, NULL);
    }

    public function testSumWithNotNumericValues()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->op->sum('Hello', 'World');
    }

    public function testDivideWithTwoValues()
    {
        $this->assertEquals(1, $this->op->divide(5, 5));
    }

    public function testDivideWithNullValues()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->op->divide(NULL, NULL);
    }

    public function testDivideWithNotNumericValues()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->op->divide('Hello', 'World');
    }

    public function testDivideBetweenZero()
    {
        $this->expectException(DivisionByZeroError::class);
        $this->op->divide(5, 0);
    }
}
?>