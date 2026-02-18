<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\UserResource;

class AuthController extends Controller
{
    public function login(Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (Auth::attempt($credentials)) {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        
        $user->two_factor_code = rand(100000, 999999);
        $user->two_factor_expires_at = now()->addMinute();
        $user->save();

        Mail::raw("Kódod: {$user->two_factor_code}", function ($message) {
            $message->to('palasti.kft@gmail.com')->subject('2FA Kód');
        });

        // Ez a token CSAK a kód ellenőrzésére jogosít fel
        $token = $user->createToken('2fa-temp-token', ['finish-2fa'])->plainTextToken;

        return response()->json([
            'message' => 'Kód elküldve!',
            'token' => $token
        ]);
    }
    return response()->json(['message' => 'Hibás adatok'], 401);
}

public function verify2FA(Request $request) {
    $request->validate(['code' => 'required']);
    
    /** @var \App\Models\User $user */
    $user = $request->user();

    if ($user->two_factor_code === $request->code && now()->lt($user->two_factor_expires_at)) {
        // Töröljük a régi kódokat és az ideiglenes tokent
        $user->tokens()->delete(); 
        $user->resetTwoFactor();
        
        // Ez már a végleges token a teljes eléréshez
        $finalToken = $user->createToken('main-token')->plainTextToken;

        return (new UserResource($user))->additional([
            'token' => $finalToken
        ]);
    }

    return response()->json(['message' => 'Hibás vagy lejárt kód!'], 403);
}
}