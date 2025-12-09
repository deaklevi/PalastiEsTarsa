<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\OfferRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Mail\ContactConfirmMail;
use App\Mail\OfferConfirmMail;
use App\Mail\OfferRequestMail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function send(ContactRequest $req)
    {
        $data = $req->validated();

        Log::info('Mail küldés indul');

        try {
            // Te kapod a levelet
            Mail::to(config('mail.to_address'))->send(new ContactFormMail($data));

            // Visszaigazolás a feladónak
            Mail::to($data['email'])->send(new ContactConfirmMail($data));

            return response()->json(['ok' => true]);
        } catch (\Throwable $e) {
            Log::error('Mail error: '.$e->getMessage());
            return response()->json(['error' => 'Nem sikerült elküldeni'], 500);
        }
    }

    // --- új ajánlatkérés ---
    public function sendOffer(OfferRequest $req)
    {
        $data = $req->validated();
        Log::info('Ajánlatkérés mail küldés indul');

        try {
            Mail::to(config('mail.to_address'))->queue(new OfferRequestMail($data));
            Mail::to($data['email'])->queue(new OfferConfirmMail($data));

            return response()->json(['ok' => true]);
        } catch (\Throwable $e) {
            Log::error('Mail error: '.$e->getMessage());
            return response()->json(['error' => 'Nem sikerült elküldeni'], 500);
        }
    }
}
