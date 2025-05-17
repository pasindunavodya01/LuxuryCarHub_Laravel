<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Car;
use Illuminate\Http\Request;
use App\Mail\ContactDealerMail;
use Illuminate\Support\Facades\Mail;

class DealerController extends Controller
{
    public function show($id)
    {
        $dealer = User::where('role', 'dealer')->find($id);

        if (!$dealer) {
            abort(404, 'Dealer not found');
        }

        $inventory = Car::where('dealer_id', $dealer->id)->get();

        return view('dealers.show', [
            'dealer' => $dealer,
            'inventory' => $inventory
        ]);
    }

    public function contact(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'message' => 'required|string|min:10',
    ]);

    try {
        $dealer = \App\Models\User::find($id);
        
        if (!$dealer) {
            return back()->with('error', 'Dealer not found.');
        }

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ];        try {
            \Mail::to($dealer->email)->send(new \App\Mail\ContactDealerMail($details));
            \Log::info('Email sent successfully to: ' . $dealer->email);
            return back()->with('success', 'Your message has been sent to the dealer!');
        } catch (\Exception $mailException) {
            \Log::error('Mail Error: ' . $mailException->getMessage());
            throw $mailException;
        }
    } catch (\Exception $e) {
        \Log::error('Email sending failed: ' . $e->getMessage());
        return back()->with('error', 'Sorry, there was a problem sending your message. Please try again later.');
    }
}



public function contactDealer(Request $request)
{
    $details = $request->only(['name', 'email', 'phone', 'message']);

    Mail::to('dealer@example.com')->send(new ContactDealerMail($details));

    return back()->with('success', 'Message sent to the dealer!');
}


}


