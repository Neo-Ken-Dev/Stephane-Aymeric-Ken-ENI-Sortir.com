<?php


namespace App\Data;


use DateTime;

class SearchData
{
    /**
     * @var string
     */
    public $motclef ='';

    /**
     * @var array
     */
    public $campus =[];

    /**
     * @var mixed
     */
    public $datedebut;

    /**
     * @return string
     */
    public function getMotclef(): string
    {
        return $this->motclef;
    }

    /**
     * @param string $motclef
     */
    public function setMotclef(string $motclef): void
    {
        $this->motclef = $motclef;
    }

    /**
     * @return array
     */
    public function getCampus(): array
    {
        return $this->campus;
    }

    /**
     * @param array $campus
     */
    public function setCampus(array $campus): void
    {
        $this->campus = $campus;
    }

    /**
     * @return mixed
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * @param mixed $datedebut
     */
    public function setDatedebut(DateTime $datedebut): void
    {
        $this->datedebut = $datedebut;
    }



}