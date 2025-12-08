<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function send(ContactRequest $req)
    {
        $data = $req->validated();

        Log::info('Mail küldés indul');

        try {
            Mail::to(config('mail.to_address'))
                ->send(new ContactFormMail($data));

            return response()->json(['ok' => true]);
        } catch (\Throwable $e) {
            Log::error('Mail error: '.$e->getMessage());
            return response()->json(['error' => 'Nem sikerült elküldeni'], 500);
        }
    }

}