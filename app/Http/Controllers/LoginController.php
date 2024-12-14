<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('pages.notification-login');
        }

        $data = $request->validate([
            'rec_id' => 'nullable|string|exists:users,registration_number',
            'mobile_no' => 'nullable|digits:10|exists:users,phone',
            'dob' => 'required|date|exists:users,dob',
        ]);

        if (empty($data['rec_id']) && empty($data['mobile_no'])) {
            return response()->json([
                'status' => 'error',
                'message' => 'Please provide either a Recruitment ID or Mobile Number with Date of Birth.'
            ], 400);
        }

        if ($data['rec_id'] && $data['dob']) {
            $user = User::where('registration_number', $data['rec_id'])
                ->where('dob', $data['dob'])
                ->first();
        } elseif ($data['mobile_no'] && $data['dob']) {
            $user = User::where('phone', $data['mobile_no'])
                ->where('dob', $data['dob'])
                ->first();
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Please provide valid Recruitment ID or Mobile Number with Date of Birth.'
            ], 400);
        }

        if ($user) {
            Auth::login($user);
            if (($user->payment_status == 0 || $user->payment_status == 3) && $user->final_submit == 1) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Login successful!',
                    'redirect_url' => route('getPayment')
                ]);
            } elseif ($user->payment_status == 1 && $user->final_submit == 1) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Login successful!',
                    'redirect_url' => route('dashboard')
                ]);
            } elseif ($user->stage == 0) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Login successful!',
                    'redirect_url' => route('questionaries')
                ]);
            } elseif ($user->stage == 1) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Login successful!',
                    'redirect_url' => route('preference')
                ]);
            } elseif ($user->stage == 2) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Login successful!',
                    'redirect_url' => route('profile')
                ]);
            } elseif ($user->stage == 3) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Login successful!',
                    'redirect_url' => route('centrePreference')
                ]);
            } elseif ($user->stage == 4) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Login successful!',
                    'redirect_url' => route('document')
                ]);
            } elseif ($user->stage == 5) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Login successful!',
                    'redirect_url' => route('preview')
                ]);
            }
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Invalid credentials or details. Please check your information and try again.'
        ], 401);
    }

    public function logout(Request $request)
    {
        if (!Auth::guest()) {
            Auth::logout();
        }
        return redirect()->route('login')->with('success', 'You have Successfully logged out of the system.');
    }
}
