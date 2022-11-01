<?php

namespace App\Http\Controllers;

use App\Models\Shareholder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function response;

class ShareholderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Shareholder[]
     */
    public function index($shopId)
    {
        return Shareholder::where('shop_id', '=', $shopId)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Shareholder
     */
    public function store(Request $request)
    {

        $fields = $request->validate([
            "shop_id" => "required|exists:shop,id",
            "username" => "required|unique:shareholder,username",
            "email" => 'required|email',
            "firstname" => "required|string",
            "percentage" => "required|numeric",
            "lastname" => 'required|string',
            "password" => 'required|string|min:6|max:124|alpha_num|required_with:password_confirmation',
            "password_confirmation" => 'same:password'
        ]);

        $password = Hash::make($fields['password']);

        return Shareholder::create([
            ...$fields,
            'password' => $password
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Shareholder
     */
    public function show($id)
    {
        return Shareholder::find($id)->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return bool
     */
    public function update(Request $request, $id)
    {
        $shareholder = Shareholder::find($id)->first();

        $fields = $request->validate([
            "firstname" => "string",
            "lastname" => 'string',
        ]);

        return $shareholder->update($fields);
    }


    /**
     * Update shareholder password
     *
     * @param  int  $id
     * @return bool or \Illuminate\Http\Response
     */
    public function changePassword(Request $request, $id)
    {
        $fields = $request->validate([
            "password" => "required",
            "new_password" => 'required|string|min:6|max:124|alpha_num|required_with:password_confirmation',
            "new_password_confirmation" => 'same:new_password'
        ]);

        $shareholder = shareholder::find($id)->first()->makevisible(['password']);

        $hashedPassword = $shareholder->password;

        if(!Hash::check($fields['password'], $hashedPassword)) {
            return response([
                'password' => 'Password not matched'
            ], 400);
        }

        $password = Hash::make($fields['new_password']);

        return $shareholder->update(
            [
                "password" => $password
            ]
        );
    }


    /**
     * Update shareholder email address
     *
     * @param  int  $id
     * @return bool or \Illuminate\Http\Response
     */
    public function changeEmailAddress(Request $request, $id)
    {
        $fields = $request->validate([
            "email" => "required|email",
        ]);

        $shareholder = Shareholder::find($id)->first();

        return $shareholder->update($fields);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return bool
     */
    public function destroy($id)
    {
        return Shareholder::find($id)->first()->delete();
    }
}
