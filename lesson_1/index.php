<?php
/*Task 1*/

class Weapon
{
    protected $damage;
    protected $title;

    public function __construct($damage, $title)
    {
        $this->damage = $damage;
        $this->title = $title;
    }

    public function damaging()
    {
        echo "This {$this->title} set damage = {$this->damage}" . "<br>";
    }

    public function getDamage()
    {
        return $this->damage;
    }

    public function setDamage($damage): void
    {
        $this->damage = $damage;
    }

}

class ColdWeapon extends Weapon
{
    protected $long;
    protected bool $twoSide;

    public function __construct($damage, $title, $long, bool $twoSide)
    {
        parent::__construct($damage, $title);
        $this->long = $long;
        $this->twoSide = $twoSide;
    }

    public function damaging()
    {
        if ($this->twoSide) {
            $this->damage *= 1.5;
            echo "This {$this->title} set damage = {$this->damage}" . "<br>";
        } else parent::damaging();
    }
}

class FireArm extends Weapon
{
    protected $ammunition;

    public function __construct($damage, $title, $ammunition)
    {
        parent::__construct($damage, $title);
        $this->ammunition = $ammunition;
    }

    public function damaging()
    {
        if ($this->ammunition === 0) {
            $this->damage = 0;
            echo "У {$this->title} кончились боеприпасы! Урон = {$this->damage}!" . "<br>";
        } else {
            parent::damaging();
            $this->ammunition--;
            echo "У {$this->title} осталось {$this->ammunition} в обойме!" . "<br>";
        }
    }
}

$rock = new Weapon(10, "Камешек");
$sword = new ColdWeapon(30,"Экскалибур", 100, true);
$knife = new ColdWeapon(20, "Перочинный нож",50, false);
$gun = new FireArm(500,"Плазмоган", 8);

$rock->damaging();
$sword->damaging();
$knife->damaging();

for($i = 0; $i<=9; $i++){
    $gun->damaging();
}


/*Task 3*/


//class A {
//    public function foo() {
//        static $x = 0;
//        echo ++$x;
//    }
//}
//$a1 = new A();
//$a2 = new A();
//$a1->foo(); // переменая х статичная и принадлежит классу. Форма инкремента перфиксная, следовательно сначала произойдет инкремент, потом вывод
//$a2->foo();// и общий вывод поэтому будет 1234
//$a1->foo();
//$a2->foo();



class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A();// переменая х статичная и принадлежит классу. Форма инкремента перфиксная, следовательно сначала произойдет инкремент, потом вывод
$b1 = new B();// но т.к. класс B это отдельный класс, у него своя переменная х. и вывод 1122
$a1->foo();
$b1->foo();
$a1->foo();
$b1->foo();


/*Task 5* */
//class A {
//    public function foo() {
//        static $x = 0;
//        echo ++$x;
//    }
//}
//class B extends A {
//}
//$a1 = new A;
//$b1 = new B;
//$a1->foo(); // аналогично п.3. запись присваивания может быть и без ()
//$b1->foo();
//$a1->foo();
//$b1->foo();

