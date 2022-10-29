<?php

namespace App\Http\Controllers;

use App\Models\CoinsOut;
use App\Models\Shop;
use Illuminate\Http\Request;

class CoinsOutController extends Controller
{
    public function index(Request $request, $shopId)
    {

        return CoinsOut::where('shop_id', $shopId);
    }

    public function show(Request $request, $coinsOut)
    {
        return $coinsOut;
    }

    public function store(Request $request)
    {


        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'start_date' => 'required',
            'end_date' => 'required',
            'saving_fund_id' => 'required',
            'electricity_charge_id' => 'required'
        ]);


        return CoinsOut::create([
            'title' => $formFields['title'],
            'description' => $formFields['description'],
            'start_date' => $formFields['start_date'],
            'end_date' => $formFields['end_date'],
            'saving_fund_id' => $formFields['saving_fund_id'],
        ]);
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
