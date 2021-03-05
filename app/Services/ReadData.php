<?php


namespace App\Services;


use App\Factories\EntityFactory;
use Exception;
use Illuminate\Support\Collection;

class ReadData
{
    /**
     * @var EntityFactory
     */
    private $entityFactory;

    /**
     * ReadData constructor.
     * @param EntityFactory $entityFactory
     */
    public function __construct(
        EntityFactory $entityFactory
    ) {
        $this->entityFactory = $entityFactory;
    }

    /**
     * @return Collection
     * @throws Exception
     */
    public function handle()
    {
        $files      = glob(base_path() . '/public/data/in/*.dat');
        $allData    = [];

        foreach ($files as $file) {
            try {
                $data       = file($file);
                $entities   = [];

                foreach ($data as $dt) {
                    $code   = substr($dt, 0, 3);
                    $entity = $this->entityFactory->build($code);

                    $entities[] = $entity->handle($dt);
                }

                $allData = array_merge($allData, $entities);
            } catch (Exception $exception) {
                throw new Exception($exception->getMessage());
            }
        }

        return collect($allData);
    }
}
