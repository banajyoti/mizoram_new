<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Document;
use App\Models\Preference;
use App\Models\Profile;
use App\Models\Questionary;
use App\Models\State;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile(Request $request)
    {
        if ($request->isMethod('GET')) {
            $userId = Auth::user()->id;
            $states = State::orderBy('name')->get();
            $districts = District::orderBy('name')->get();
            $registerDetails = User::leftJoin('castes', 'castes.id', '=', 'users.category_id')
                ->select('castes.name as c', 'users.*')
                ->where('users.id', Auth::user()->id)
                ->first();

            $userProfiles = Profile::leftJoin('states as st1', 'st1.id', '=', 'profiles.p_state_id')
                ->leftJoin('states as st2', 'st2.id', '=', 'profiles.c_state_id')
                ->leftJoin('districts as dist1', 'dist1.id', '=', 'profiles.p_district_id')
                ->leftJoin('districts as dist2', 'dist2.id', '=', 'profiles.c_district_id')
                ->select('profiles.*', 'st1.name as s1', 'st2.name as s2', 'dist1.name as d1', 'dist2.name as d2')
                ->where('user_id', $registerDetails->id)
                ->first();

            return view('pages.profile', compact('registerDetails', 'districts', 'states', 'userProfiles'));
        } else {
            // Custom validation rules
            $rules = [
                'religion' => 'required',
                'nationality' => 'required',
                'permanent_address.street1' => 'required|string|max:255',
                'permanent_address.street2' => 'nullable|string|max:255',
                'permanent_address.pincode' => 'required|numeric|digits:6',
                'permanent_address.state_id' => 'required',
                'correspondence_address.street1' => 'required|string|max:255',
                'correspondence_address.street2' => 'nullable|string|max:255',
                'correspondence_address.pincode' => 'required|numeric|digits:6',
                'correspondence_address.state_id' => 'required',
                'education.board_school' => 'required|string|max:255',
                'education.school_name' => 'nullable|string|max:255',
                'education.roll_no' => 'required|string|max:50',
                'education.yop' => 'required|integer|digits:4',
                'education.percentage' => 'required|numeric|between:0,100',
            ];

            // Add district requirements if state_id is 17
            if ($request->input('permanent_address.state_id') == 17) {
                $rules['permanent_address.district'] = 'required';
            } else {
                $rules['permanent_address.district_text'] = 'required';
            }

            if ($request->input('correspondence_address.state_id') == 17) {
                $rules['correspondence_address.district'] = 'required';
            } else {
                $rules['correspondence_address.district_text'] = 'required';
            }

            // Custom validation messages
            $messages = [
                'religion.required' => 'Religion is required.',
                'nationality.required' => 'Nationality is required.',
                'permanent_address.street1.required' => 'Permanent address (Street 1) is required.',
                'permanent_address.pincode.required' => 'Permanent address pincode is required.',
                'permanent_address.pincode.numeric' => 'Permanent address pincode must be a numeric value.',
                'permanent_address.pincode.digits' => 'Permanent address pincode must be exactly 6 digits.',
                'permanent_address.state_id.required' => 'Permanent address state is required.',
                'correspondence_address.street1.required' => 'Correspondence address (Street 1) is required.',
                'correspondence_address.pincode.required' => 'Correspondence address pincode is required.',
                'correspondence_address.pincode.numeric' => 'Correspondence address pincode must be a numeric value.',
                'correspondence_address.pincode.digits' => 'Correspondence address pincode must be exactly 6 digits.',
                'correspondence_address.state_id.required' => 'Correspondence address state is required.',
                'education.board_school.required' => 'Board/School is required.',
                'education.school_name.required' => 'School name is required.',
                'education.roll_no.required' => 'Roll number is required.',
                'education.yop.required' => 'Year of passing is required.',
                'education.percentage.required' => 'Percentage is required.',
                'education.percentage.numeric' => 'Percentage must be a numeric value.',
                'education.percentage.between' => 'Percentage must be between 0 and 100.',
                'permanent_address.district.required' => 'Permanent address district is required.',
                'permanent_address.district_text.required' => 'Permanent address district name is required if not selected.',
                'correspondence_address.district.required' => 'Correspondence address district is required.',
                'correspondence_address.district_text.required' => 'Correspondence address district name is required if not selected.',
            ];

            // Validate request data with custom messages
            $validatedData = $request->validate($rules, $messages);

            // Get data from the request
            $p_state_id = $request->input('permanent_address.state_id');
            $c_state_id = $request->input('correspondence_address.state_id');
            $p_district_id = $request->input('permanent_address.district');
            $p_other_district = $request->input('permanent_address.district_text');
            $c_district_id = $request->input('correspondence_address.district');
            $c_other_district = $request->input('correspondence_address.district_text');

            // Prepare data for update
            $data = [
                'alt_mobile' => $request->input('alt_mobile'),
                'religion' => $request->input('religion'),
                'nationality' => $request->input('nationality'),
                'adhar_no' => $request->input('adhar_no'),
                'p_address1' => $request->input('permanent_address.street1'),
                'p_address2' => $request->input('permanent_address.street2'),
                'p_pin' => $request->input('permanent_address.pincode'),
                'p_state_id' => $p_state_id,
                'p_district_id' => $p_district_id,
                'p_other_district' => $p_other_district,
                'p_police_id' => $request->input('permanent_address.police_station'),
                'p_post_office' => $request->input('permanent_address.post_office'),
                'c_address1' => $request->input('correspondence_address.street1'),
                'c_address2' => $request->input('correspondence_address.street2'),
                'c_pin' => $request->input('correspondence_address.pincode'),
                'c_state_id' => $c_state_id,
                'c_district_id' => $c_district_id,
                'c_other_district' => $c_other_district,
                'c_police_id' => $request->input('correspondence_address.police_station'),
                'c_post_office' => $request->input('correspondence_address.post_office'),
                'board_id' => $request->input('education.board_school'),
                'school_name' => $request->input('education.school_name'),
                'roll_no' => $request->input('education.roll_no'),
                'year_of_passing' => $request->input('education.yop'),
                'percentage' => $request->input('education.percentage'),
            ];

            // Handle state and district logic
            if ($p_state_id != 17) {
                $data['p_district_id'] = null;
            } else {
                $data['p_other_district'] = null;
            }

            if ($c_state_id != 17) {
                $data['c_district_id'] = null;
            } else {
                $data['c_other_district'] = null;
            }

            // Update or create the profile
            $userProfile = Profile::updateOrCreate(
                ['user_id' => Auth::user()->id],
                $data
            );

            if ($userProfile) {
                $user = Auth::user();
                $user->stage = 3;
                $user->save();
            }

            // Return a response (JSON in case of AJAX submission)
            return response()->json([
                'success' => true,
                'message' => 'Profile updated successfully'
            ]);
        }
    }


    public function document_old(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('pages.document');
        } else {

            $reg_id = User::select('id')->where(['id' => Auth::user()->id])->first();
            // $final_submit = User::where(['final_submit' => 0])->where(['id' => Auth::user()->id])->first();

            // if ($final_submit) {
            if ($request->hasFile('photo')) {
                $fileName1 = $reg_id->id . "_" . time() . "." . $request->photo->getClientOriginalExtension();
                $request->photo->storeAs('/public/uploads/upload_photo', $fileName1);
            } else {
                return response()->json([
                    'errors' => ['photo' => 'Please Upload Your Photo.']
                ], 422);  // Unprocessable Entity
            }

            if ($request->hasFile('signature')) {
                $fileName2 = $reg_id->id . "_" . time() . "." . $request->signature->getClientOriginalExtension();
                $request->signature->storeAs('/public/uploads/upload_signature', $fileName2);
            } else {
                return response()->json([
                    'errors' => ['signature' => 'Please Upload Your signature.']
                ], 422);  // Unprocessable Entity
            }

            if ($request->hasFile('age_prof_cert')) {
                $fileName3 = $reg_id->id . "_" . time() . "." . $request->age_prof_cert->getClientOriginalExtension();
                $request->age_prof_cert->storeAs('/public/uploads/age_prof_cert', $fileName3);
            } else {
                return response()->json([
                    'errors' => ['age_prof_cert' => 'Please Upload Your Age Prof Certificate.']
                ], 422);  // Unprocessable Entity
            }

            if ($request->hasFile('class_x_cert')) {
                $fileName4 = $reg_id->id . "_" . time() . "." . $request->class_x_cert->getClientOriginalExtension();
                $request->class_x_cert->storeAs('/public/uploads/class_x_cert', $fileName4);
            } else {
                return response()->json([
                    'errors' => ['class_x_cert' => 'Please Upload Your Class X Certificate.']
                ], 422);  // Unprocessable Entity
            }

            if ($request->hasFile('mizu_lang_cert')) {
                $fileName5 = $reg_id->id . "_" . time() . "." . $request->mizu_lang_cert->getClientOriginalExtension();
                $request->mizu_lang_cert->storeAs('/public/uploads/mizu_lang_cert', $fileName5);
            } else {
                return response()->json([
                    'errors' => ['mizu_lang_cert' => 'Please Upload Your Mizu Language Certificate.']
                ], 422);  // Unprocessable Entity
            }


            if ($request->hasFile('homeguard_cert')) {
                $fileName6 = $reg_id->id . "_" . time() . "." . $request->homeguard_cert->getClientOriginalExtension();
                $request->homeguard_cert->storeAs('/public/uploads/homeguard_cert', $fileName6);
            } else {
                return response()->json([
                    'errors' => ['homeguard_cert' => 'Please Upload Your Homeguard Certificate.']
                ], 422);  // Unprocessable Entity
            }


            if ($request->hasFile('caste_cert')) {
                $fileName7 = $reg_id->id . "_" . time() . "." . $request->caste_cert->getClientOriginalExtension();
                $request->caste_cert->storeAs('/public/uploads/caste_cert', $fileName7);
            } else {
                return response()->json([
                    'errors' => ['caste_cert' => 'Please Upload Your Caste Certificate.']
                ], 422);  // Unprocessable Entity
            }


            if ($request->hasFile('ncc_cert')) {
                $fileName8 = $reg_id->id . "_" . time() . "." . $request->ncc_cert->getClientOriginalExtension();
                $request->ncc_cert->storeAs('/public/uploads/ncc_cert', $fileName8);
            } else {
                return response()->json([
                    'errors' => ['ncc_cert' => 'Please Upload Your NCC Certificate.']
                ], 422);  // Unprocessable Entity
            }

            if ($request->hasFile('comp_cert')) {
                $fileName9 = $reg_id->id . "_" . time() . "." . $request->comp_cert->getClientOriginalExtension();
                $request->comp_cert->storeAs('/public/uploads/comp_cert', $fileName9);
            } else {
                return response()->json([
                    'errors' => ['comp_cert' => 'Please Upload Your Computer Certificate.']
                ], 422);  // Unprocessable Entity
            }

            if ($request->hasFile('mechanic_ex_cert')) {
                $fileName10 = $reg_id->id . "_" . time() . "." . $request->mechanic_ex_cert->getClientOriginalExtension();
                $request->mechanic_ex_cert->storeAs('/public/uploads/mechanic_ex_cert', $fileName10);
            } else {
                return response()->json([
                    'errors' => ['mechanic_ex_cert' => 'Please Upload Your Mechanic Ex Certificate.']
                ], 422);  // Unprocessable Entity
            }

            $data = [
                'user_id' => Auth::user()->id,
                'photo' => $fileName1,
                'signature' => $fileName2,
                'age_prof_cert' => $fileName3,
                'class_x_cert' => $fileName4,
                'mizu_lang_cert' => $fileName5,
                'homeguard_cert' => $fileName6,
                'caste_cert' => $fileName7,
                'ncc_cert' => $fileName8,
                'comp_cert' => $fileName9,
                'mechanic_ex_cert' => $fileName10

            ];


            Document::updateOrCreate(
                ['user_id' => Auth::user()->id],
                $data
            );

            // Respond with a success message
            return response()->json([
                'message' => 'Documents uploaded successfully.'
            ]);


            // } else {
            //     return redirect()->route('document')->with(['error' => 'You Have Already Fill up Your Form.']);
            // }
        }
    }
    public function document(Request $request)
    {
        if ($request->isMethod('GET')) {
            $userDetails = User::where('id', Auth::user()->id)->first();
            $questionaries = Questionary::where('user_id', $userDetails->id)->first();
            $documents = Document::where('user_id', $userDetails->id)->first();
            return view('pages.document', compact('userDetails', 'questionaries', 'documents'));
        } else {
            $reg_id = Auth::user();
            $uploadedFiles = [];

            $fields = [
                'photo' => 'uploads/upload_photo',
                'signature' => 'uploads/upload_signature',
                'age_prof_cert' => 'uploads/age_prof_cert',
                'class_x_cert' => 'uploads/class_x_cert',
                'mizu_lang_cert' => 'uploads/mizu_lang_cert',
                'mizu_class_x' => 'uploads/mizu_class_x',
                'mizu_class_x_outside' => 'uploads/mizu_class_x_outside',
                'homeguard_cert' => 'uploads/homeguard_cert',
                'caste_cert' => 'uploads/caste_cert',
                'ncc_cert' => 'uploads/ncc_cert',
                'comp_cert' => 'uploads/comp_cert',
                'mechanic_ex_cert' => 'uploads/mechanic_ex_cert',
                'iti_ex_cert' => 'uploads/iti_ex_cert',
                'ex_service' => 'uploads/ex_service',
                'sports_cert' => 'uploads/sports_cert',
            ];

            $userDetails = User::where('id', $reg_id->id)->first();
            $existingDocument = Document::where('user_id', $reg_id->id)->first();
            $questionaries = Questionary::where('user_id', $reg_id->id)->first();

            foreach ($fields as $field => $path) {
                if (
                    ($reg_id->category_id == 1 && $field == 'caste_cert') ||
                    ($field == 'ncc_cert' && $questionaries->ncc_cert == 0) ||
                    ($field == 'homeguard_cert' && $questionaries->home_guard == 0) ||
                    ($field == 'mechanic_ex_cert' && $questionaries->auto_mobile == 0) ||
                    ($field == 'iti_ex_cert' && $questionaries->iti_eqi == 0) ||
                    ($field == 'mizu_lang_cert' && $questionaries->min_score_mizo == 0) ||
                    ($field == 'mizu_class_x' && $questionaries->class_x_mizo == 0) ||
                    ($field == 'mizu_class_x_outside' && $questionaries->mizo_as_mil == 0) ||
                    ($field == 'ex_service' && $userDetails->ex_ser == 0) ||
                    ($field == 'sports_cert' && $userDetails->m_sport == 0)
                ) {
                    $uploadedFiles[$field] = $existingDocument && !is_null($existingDocument->$field) ? $existingDocument->$field : null;
                } else {
                    if ($request->hasFile($field)) {
                        $fileName = $reg_id->id . "_" . time() . "." . $request->$field->getClientOriginalExtension();
                        $request->$field->storeAs('public/' . $path, $fileName);
                        $uploadedFiles[$field] = $fileName;
                    } else {
                        if ($existingDocument && !is_null($existingDocument->$field)) {
                            $uploadedFiles[$field] = $existingDocument->$field;
                        } else {
                            return response()->json([
                                'errors' => [$field => 'Please Upload Your ' . ucfirst(str_replace('_', ' ', $field)) . '.']
                            ], 422);
                        }
                    }
                }
            }
            // Prepare the data for insert/update
            $data = [
                'user_id' => $reg_id->id,
                'photo' => $uploadedFiles['photo'],
                'signature' => $uploadedFiles['signature'],
                'age_prof_cert' => $uploadedFiles['age_prof_cert'],
                'class_x_cert' => $uploadedFiles['class_x_cert'],
                'mizu_lang_cert' => $uploadedFiles['mizu_lang_cert'], // This will be skipped if min_score_mizo == 0
                'mizu_class_x' => $uploadedFiles['mizu_class_x'], // This will be skipped if class_x_mizo == 0
                'mizu_class_x_outside' => $uploadedFiles['mizu_class_x_outside'], // This will be skipped if mizo_as_mil == 0
                'homeguard_cert' => $uploadedFiles['homeguard_cert'], // This will be skipped if home_guard == 0
                'caste_cert' => $uploadedFiles['caste_cert'], // This will be skipped if category_id == 1
                'ncc_cert' => $uploadedFiles['ncc_cert'], // This will be skipped if ncc_cert == 0
                'ex_service' => $uploadedFiles['ex_service'], // This will be skipped if ex_ser == 0
                'comp_cert' => $uploadedFiles['comp_cert'],
                'mechanic_ex_cert' => $uploadedFiles['mechanic_ex_cert'],
                'iti_ex_cert' => $uploadedFiles['iti_ex_cert'],
                'sports_cert' => $uploadedFiles['sports_cert'], // This will be skipped if m_sport == 0
            ];

            // Update or Create the Document record
            $doc = Document::updateOrCreate(
                ['user_id' => $reg_id->id],
                $data
            );

            if ($doc) {
                $user = Auth::user();
                $user->stage = 4;
                $user->save();
            }
            return response()->json([
                'message' => 'Documents uploaded successfully.'
            ]);
        }
    }

    public function preview(Request $request)
    {
        if ($request->isMethod('GET')) {
            $userDetails = User::leftJoin('questionaries', 'questionaries.user_id', '=', 'users.id')
                ->leftJoin('preferences', 'preferences.user_id', '=', 'users.id')
                ->leftJoin('profiles', 'profiles.user_id', '=', 'users.id')
                ->leftJoin('documents', 'documents.user_id', '=', 'users.id')
                ->leftJoin('castes', 'castes.id', '=', 'users.category_id')
                ->leftJoin('states as s1', 's1.id', '=', 'profiles.p_state_id')
                ->leftJoin('states as s2', 's2.id', '=', 'profiles.c_state_id')
                ->leftJoin('districts as d1', 'd1.id', '=', 'profiles.p_district_id')
                ->leftJoin('districts as d2', 'd2.id', '=', 'profiles.c_district_id')
                ->select(
                    'users.*',
                    'questionaries.*',
                    'questionaries.comp_cert as comp',
                    'questionaries.ncc_cert as ncc',
                    'questionaries.min_score_mizo as ms',
                    'questionaries.class_x_mizo as mx',
                    'questionaries.mizo_as_mil as mm',
                    'preferences.*',
                    'profiles.*',
                    'documents.*',
                    'castes.name as c',
                    's1.name as pState',
                    's2.name as cState',
                    'd1.name as pDist',
                    'd2.name as cDist'
                )
                ->where('users.id', Auth::user()->id)
                ->first();

            $preferences = Preference::leftJoin('posts', 'posts.id', '=', 'preferences.post_id')
                ->select('preferences', 'posts.*')
                ->where('preferences.user_id', Auth::user()->id)
                ->where('preferences.user_id', Auth::user()->id)
                ->get();

            return view('pages.preview', compact('userDetails', 'preferences'));
        } else {

            $user = Auth::user();
            $user->final_submit = 1;
            $user->stage = 5;
            $user->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Application successfully submitted.',
            ]);
        }
    }
}
