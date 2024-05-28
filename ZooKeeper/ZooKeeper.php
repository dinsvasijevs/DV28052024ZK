<?php
use Animals\Interactions;
use Animals\FoodReserves;
use Animals\AnimalsNames;
use Animals\HappinessValue;

require_once 'AnimalsNames.php';
require_once 'FoodReserves.php';
require_once 'Interactions.php';
require_once 'HappinessValue.php';

echo "Animals in Zoo: \n";
$AnimalsInZoo = strtolower("Lion, Tiger, Gazelle, Rabbit, Panda");
echo $AnimalsInZoo . "\n";
$AnimalChoice = strtolower(readline("Choose an Animal: "));

if (is_string($AnimalChoice)) {
    $EveryAnimal = explode(", ", $AnimalsInZoo);

    if (!in_array($AnimalChoice, $EveryAnimal)) {
        echo "Match not found: $AnimalChoice \n";
        exit;
    }
}

if ($AnimalChoice == strtolower("Lion")) {
    $AnimalName = new AnimalsNames("Simba");
    echo $AnimalChoice . " " . $AnimalName->getLion();
    echo "\n";
}

if ($AnimalChoice == strtolower("Tiger")) {
    AnimalsNames::setTiger("Sher Khan");
    echo "Tiger name: " . AnimalsNames::getTiger(). "\n";
}

if ($AnimalChoice == strtolower("Gazelle")) {
    AnimalsNames::setGazelle("Bambi");
    echo "Gazelle name: " . AnimalsNames::getGazelle(). "\n";
}

if ($AnimalChoice == strtolower("Rabbit")) {
    AnimalsNames::setRabbit("Bugs");
    echo "Rabbit name: " . AnimalsNames::getRabbit(). "\n";
}

if ($AnimalChoice == strtolower("Panda")) {
    AnimalsNames::setPanda("Po");
    echo "Panda name: " . AnimalsNames::getPanda(). "\n";
}

$FoodResources = new FoodReserves();
$FoodList = "";

echo "\n\n";

echo "To play with animal choose 1 \n";
echo "To make animal work choose 2 \n";
echo "To feed animal choose 3 \n";
echo "To pet animal choose 4 \n\n";

$personalChoice = (int)readline("Choose a number: ");

switch ($personalChoice) {
    case 1:
        $playingWithAnimal = new Interactions();
        $playingWithAnimal->setPlaying(true);
        $playingWithAnimalEnergy = new FoodReserves();
        $playingWithAnimalEnergy->subtractFood($AnimalChoice);
        echo "\n";
        break;

    case 2:
        $makeAnimalWork = new Interactions();
        $makeAnimalWork->setWorking(true);
        echo "Happiness value:" . $makeAnimalWork->isWorking();
        $playingWithAnimalEnergy = new FoodReserves();
        $playingWithAnimalEnergy->subtractFood($AnimalChoice);
        echo "\n";
        break;

    case 3:
        $foodReserves = new FoodReserves();
        $foodReserves->getFoodLists($AnimalChoice);
        echo "\n";
        $FoodReserves = new FoodReserves();
        $addFood = strtolower(readline("Choose food for animal: "));
        $FoodReserves->addFood($AnimalChoice, $addFood);
        $FoodReserves->getFoodCount($AnimalChoice);
        if ($FoodReserves->getFoodCount($AnimalChoice) < 0) {
            $wrongFood = new Interactions();
            $wrongFood->setFeeding(false);
            echo $wrongFood->isFeeding();
        }
        echo "\n";
        break;

    case 4:
        $petAnimal = new Interactions();
        $petAnimal->setPetting(true);
        echo "\n";
        break;

    default:
        echo "Wrong number, try again!";
        break;
}
