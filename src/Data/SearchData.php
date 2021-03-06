<?php


namespace App\Data;


use App\Entity\Campus;

class SearchData
{
    /**
     * @var string
     */
    public $motclef ='';

    /**
     * @var Campus[]
     */
    public $campus =[];

    /**
     * @var mixed|null
     */
    public $datedebut;



    /**
     * @var mixed|null
     */
    public $datefin;

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
     * @return Campus[]
     */
    public function getCampus(): array
    {
        return $this->campus;
    }

    /**
     * @param Campus[] $campus
     */
    public function setCampus(array $campus): void
    {
        $this->campus = $campus;
    }

    /**
     * @return mixed|null
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * @param mixed|null $datedebut
     */
    public function setDatedebut($datedebut): void
    {
        $this->datedebut = $datedebut;
    }

    /**
     * @return mixed|null
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * @param mixed|null $datefin
     */
    public function setDatefin($datefin): void
    {
        $this->datefin = $datefin;
    }











}