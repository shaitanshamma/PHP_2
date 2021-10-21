<?php

namespace app\models\figures;


class Triangle extends Figure
{
    protected int $firstSide;
    protected int $secondSide;
    protected int $thirdSide;
    protected int $height;

    public function __construct(int $firstSide, int $secondSide, int $thirdSide, int $height)
    {
        $this->firstSide = $firstSide;
        $this->secondSide = $secondSide;
        $this->thirdSide = $thirdSide;
        $this->height = $height;
    }


    function info()
    {
        echo "Это треугольник!";
    }

    function square()
    {
        return 0.5 * ($this->thirdSide * $this->height);
    }

    function perimeter()
    {
        return $this->firstSide + $this->secondSide + $this->thirdSide;
    }

}