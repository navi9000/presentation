<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use Illuminate\Support\Facades\Mail;
use App\Notifications\MailableContact;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    public function post(ContactFormRequest $request) {
        $validated = $request->validated();

        // Mail::to("icdi7434@gmail.com")->send(new MailableContact()->toMail());

        // Notification::route('mail', "icdi7434@gmail.com")->notify(new MailableContact($validated));

        return response()->json([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'comment' => $validated['comment']
        ]);
    }
}
