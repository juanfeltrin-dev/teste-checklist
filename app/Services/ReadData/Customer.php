<?php


namespace App\Services\ReadData;


use App\Services\ReadData\Helper\FormatHelper;

class Customer implements EntityInterface
{
    const ID    = 002;
    const KEY   = 'customer';

    /**
     * @var FormatHelper
     */
    private $formatHelper;

    public function __construct(
        FormatHelper $formatHelper
    ) {
        $this->formatHelper     = $formatHelper;
    }

    public function handle($data)
    {
        $data       = $this->formatHelper->formatDefault($data);
        $customer   = new \App\Entities\Customer();

        $customer->setCnpj($data[1]);
        $customer->setName($data[2]);
        $customer->setBusinessArea($data[3]);

        return $customer;
    }
}
