<?php

namespace App\Imports;

use App\Models\Price;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class PricesImport implements ToCollection
{

    public function collection(Collection $rows)
    {

        foreach ($rows as $k =>$row)
        {

            $array[$k]['json_title'] = $row[0];
            $array[$k]['json_price'] = $row[1];
            $array[$k]['json_main'] = $row[2];

            if($row[3]) {


    $array[$k]['property_list'][0]['json_title'] = $row[3];
    $array[$k]['property_list'][0]['json_price'] = $row[4];


    $array[$k]['property_list'][1]['json_title'] = $row[5];
    $array[$k]['property_list'][1]['json_price'] = $row[6];






            }





        }
        //$price = Price::find(13);

       // $price->property = $array;

      //  $price->save();


    }


}
