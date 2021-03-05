<?php


namespace App\Services;


use App\Services\ReadData\Customer;
use App\Services\ReadData\Sales;
use App\Services\ReadData\Salesman;
use function PHPUnit\TestFixture\func;

class WriteData
{
    public function handle($data)
    {
        $salesman       = $data->where('groupId', Salesman::ID);
        $sales          = $data->where('groupId', Sales::ID);
        $countCustomers = $data->where('groupId', Customer::ID)->count();
        $countSalesman  = $salesman->count();

        $sumSalarySalesman = $salesman->sum(function ($item) {
            return $item->getSalary();
        });

        $averageSalarySalesman = $sumSalarySalesman / $countSalesman;

        $bestSale = $sales->max(function ($item) {
            return [
                'saleId'    => $item->getSaleId(),
                'total'     => $item->getTotal()
            ];
        });

        $groupBySalesman = $sales->groupBy(function ($item) {
            return $item->getSalesman();
        });

        $totalSalesPerSalesman = $groupBySalesman->map(function ($item, $key) {
            return [
                'salesman' => $key,
                'total' => $item->sum(function ($j) {
                    return $j->getTotal();
                })
            ];
        });

        $worstSeller = $totalSalesPerSalesman->sortBy('total')->first();

        $txt    = "Quantidade de clientes: {$countCustomers}\n";
        $txt    .= "Quantidade de vendedores: {$countSalesman}\n";
        $txt    .= "Média salarial dos vendedores: " . number_format($averageSalarySalesman, 2) . "\n";
        $txt    .= "Melhor venda: {$bestSale['saleId']} no valor de R$ " . number_format($bestSale['total'], 2) . "\n";
        $txt    .= "Pior vendedor: {$worstSeller['salesman']} com um total de R$ " . number_format($worstSeller['total'], 2) . "\n";
        $file   = fopen(base_path() . '/public/data/out/' . time() . '.done.dat', "w");

        fwrite($file, $txt);
        fclose($file);
    }
}
