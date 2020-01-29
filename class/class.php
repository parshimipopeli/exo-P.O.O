<?php

class voiture
{
    private $marque = " mercedes";
    private $consomation;
    public CONST nbre_roue = 4;

    public function __construct($conso)

    {

        echo 'la consommation moyenne est de : ' . $this->consomation = $conso . "L/100" . "<br>";

    }

    public function hello()
    {
        return "hello you";
    }

    public function getMarque()
    {
        return $this->marque;
    }

    public function setMarque($marque)
    {
        $this->marque = $marque;
    }

    public static function getNbre_roue()
    {

      return  self::nbre_roue;

    }

    public function __destruct()
    {
        echo '<br>boummmm';
    }

}


?>