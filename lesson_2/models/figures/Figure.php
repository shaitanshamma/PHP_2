<?php

namespace app\models\figures;

abstract class Figure
{
    abstract function info();

    abstract function square();

    abstract function perimeter();
}