<?php

namespace Animals;

class AnimalsNames
{
    private string $Lion;
    private static string $Tiger;
    private static string $Gazelle;
    private static string $Rabbit;
    private static string $Panda;

    public function __construct(string $Lion)
    {
        $this->Lion = $Lion;
    }

    public function getLion(): string
    {
        return $this->Lion;
    }

    public static function setTiger(string $Tiger): string
    {
        self::$Tiger = $Tiger;
        return self::$Tiger;
    }

    public static function getTiger(): string
    {
        return self::$Tiger;
    }

    public static function setGazelle(string $Gazelle): string
    {
        self::$Gazelle = $Gazelle;
        return self::$Gazelle;
    }

    public static function getGazelle(): string
    {
        return self::$Gazelle;
    }

    public static function setRabbit(string $Rabbit): string
    {
        self::$Rabbit = $Rabbit;
        return self::$Rabbit;
    }

    public static function getRabbit(): string
    {
        return self::$Rabbit;
    }

    public static function setPanda(string $Panda): string
    {
        self::$Panda = $Panda;
        return self::$Panda;
    }

    public static function getPanda(): string
    {
        return self::$Panda;
    }
}
