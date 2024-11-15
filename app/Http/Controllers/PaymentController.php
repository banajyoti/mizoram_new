<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function getPayment(Request $request)
    {
        if ($request->isMethod('GET')) {
            $userDetails = User::where('id', Auth::user()->id)->first();
            return view('pages.payment', compact('userDetails'));
        }
    }
}
