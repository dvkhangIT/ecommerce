<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\MailHelper;
use App\Http\Controllers\Controller;
use App\Mail\SubcriptionVerification;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class NewsletterController extends Controller
{
    public function newsLetterRequest(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);
        $existSubcriber = NewsletterSubscriber::where('email', $request->email)->first();
        if (!empty($existSubcriber) && count($existSubcriber) > 0) {
            if ($existSubcriber->is_verified == 0) {
                // send variafication link here
            } elseif ($existSubcriber == 1) {
                return response(['status' => 'error', 'message' => 'You already subcribed with this email!']);
            }
        } else {
            $subcriber = new NewsletterSubscriber();
            $subcriber->email = $request->email;
            $subcriber->verified_token = Str::random(25);
            $subcriber->is_verified = 0;
            $subcriber->save();
            // set mail config
            \Mail::purge('smtp');
            MailHelper::setMailConfig();
            // send mail
            Mail::to($subcriber->email)->send(new SubcriptionVerification($subcriber));
            return response(['status' => 'success', 'message' => 'A verification link has been sent to your email please check']);
        }
    }
    public function newsLetterEmailVerify($token)
    {
        dd($token);
    }
}
