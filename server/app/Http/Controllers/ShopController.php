<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function index()
    {
        return Shop::all();
    }

    public function show(Shop $shop)
    {
        return $shop;
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'start_date' => 'required'
        ]);

        return Shop::create($formFields);
    }

    public function update(Request $request, Shop $shop)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'nullable'
        ]);

        return $shop->update($formFields);
    }

    public function destroy(Shop $shop)
    {
        return $shop->delete();
    }
}
