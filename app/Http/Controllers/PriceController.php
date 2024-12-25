<?php

namespace App\Http\Controllers;

use App\Models\Price;

class PriceController extends Controller
{

    public function page() {

       $prices = Price::query()->get();

        return view('pages.price.price', ['prices'=> $prices]);
    }

}
