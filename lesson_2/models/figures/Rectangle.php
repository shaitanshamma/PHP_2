<?php


namespace app\models\figures;


class Rectangle extends Figure
{
    protected int $firstSide;
    protected int $secondSide;


    public function __construct(int $firstSide, int $secondSide)
    {
        $this->firstSide = $firstSide;
        $this->secondSide = $secondSide;
    }

    function info()
    {
        echo "Это прямоугольник!";
    }

    function square()
    {
        return $this->firstSide * $this->secondSide;
    }

    function perimeter()
    {
        return 2 * ($this->firstSide + $this->secondSide);
    }

}