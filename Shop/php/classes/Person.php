<?php
header('Content-Type: text/html; charset=utf-8');
class Person {
  private $name;
  private $lastname;
  private $age;
  private $hp;
  private $mother;
  private $father;

function __construct($name, $lastname, $age, $mother, $father) 
{
  $this->name = $name;
  $this->lastname = $lastname;
  $this->age = $age;
  $this->mother = $mother;
  $this->father = $father;
  $this->hp = 100;
}

  function sayHi($name) {
    return "Hi $name, I`m " . $this->name;
  }

  function setHp($hp) {
    if ($this->hp + $hp > 100) $this->hp  = 100;
    else $this->hp = $this->hp + $hp;
  }
  function getHp() {
    return $this->hp;
  }
  function getName() {
    return $this->name;
  }
  function getLastname() {
    return $this->lastname;
  }
  function getMother() {
    return $this->mother;
  }
  function getFather() {
    return $this->father;
  }
  function getInfo() {
    return "<h2>несколько слов и моих родственниках: </h2><br>" . 
    "Меня зовут - " . $this->getName()
    . "<br> Моя фамилия - " . $this->getLastname()
    . "<br> Имя моей мамы - " . $this->getMother()->getName()
    . "<br> Имя моего папы - " . $this->getFather()->getName()
    . "<br> Имя моей бабушки с маминой стороны - " . $this->getMother()->getMother()->getName()
    . "<br> Имя моего дедушки с маминой стороны - " . $this->getMother()->getFather()->getName()
    . "<br> Имя моей бабушки с папиной стороны - " . $this->getFather()->getMother()->getName()
    . "<br> Имя моего дедушки с папиной стороны - " . $this->getFather()->getFather()->getName();
  }
}

$igor = new Person("Igor", "Petrov", 68, null, null);
$lena = new Person("Lena", "Petrova", 65, null, null);

$kostya = new Person("Kostya", "Ivanov", 63, null, null);
$vera = new Person("Vera", "Ivanova", 61, null, null);


$Alex = new Person("Alex", "Ivanov", 32, $vera, $kostya);
$olga = new Person("Olga", "Ivanova", 30, $lena, $igor);


$valera = new Person("Valera", "Ivanov", 5, $olga, $Alex);


echo $valera->getInfo();

//echo $valera->getName(); //вывод имени валера
//echo $valera->getMother()->getName(); // вывод имени мамы валеры
//echo $valera->getMother()->getFather()->getName(); // вывод импени дедушки(папа с маминой стороны)

// здоровье не м.б. 100 ед.
//$medKit = 50;
//$Alex->setHp(-30); //упал  это private

// $Alex->hp = $Alex->hp - 30; //упал  это если public

//echo $Alex->getHp() . "<br>";  // это для private
//echo $Alex->hp . "<br>";  // это для public

//$Alex->setHp($medKit); // нашел аптечку это для private
//$Alex->hp = $Alex->hp + $medKit; // нашел аптечку это для public

//echo $Alex->getHp(); // это для private
//echo $Alex->hp; // это для public


// echo $Alex->sayHi($igor->name);

// $Alex = new Person();
// $Alex-> name = "Alex";

