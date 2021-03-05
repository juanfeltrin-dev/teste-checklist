<?php


namespace App\Http\Controllers;


use App\Services\ReadData;
use App\Services\WriteData;
use Exception;

class DataController extends Controller
{
    public function index(
        ReadData $readDataService,
        WriteData $writeDataService
    ) {
        try {
            $data = $readDataService->handle();

            $writeDataService->handle($data);

            return view('home')->with('success', 'Dados processados com sucesso!');
        } catch (Exception $exception) {
            return view('home')->with('error', 'Aconteceu um erro ao processar os dados!');
        }
    }
}
