<?php

namespace App\Http\Controllers;

use App\Models\SavingFund;
use Illuminate\Http\Request;

class SavingFundController extends Controller
{
    //

    public function store(Request $request, SavingFund $savingFund)
    {
        $request->validate([
            'percentage' => 'required|numeric',
            'description' => 'nullable'
        ]);

        $savingFund = new SavingFund;

        $savingFund->percentage = $request->percentage;
        $savingFund->description = $request->description;

        return $savingFund->save();
    }
}
