<?php
class Person {
    private $name;
    private $lastname;
    private $age;
    private $hp;
    private $mother;
    private $father;

    function __construct($name, $lastname, $age, $mother, $father) {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->age = $age;
        $this->hp = 100;
        $this->mother = $mother;
        $this->father = $father;
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
    function getAge() {
        return $this->age;
    }

    function getInfo() {
        return "
        <h1>About my family</h1><br>"."My name is: ".$this->getName()."<br> My lastname is: ".$this->getLastname()."<br> My age is: ".$this->getAge()."<br> My mother is: ".$this->getMother()->getName()."<br> My father is: ".$this->getFather()->getName()."<br> I have grandmother and grandfather from mother side and father side, mother's parents are: ".$this->getMother()->getMother()->getName().", ".$this->getMother()->getFather()->getName()."<br> My father's parents are: ".$this->getFather()->getMother()->getName().", ".$this->getFather()->getFather()->getName();
    }
}

$igor = new Person("Igor", "Petrov", 62, null, null);
$elena = new Person ("Elena", "Petrova", 61, null, null);

$vlad = new Person ("Vladislav", "Ivanov", 65, null, null);
$vica = new Person ("Victoria", "Ivanova", 65, null, null);

$alex = new Person("Alex", "Ivanov", 42, $vica, $vlad);
$olga = new Person("Olga", "Ivanova", 42, $elena, $igor);
$valera = new Person("Valera", "Ivanov", 15, $olga, $alex);

echo $valera->getInfo();
// echo $valera->getMother()->getMother()->getName();







?>