<?php


namespace App\Factories;


use App\Services\ReadData\Customer;
use App\Services\ReadData\EntityInterface;
use App\Services\ReadData\Sales;
use App\Services\ReadData\Salesman;
use Exception;

class EntityFactory
{
    /**
     * @var EntityInterface[]
     */
    private $entities;

    public function __construct(
        Customer $customer,
        Sales $sales,
        Salesman $salesman
    ) {
        $this->entities = [
            $customer,
            $sales,
            $salesman
        ];
    }

    /**
     * @param $id
     * @return EntityInterface
     * @throws Exception
     */
    public function build($id)
    {
        foreach ($this->entities as $entity) {
            if ($entity::ID == $id) {
                return $entity;
            }
        }

        throw new Exception("Entidade inválida.");
    }
}
