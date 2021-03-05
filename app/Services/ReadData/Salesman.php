<?php


namespace App\Services\ReadData;


use App\Services\ReadData\Helper\FormatHelper;

class Salesman implements EntityInterface
{
    const ID    = 001;
    const KEY   = 'salesman';

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
        $salesman   = new \App\Entities\Salesman();

        $salesman->setCpf($data[1]);
        $salesman->setName($data[2]);
        $salesman->setSalary($data[3]);

        return $salesman;
    }
}
