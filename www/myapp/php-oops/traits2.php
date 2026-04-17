

<?php

trait TraitA {
    public function greet() { echo "Hi from A"; }
    public function bye() { echo "Bye from A"; }
}

trait TraitB {
    public function greet() { echo "Hi from B"; }
    public function bye() { echo "Bye from B"; }
}

// trait TraitC {
//     public function greet() { echo "Hi from C"; }
// }

trait TraitD {
    public function greet() { echo "Hi from D"; }
    public function bye() { echo "Bye from D"; }
}

class User {
    use TraitB, TraitA, TraitD {
        TraitD::greet insteadof TraitA,TraitB;
        // TraitD::greet insteadof TraitB;
        TraitD::bye insteadof TraitB, TraitA; 
    }
    
    
    
    
}

$o1=new User();

$o1->greet();
echo "\n";
// $o1->bye();

?>