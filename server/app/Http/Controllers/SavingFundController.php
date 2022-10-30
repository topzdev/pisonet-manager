<?php

namespace App\Http\Controllers;

use App\Models\SavingFund;
use Illuminate\Http\Request;

class SavingFundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param int shopId
     * @return \Illuminate\Http\Response
     */
    public function index($shopId)
    {
        return SavingFund::where('shop_id', '=', $shopId)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            "shop_id" => 'required|exists:shop,id',
            'percentage' => "required|numeric",
            'description' => "nullable|string|max:250"
        ]);

        return SavingFund::create($fields);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return SavingFund::find($id)->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $savingFund = SavingFund::find($id)->first();

        $fields =  $request->validate([
            "shop_id" => 'exists:shop,id',
            'percentage' => "numeric",
            'description' => "string|max:250"
        ]);

        return $savingFund->update($fields);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return SavingFund::find($id)->delete();
    }
}
