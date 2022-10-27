<?php

namespace App\Http\Controllers;

use App\Models\CoinsOut;
use Illuminate\Http\Request;

class CoinsOutController extends Controller
{
    public function index(Request $request, $id)
    {

        return $id;
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


        $coinsOut = CoinsOut::create([
            'title' => $formFields['title'],
            'description' => $formFields['description'],
            'start_date' => $formFields['start_date'],
            'end_date' => $formFields['end_date']
        ]);


        //    $coinsOut->savingFund()

    }
}
