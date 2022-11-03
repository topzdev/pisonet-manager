<?php

namespace App\Http\Controllers;

use App\Models\CoinsOutSale;
use App\Models\Shareholder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use function array_merge;
use function response;

class CoinsOutSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return CoinsOutSale[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection
     */
    public function index($coinsOutId)
    {
        return CoinsOutSale::where('coins_out_id', '=', $coinsOutId)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response|CoinsOutSale|\Illuminate\Database\Eloquent\Model|Response
     */
    public function store(Request $request)
    {
        $fields = $request->validate(
            [
                "amount" => "required|numeric|gt:0",
                "shareholder_id" => "required",
                "shop_id" => "required",
                "coins_out_id" => "required",
            ]
        );

        $exists = CoinsOutSale::where([
            ['coins_out_id', '=', $fields['coins_out_id']],
            ['shareholder_id', '=', $fields['shareholder_id']]
        ])->exists();

        if ($exists) {
            return response([
                "message" => "Shareholder already have sale",
                "errors" => [
                    "shareholder_id" => "Shareholder already have sale"
                ]
            ]);
        }

        $shareholder = Shareholder::where([
            ["shop_id", "=", $fields['shop_id']],
            ["id", "=", $fields['shareholder_id']],
        ])->first();

        if (empty($shareholder)) {
            return response([
                "message" => "Shareholder not exists",
                "errors" => [
                    "shareholder_id" => "Shareholder not exists"
                ]
            ]);
        }


        $coinsOutSale = array_merge([
                ...$fields,
                "shareholder_percentage" => $shareholder["percentage"]
            ]

        );

        return CoinsOutSale::create($coinsOutSale);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return CoinsOutSale || null
     */
    public function show($id)
    {
        return CoinsOutSale::where('id', '=', $id)->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response|bool
     */
    public function update(Request $request, $id)
    {
        $coinsOutSale = CoinsOutSale::where('id', '=', $id)->first();

        if (empty($coinsOutSale)) {
            return response([
                "message" => "Coins out sale not exists"
            ], 400);
        }

        $fields = $request->validate([
            "amount" => "numeric|gt:0"
        ]);


        return $coinsOutSale->update($fields);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coinsOutSale = CoinsOutSale::where('id', '=', $id)->first();

        if (empty($coinsOutSale)) {
            return response([
                "message" => "Coins out sale not exists"
            ], 400);
        }

        return $coinsOutSale->delete();
    }
}
