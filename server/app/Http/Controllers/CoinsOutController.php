<?php

namespace App\Http\Controllers;

use App\Models\CoinsOut;
use App\Models\Shop;
use Illuminate\Http\Request;

class CoinsOutController extends Controller
{
    public function index(Request $request, $shopId)
    {

        return CoinsOut::where('shop_id', '=', $shopId)->get();
    }

    public function show(Request $request, $id)
    {
        return CoinsOut::where('id', '=', $id)->with('coinsOutSales')->first();
    }

    public function store(Request $request)
    {

        $fields = $request->validate([
            'shop_id' => 'required|exists:shop,id',
            'saving_fund_id' => 'required|exists:saving_fund,id',
            'electricity_charge_id' => 'required|exists:electricity_charge,id',
            'title' => 'required|string',
            'description' => 'nullable|string|max:250',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        return CoinsOut::create($fields);
    }

    public function update(Request $request, CoinsOut $coinsOut)
    {

        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'start_date' => 'required',
            'end_date' => 'required',
            'saving_fund_id' => 'required',
            'electricity_charge_id' => 'required'
        ]);

        return $coinsOut->update($formFields);
    }


    public function destroy(CoinsOut $coinsOut)
    {
        return $coinsOut->delete();
    }
}
