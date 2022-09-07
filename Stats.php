<?php
class Stats{

    public $health;
    public $strength;
    public $defense;
    public $speed;
    public $luck;
    public $skills;
    public $attackDamage;
    public $damageReceived;

    // public $abilitati;
    // public $banana_strike;
    // public $umbrella_shield;

    public function __construct($health, $strength, $defense, $speed, $luck)
    {
        $this->health = $health;
        $this->strength = $strength;
        $this->defense = $defense;
        $this->speed = $speed;
        $this->luck = $luck;
    }


    
}
