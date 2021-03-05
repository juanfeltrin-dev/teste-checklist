<?php


namespace App\Services\ReadData;



use App\Entities\Item;
use App\Services\ReadData\Helper\FormatHelper;

class Sales implements EntityInterface
{
    const ID    = 003;
    const KEY   = 'sales';

    /**
     * @var FormatHelper
     */
    private $formatHelper;

    public function __construct(
        FormatHelper $formatHelper
    ) {
        $this->formatHelper = $formatHelper;
    }

    public function handle($data)
    {
        $items      = $this->formatHelper->items($data);
        $saleData   = $this->formatHelper->sale($data);
        $sale      = new \App\Entities\Sales();

        $sale->setSaleId($saleData[1]);
        $sale->setSalesman($saleData[2]);

        foreach ($items as $item) {
            $itemEntity = new Item();

            $itemEntity->setId($item[0]);
            $itemEntity->setQuantity($item[1]);
            $itemEntity->setPrice($item[2]);

            $sale->setItem($itemEntity);
        }

        return $sale;
    }
}
