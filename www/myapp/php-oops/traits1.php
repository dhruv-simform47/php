<?php
trait TraitA {
    public function sayHello() {
        echo "Hello from the TRAIT!<br>";
    }
}
trait TraitB {
    public function sayHello() {
        echo "Hello from the TRAIT!<br>";
    }
}

class ParentClass {
    public function sayHello() {
        echo "Hello from the PARENT!<br>";
    }
}

class ChildClass extends ParentClass {
    // use SocialTrait;
    use TraitA,TraitB{
         TraitB::sayHello insteadof TraitA;
        TraitB::sayHello as bsay;
    }
    
    // public function sayHello() {
    //     echo "Hello from the CHILD!<br>";
    // }
}

$obj = new ChildClass();
// $obj->sayHello();
$obj->bsay();
?>