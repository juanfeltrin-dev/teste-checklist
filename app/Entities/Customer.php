<?php


namespace App\Entities;


class Customer
{
    public $groupId = 002;

    private $cnpj, $name, $businessArea;

    /**
     * @return mixed
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * @param mixed $cnpj
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getBusinessArea()
    {
        return $this->businessArea;
    }

    /**
     * @param mixed $business
     */
    public function setBusinessArea($businessArea)
    {
        $this->businessArea = $businessArea;
    }

}
