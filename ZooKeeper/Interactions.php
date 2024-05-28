<?php

namespace Animals;

use stdClass;

class Interactions
{
    private bool $playing = false;
    private bool $working = false;
    private bool $feeding = false;
    private bool $petting = false;
    private int $animalHappinessValue;
    private string $filePath = 'animal_happiness.json';

    public function __construct()
    {
        $this->loadHappinessValue();
    }

    private function loadHappinessValue(): void
    {
        if (file_exists($this->filePath)) {
            $data = json_decode(file_get_contents($this->filePath));
            $this->animalHappinessValue
                = $data->animalHappinessValue ?? 0;
            if (!file_exists($this->filePath)) {
                $this->animalHappinessValue = 0;
            }
        }
    }

    private function saveHappinessValue(): void
    {
        $data = new stdClass();
        $data->animalHappinessValue = $this->animalHappinessValue;
        file_put_contents($this->filePath,
            json_encode($data, JSON_PRETTY_PRINT));
    }

    public function setPlaying(bool $playing): void
    {
        sleep(5);
        if ($this->playing !== $playing) {
            $this->playing = $playing;
            $this->animalHappinessValue += $playing ? 10 : -10;
            $this->saveHappinessValue();
            echo $playing ? "Playing started. " : "Playing stopped. ";
            echo "Current happiness value: " .
                $this->animalHappinessValue . "\n";
        }
    }

    public function setFeeding(bool $feeding): void
    {
        if ($this->feeding !== $feeding) {
            $this->feeding = $feeding;
            $this->animalHappinessValue += $feeding ? 10 : -10;
            $this->saveHappinessValue();
            echo $feeding ? "Feeding started. " : "Feeding stopped. ";
            echo "Current happiness value: " .
                $this->animalHappinessValue . "\n";
        }
    }

    public function setWorking(bool $working): void
    {
        if ($this->working !== $working) {
            $this->working = $working;
            $this->animalHappinessValue += $working ? -10 : 10;
            $this->saveHappinessValue();
            echo $working ? "Working started. " : "Working stopped. ";
            echo "Current happiness value: " .
                $this->animalHappinessValue . "\n";
        }
    }

    public function setPetting(bool $petting): void
    {
        if ($this->petting !== $petting) {
            $this->petting = $petting;
            $this->animalHappinessValue += $petting ? 10 : -10;
            $this->saveHappinessValue();
            echo $petting ? "Petting started. " : "Petting stopped. ";
            echo "Current happiness value: " .
                $this->animalHappinessValue . "\n";
        }
    }

    public function isWorking(): bool
    {
        return $this->working;
    }

    public function isPlaying(): bool
    {
        return $this->playing;
    }

    public function isFeeding(): bool
    {
        return $this->feeding;
    }

    public function isPetting(): bool
    {
        return $this->petting;
    }

    public function getAnimalHappinessValue(): int
    {
        return $this->animalHappinessValue;
    }
}
