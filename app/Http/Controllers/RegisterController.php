<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\GameCategory;
use Illuminate\Http\Request;
use App\Models\User; // Adjust the model based on your application
use Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.index');
    }

    public function register(Request $request)
    {
        if ($request->isMethod('GET')) {
            $games = Game::orderBy('name')->get();
            $gameCategoires = GameCategory::get();
            return view('pages.register', compact('games', 'gameCategoires'));
        } else {
            // Validate the incoming request data
            $validator = Validator::make($request->all(), [
                'salutation' => 'required|string|max:10',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'father_name' => 'required|string|max:255',
                'mother_name' => 'required|string|max:255',
                'high_qual' => 'required|string|max:10',
                'gender_id' => 'required|max:10',
                'category_id' => 'required|max:10',
                'dob' => 'required|date',
                'age' => 'required',
                'email' => 'required|email|max:255|unique:users,email', // Ensure the email is unique
                'phone' => 'required|string|max:15|unique:users,phone',
                'ex_ser' => 'required',
                // 'X_inMizo' => 'required',
                'permanent_residence' => 'required|in:0,1',
                'otp' => 'required|numeric|digits:4',
                'total_ex' => 'required_if:ex_ser,1',
                // 'm_sport' => 'required',
                'g_id' => 'required_if:m_sport,1',
                'c_ms_id' => 'required_if:m_sport,1',
            ], [
                'salutation.required' => 'Salutation is required.',
                'salutation.string' => 'Salutation must be a valid string.',
                'salutation.max' => 'Salutation cannot exceed 10 characters.',

                'first_name.required' => 'First name is required.',
                'first_name.string' => 'First name must be a valid string.',
                'first_name.max' => 'First name cannot exceed 255 characters.',

                'last_name.required' => 'Last name is required.',
                'last_name.string' => 'Last name must be a valid string.',
                'last_name.max' => 'Last name cannot exceed 255 characters.',

                'father_name.required' => 'Father\'s name is required.',
                'father_name.string' => 'Father\'s name must be a valid string.',
                'father_name.max' => 'Father\'s name cannot exceed 255 characters.',

                'mother_name.required' => 'Mother\'s name is required.',
                'mother_name.string' => 'Mother\'s name must be a valid string.',
                'mother_name.max' => 'Mother\'s name cannot exceed 255 characters.',

                'high_qual.required' => 'Highest qualification is required.',
                'high_qual.string' => 'Highest qualification must be a valid string.',
                'high_qual.max' => 'Highest qualification cannot exceed 10 characters.',

                'gender_id.required' => 'Gender is required.',
                'gender_id.max' => 'Gender ID cannot exceed 10 characters.',

                'category_id.required' => 'Category is required.',
                'category_id.max' => 'Category ID cannot exceed 10 characters.',

                'dob.required' => 'Date of birth is required.',
                'dob.date' => 'Please provide a valid date of birth.',

                'age.required' => 'Age is required.',

                'email.required' => 'Email address is required.',
                'email.email' => 'Please provide a valid email address.',
                'email.max' => 'Email cannot exceed 255 characters.',
                'email.unique' => 'This email address is already registered.',

                'phone.required' => 'Phone number is required.',
                'phone.string' => 'Phone number must be a valid string.',
                'phone.max' => 'Phone number cannot exceed 15 characters.',
                'phone.unique' => 'This phone number is already registered.',

                'ex_ser.required' => 'Please select your service experience.',
                'X_inMizo.required' => 'The Mizo language field is required.',

                'permanent_residence.required' => 'Please select if you are a permanent resident of Mizoram.',
                'permanent_residence.in' => 'Invalid value for permanent residency.',

                'total_ex.required' => 'Please enter your total experience.',
                'g_id.required' => 'Please select a game.',
                'c_ms_id.required' => 'Please select a game category.'

            ]);

            $otp = $request->input('otp');
            $storedOtp = Session::get('otp');

            // Verify OTP from session before proceeding with registration
            if ($otp != $storedOtp) {
                return response()->json(['status' => 'error', 'errors' => ['otp' => ['Invalid OTP. Please try again.']]], 422);
            }

            $uniqueFormId = $this->generateUniqueFormId();

            // Check if validation fails
            if ($validator->fails()) {
                return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
            }

            if ($request->ex_ser == '1') {
                if ($request->category_id == '1') {
                    $minAge = "1996-11-09";
                    $maxAge = "2006-11-09";
                } elseif ($request->category_id == '3' || $request->category_id == '4') {
                    $minAge = "1991-11-09";
                    $maxAge = "2006-11-09";

                } elseif ($request->category_id == '2') {
                    $minAge = "1993-11-09";
                    $maxAge = "2006-11-09";
                }

                if (isset($request->total_ex) && is_numeric($request->total_ex)) {
                    $minAge = date('Y-m-d', strtotime($minAge . ' -' . $request->total_ex . ' years'));
                }
            } else if ($request->m_sport == '1') {
                if ($request->category_id == '1') {
                    $minAge = "1996-11-09";
                    $maxAge = "2006-11-09";

                    $minAge = date('Y-m-d', strtotime($minAge . ' -5 years'));
                    if ($request->dob < $minAge || $request->dob > $maxAge) {
                        return response()->json(['status' => 'error', 'errors' => ['dob' => ['Age must be between 18-33 years']]], 422);
                    }
                } elseif ($request->category_id == '3' || $request->category_id == '4') {
                    $minAge = "1991-11-09";
                    $maxAge = "2006-11-09";

                    $minAge = date('Y-m-d', strtotime($minAge . ' -10 years'));
                    if ($request->dob < $minAge || $request->dob > $maxAge) {
                        return response()->json(['status' => 'error', 'errors' => ['dob' => ['Age must be between 18-43 years']]], 422);
                    }
                } elseif ($request->category_id == '2') {
                    $minAge = "1993-11-09";
                    $maxAge = "2006-11-09";

                    $minAge = date('Y-m-d', strtotime($minAge . ' -5 years'));
                    if ($request->dob < $minAge || $request->dob > $maxAge) {
                        return response()->json(['status' => 'error', 'errors' => ['dob' => ['Age must be between 18-36 years']]], 422);
                    }
                }
            } else {
                if ($request->category_id == '1') {
                    if ($request->dob < "1996-11-09" || $request->dob > "2006-11-09") {
                        return response()->json(['status' => 'error', 'errors' => ['dob' => ['Age must be between 18-28 years']]], 422);
                    }
                } elseif ($request->category_id == '3' || $request->category_id == '4') {
                    if ($request->dob < "1991-11-09" || $request->dob > "2006-11-09") {
                        return response()->json(['status' => 'error', 'errors' => ['dob' => ['Age must be between 18-33 years']]], 422);
                    }
                } elseif ($request->category_id == '2') {
                    if ($request->dob < "1993-11-09" || $request->dob > "2006-11-09") {
                        return response()->json(['status' => 'error', 'errors' => ['dob' => ['Age must be between 18-31 years']]], 422);
                    }
                }
            }

            $full_name = $request->first_name . ' ' . $request->middle_name . ' ' . $request->last_name;
            $user = User::create([
                'registration_number' => $uniqueFormId,
                'salutation' => $request->salutation,
                'full_name' => $full_name,
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'high_qual' => $request->high_qual,
                'gender_id' => $request->gender_id,
                'category_id' => $request->category_id,
                'dob' => $request->dob,
                'age' => $request->age,
                'email' => $request->email,
                'phone' => $request->phone,
                'ex_ser' => $request->ex_ser,
                // 'X_inMizo' => $request->X_inMizo,
                'permanent_residence' => $request->permanent_residence,
                'total_ex' => $request->total_ex,
                'm_sport' => $request->m_sport,
                'g_id' => $request->g_id,
                'c_ms_id' => $request->c_ms_id
                // Add more fields as necessary
            ]);

            // Return a success response
            if ($user->save()) {
                return response()->json([
                    'success' => true,
                    'registration_number' => $user->registration_number,
                    'message' => 'Registration successful!'
                ]);
            }
            // Return an error response if save fails
            return response()->json([
                'success' => false,
                'message' => 'Registration failed. Please try again.'
            ], 500);
        }
    }
    public function sendOtp(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|regex:/^[0-9]{10}$/',
        ]);

        $phone = $request->input('phone');
        $otp = rand(1000, 9999);
        $this->sendSms($phone, $otp);

        // Store OTP in session for verification later
        Session::put('otp', $otp);
        Session::put('phone', $phone);
        Session::put('otp_sent_at', now());  // Store the time when OTP was sent

        return response()->json([
            'success' => true,
            'message' => 'OTP sent to your phone.',
            'otp_sent_at' => now(),
            'otp_expiration_time' => 2 // expiration time in minutes
        ]);
    }

    public function resendOtp(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|regex:/^[0-9]{10}$/',
        ]);

        $phone = $request->input('phone');
        $otp = rand(1000, 9999);
        $this->sendSms($phone, $otp);

        // Store OTP in session for verification later
        Session::put('otp', $otp);
        Session::put('phone', $phone);
        Session::put('otp_sent_at', now());  // Store the time when OTP was sent

        return response()->json(['success' => true, 'message' => 'OTP sent successfully!']);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:4',
        ]);

        $otp = $request->input('otp');

        // Retrieve OTP from session
        $storedOtp = Session::get('otp');
        $phone = Session::get('phone');
        $otpSentAt = Session::get('otp_sent_at');

        // if (!$storedOtp || !$phone || !$otpSentAt) {
        //     return response()->json(['success' => false, 'message' => 'OTP session has expired. Please request a new OTP.']);
        // }

        // // Check if OTP has expired (e.g., 5 minutes)
        // if (now()->diffInMinutes($otpSentAt) > 2) {
        //     return response()->json(['success' => false, 'message' => 'OTP has expired. Please request a new OTP.']);
        // }

        if ($otp == $storedOtp) {
            // Here you might want to proceed with the registration or other logic
            return response()->json(['success' => true, 'message' => 'OTP verified successfully!']);
        }

        return response()->json(['success' => false, 'message' => 'Invalid OTP. Please try again.']);
    }

    protected function sendSms($mobile, $otp)
    {
        $message = $otp . " is your OTP to continue.

Rgds,
SCERT ASSAM
Tech Provider
Cognitive Tech";
        $message = urlencode($message);
        $url = 'https://m.xsms.in/api/sendhttp.php?authkey=330245AEQsKPqSZdB5eccbd74&mobiles=' . $mobile . '&sender=SCERTP&route=4&country=91&DLT_TE_ID=1207168111786016349&message=' . $message . '';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        if ($result == true) {
            curl_close($ch);
            return 1;
        } else {
            curl_close($ch);
            return 0;
        }
    }

    public static function generateUniqueFormId()
    {
        $date = date('Y');
        $lasRequestFormNo = User::orderBy('id', 'desc')->first();
        if ($lasRequestFormNo != null) {
            $lastRequestNo = $lasRequestFormNo->registration_number;
            $ltstRequestNo = (int) substr($lastRequestNo, -5) + 1;

            $value = 'MIZOPOL' . $date . '' . str_pad($ltstRequestNo, 5, 0, STR_PAD_LEFT);
            if ($value == "MIZOPOL2024") {
                $ltstRequestNo = (int) substr($ltstRequestNo, -5) + 1;
                $value = 'MIZOPOL' . $date . '' . str_pad($ltstRequestNo, 5, 0, STR_PAD_LEFT);
            }
        } else {
            $value = 'MIZOPOL' . $date . '00001';
        }
        return $value;
    }
}
