<?php 

class BankAccount {
   public $id;
   private $balance;

   public function __construct($id) {
      $this->id = $id;
   }

   public function getBalance() {
      return $this->balance;
   }

   public function setBalance($balance) {
      $this->balance = $balance;
   }
}

$bankAccount = new BankAccount(2131561);
$bankAccount->setBalance(100);
echo $bankAccount->getBalance() .".00\n";


class ParentClass {
   public function sayHello(){
      echo "Hello from Parent\n";
   }
}

class ChildClass extends ParentClass {
   public function sayHello(){
      echo "Say Hello from Child\n";
   }
}

$parent = new ParentClass();
$parent->sayHello();
$child = new ChildClass();
$child->sayHello();


class Greet {
   public function __call($method, $args){
      if ($method == "sayHello"){
         if (count($args) == 1){
            echo "Hello " . $args[0] . "!\n";
         } else {
            echo "Hello!\n";
         }
      }
   }
}

$greet = new Greet();
$greet->sayHello();
$greet->sayHello("Wathsalya");


abstract class Animal {

   public abstract function transport();
   
   public function greet(){
      echo "Hello from Animal Class";
   }
}

class Bird extends Animal {
   public $name;
   public function __construct($name){
      $this->name = $name;
   }

   public function transport(){
      echo "Bird is Flying";
   }
}

interface Phone{
   public function call();
}

class Smartphone{
   public function touchScreen(){
      echo "Touch Screen from Smartphone\n";
   }
}


class AndroidPhone extends Smartphone implements Phone {

   public function call(){
      echo "Calling from Android phone\n";
   }

   public function getPhones(){
      $phones = ["samsung","oppo","oneplus"];
      foreach($phones as $item){
         echo $item . " ";
      }
      echo "\n";
   }

   public function getPrices(){
      $prices = ["samsung"=> 1000, "oppo"=> 2000, "oneplus"=> 3000];
      foreach($prices as $key=>$value){
         echo "$key:$value \n";
      }
   }

   public function touchScreen(){
      parent::touchScreen();
      echo "Touch Screen from Android Phone\n";
   }
}

$androidPhone = new AndroidPhone();
$androidPhone->call();
$androidPhone->touchScreen();
$androidPhone->getPhones();
$androidPhone->getPrices();

?>