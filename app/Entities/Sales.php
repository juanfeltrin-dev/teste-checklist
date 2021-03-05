<?php


namespace App\Entities;


use Illuminate\Support\Collection;

class Sales
{
    public $groupId = 003;

    /**
     * @var integer
     */
    private $saleId;

    /**
     * @var Item[]
     */
    private $item;

    /**
     * @var string
     */
    private $salesman;

    /**
     * @return integer
     */
    public function getSaleId()
    {
        return $this->saleId;
    }

    /**
     * @param integer $saleId
     */
    public function setSaleId($saleId)
    {
        $this->saleId = $saleId;
    }

    /**
     * @return Collection
     */
    public function getItem()
    {
        return collect($this->item);
    }

    /**
     * @param Item $item
     */
    public function setItem(Item $item)
    {
        $this->item[] = $item;
    }

    /**
     * @return string
     */
    public function getSalesman()
    {
        return $this->salesman;
    }

    /**
     * @param string $salesman
     */
    public function setSalesman($salesman)
    {
        $this->salesman = $salesman;
    }

    public function getTotal()
    {
        return $this->getItem()->sum(function ($item) {
            return $item->getPrice();
        });
    }

}
