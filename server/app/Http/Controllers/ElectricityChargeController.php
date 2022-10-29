<?php

namespace App\Http\Controllers;

use App\Models\ElectricityCharge;
use Illuminate\Http\Request;

class ElectricityChargeController extends Controller
{
    public function index(Request $request, $shopId)
    {
        return ElectricityCharge::with('shop')->where('shop_id', '=', $shopId)->get();
    }

    public function show(ElectricityCharge $electricityCharge) {
        return $electricityCharge;
    }

    public function store(Request $request)
    {

        $fields =  $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'kwh' => 'required|numeric',
            'kwh_charge' => 'required|numeric'
        ]);

        return ElectricityCharge::create($fields);
    }

    public function update(Request $request, ElectricityCharge $electricityCharge ) {

        $fields =  $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'kwh' => 'required|numeric',
            'kwh_charge' => 'required|numeric'
        ]);

        return $electricityCharge->update($fields);
    }

    public function destroy(ElectricityCharge $electricityCharge) {
        return $electricityCharge->delete();
    }
}
