<?php

namespace App\Http\Controllers;

use App\Imports\PricesImport;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class TestController extends  Controller
{
    public function import()
    {
        $e = '';
    // $e =   Excel::import(new PricesImport, storage_path('_13.xlsx'));

       dd($e);
    }

}
