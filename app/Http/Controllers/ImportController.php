<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

class ImportController extends Controller
{
    const EXTENSION = 'dat';

    public function index()
    {
        return view('import');
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'data' => 'required|file'
            ]);

            $file       = $request->file('data');
            $extension  = $file->getClientOriginalExtension();

            if ($extension != self::EXTENSION) {
                throw new \Exception("Extensão inválida!");
            }

            $file->move(base_path() . '/public/data/in/', time() . '.' . $extension);

            return redirect()->route('import', ['success' => 1]);
        } catch (\Exception $exception) {
            return redirect()->route('import', ['success' => 0]);
        }
    }
}
