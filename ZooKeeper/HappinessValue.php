<?php


namespace Animals;

class HappinessValue
{
    private int $happy;

    public function setHappy(int $happy): self
    {
        $this->happy = $happy;
        return $this;
    }

    public function getHappinessStatus(): string
    {
        if ($this->happy > 90) {
            return "Animal is very happy\n";
        }

        if ($this->happy > 70) {
            return "Animal is happy\n";
        }

        if ($this->happy > 50) {
            return "Animal is moderately happy\n";
        }

        if ($this->happy > 30) {
            return "Animal is ok\n";
        }

        if ($this->happy > 10) {
            return "Animal is not ok\n";
        }

        return "Animal is sad\n";
    }
}
