<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Token;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:clients',
            'password' => 'required|confirmed',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 0, 'msg' => $validator->errors()->first(), 'data' => $validator->errors()]);
        }
        $random = Str::random(40);
        $client = Client::create($request->all());
        $client->api_token = $random;
        $client->save();

        return response()->json([
            'status' => 1,
            'msg' => 'register successfully',
            'data' => [
                'api_token' => $client->api_token,
                'client' => $client
            ]
        ]);
    }
    public function login(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 0, 'msg' => $validator->errors()->first(), 'data' => $validator->errors()]);
        }
        $client = Client::where('email', $request->email)->first();
        if (!$client) {
            return response()->json(['status' => 0, 'msg' => 'email not found']);
        }
        if (Hash::check($request->password, $client->password)) {
            return response()->json([
                'status' => 1,
                'msg' => 'login successfully',
                'data' => [
                    'api_token' => $client->api_token,
                    'client' => $client
                ],
            ]);
        } else {
            return response()->json(['status' => 0, 'msg' => 'password not match']);
        }
    }
    public function logout(Request $request)
    {
        $client = auth()->user();
        if($client->tokens()){
        $client->tokens()->delete();
        $client->save();
        return response()->json([
            'status' => 1,
            'msg' => 'logout successfully',
        ]);
    }
    }
    public function registerToken(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'token' => 'required',
            'platform' => 'required|in:android,ios'
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 0, 'msg' => $validator->errors()->first(), 'data' => $validator->errors()]);
        }
        Token::where('token', $request->token)->delete();
        $tokens = $request->user()->tokens()->create($request->all());

        return response()->json(['status' => 1, 'msg' => 'register token successfully', 'data' => $tokens]);
    }
}
