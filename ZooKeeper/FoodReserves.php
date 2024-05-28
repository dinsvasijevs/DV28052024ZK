<?php

namespace Animals;

class FoodReserves
{
    private array $gazelleFoodList;
    private array $lionsFoodList;
    private array $pandasFoodList;
    private array $tigersFoodList;
    private array $rabbitsFoodList;
    private string $filePath = 'food_reserves.json';

    public function __construct()
    {
        $this->gazelleFoodList =
            ["grass", "leaves", "shoots", "fruits", "shrubs"];

        $this->lionsFoodList =
            ["beef meat", "bird meat", "antelope", "rabbit meat"];

        $this->pandasFoodList =
            ["bamboo", "bamboo Leaves",
                "bamboo steams", "bamboo shoots", "fruits"];

        $this->tigersFoodList =
            ["wild pig", "monkey", "bird", "reptile", "fish"];

        $this->rabbitsFoodList =
            ["hay", "vegetables", "pellets", "herbs", "fruits"];


        if (!file_exists($this->filePath)) {
            $this->initializeFoodReserves();
        }
    }

    public function getFoodLists(string $animal): array
    {
        if ($animal === 'gazelle') {
            $gazelle = $this->gazelleFoodList;
            foreach ($gazelle as $foodItem) {
                echo $foodItem . ', ';
            }
            return $gazelle;
        }

        if ($animal === 'lion') {
            $lion = $this->lionsFoodList;
            foreach ($lion as $foodItem) {
                echo $foodItem . ', ';
            }
            return $lion;
        }

        if ($animal === 'panda') {
            $panda = $this->pandasFoodList;
            foreach ($panda as $foodItem) {
                echo $foodItem . ', ';
            }
            return $panda;
        }

        if ($animal === 'tiger') {
            $tiger = $this->tigersFoodList;
            foreach ($tiger as $foodItem) {
                echo $foodItem . ', ';
            }
            return $tiger;
        }

        if ($animal === 'rabbit') {
            $rabbit = $this->rabbitsFoodList;
            foreach ($rabbit as $foodItem) {
                echo $foodItem . ', ';
            }
            return $rabbit;
        }

        return [];
    }

    private function initializeFoodReserves(): void
    {
        $initialCounts = [
            'gazelleFood' => 90,
            'lionsFood' => 90,
            'pandasFood' => 90,
            'tigersFood' => 90,
            'rabbitsFood' => 90
        ];
        file_put_contents($this->filePath, json_encode($initialCounts));
    }

    private function readFoodReserves(): array
    {
        $jsonContent = file_get_contents($this->filePath);
        return json_decode($jsonContent, true);
    }

    private function saveFoodReserves(array $counts): void
    {
        file_put_contents($this->filePath, json_encode($counts));
    }

    public function addFood(string $animalType, string $foodItem): void
    {
        $counts = $this->readFoodReserves();
        $foodList = $this->getFoodListByAnimalType($animalType);
        $foodKey = $animalType . 'Food';

        if (!array_key_exists($foodKey, $counts)) {
            $counts[$foodKey] = 0;
        }

        $isCorrectFood = in_array($foodItem, $foodList);
        $counts[$foodKey] += $isCorrectFood ? 10 : -20;

        $this->saveFoodReserves($counts);


        echo $isCorrectFood ? "Correct food chosen, ".
            "+10 to $animalType food reserves. " :
            "Wrong food chosen, -20 to $animalType food reserves. ";
        echo "Current $animalType food reserves: " . $counts[$foodKey];
    }

    public function subtractFood(string $animalType): void
    {
        $counts = $this->readFoodReserves();
        $foodKey = $animalType . 'Food';


        if (!array_key_exists($foodKey, $counts)) {
            $counts[$foodKey] = 0;
        }

        $counts[$foodKey] -= 10;

        $this->saveFoodReserves($counts);

        // Output result
        echo "One unit of $animalType food used. ";
        echo "Current $animalType food reserves: " . $counts[$foodKey];
    }

    public function getFoodCount(string $animalType): int
    {
        $counts = $this->readFoodReserves();
        return $counts[$animalType . 'Food'] ?? 0;
    }

    private function getFoodListByAnimalType(string $animalType): array
    {
        switch ($animalType) {
            case 'gazelle':
                return $this->gazelleFoodList;
            case 'lion':
                return $this->lionsFoodList;
            case 'panda':
                return $this->pandasFoodList;
            case 'tiger':
                return $this->tigersFoodList;
            case 'rabbit':
                return $this->rabbitsFoodList;
            default:
                return [];
        }
    }
}
