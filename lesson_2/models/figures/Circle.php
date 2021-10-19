<?php


namespace app\models\figures;


class Circle extends Figure
{
    protected $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }


    function info()
    {
        echo "Это круг!";
    }

    function square()
    {
        return pow($this->radius, 2) * pi();
    }

    function perimeter()
    {
        return 2 * pi() * $this->radius;
    }
}