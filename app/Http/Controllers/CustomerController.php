<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function getData(Request $request)
    {
        $name = $request->attributes->get('auth')->name ?? 'Unknown';
        return response()->json([
            "result" => [
                [
                    "name_customers" => $name,
                    "items" => "Lampu bohlam LED 20 WATT",
                    "discount" => "0,02",
                    "fix_price" => "19600"
                ],
                [
                    "name_customers" => $name,
                    "items" => "Mouse wireless logitech",
                    "discount" => "0,035",
                    "fix_price" => "175000"
                ]
            ]
        ]);
    }
}
