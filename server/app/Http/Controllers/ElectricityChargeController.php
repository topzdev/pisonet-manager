<?php

namespace App\Http\Controllers;

use App\Models\ElectricityCharge;
use Illuminate\Http\Request;

class ElectricityChargeController extends Controller
{
    public function store(Request $request)
    {

        $formFields =  $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'kwh' => 'required|numeric',
            'kwh' => 'required|numeric'
        ]);

        return ElectricityCharge::create($formFields);
    }
}
