<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Preference;
use App\Models\Questionary;
use App\Models\User;
use Auth;
use Exception;
use Illuminate\Http\Request;
use Log;
use Validator;
use Illuminate\Support\Facades\DB;


class QuestionariesController extends Controller
{
    public function questionaries(Request $request)
    {
        if ($request->isMethod('GET')) {
            $userId = $request->input('user_id');
            $questionary = Questionary::where('user_id', Auth::user()->id)->first();
            return view('pages.questionaries', [
                'data' => $questionary
            ]);
        } else {
            $questionary = Questionary::where('user_id', Auth::user()->id)->first();
            DB::beginTransaction();
            try {
                // Validate the request
                $validate = Validator::make(
                    $request->all(),
                    [
                        'user_id' => 'required|exists:users,id',
                        'ncc_grade' => 'required_if:ncc_cert,1',
                        'min_score_mizo' => 'required',
                        'class_x_mizo' => 'required',
                        'mizo_as_mil' => 'required',
                        'comp_cert' => 'required',
                        'ncc_cert' => 'required',
                        'home_guard' => 'required',
                        'iti_eqi' => 'required',
                        'auto_mobile' => 'required',
                        'm_status' => 'required',
                        'm_question' => 'required_if:m_status,1',
                        'mech_experience' => 'required_if:auto_mobile,1'
                    ],
                );
                if ($validate->fails()) {
                    return response()->json([
                        'status' => 400,
                        'success' => true,
                        'message' => 'All fields are required',
                    ]);
                }

                $formData = $request->input('formData');
                if ($questionary) {
                    $update_data = Questionary::where('user_id', Auth::user()->id)
                        ->update([
                            'ncc_grade' => $request->ncc_grade,
                            'min_score_mizo' => $request->min_score_mizo,
                            'class_x_mizo' => $request->class_x_mizo,
                            'mizo_as_mil' => $request->mizo_as_mil,
                            'comp_cert' => $request->comp_cert,
                            'ncc_cert' => $request->ncc_cert,
                            'home_guard' => $request->home_guard,
                            'iti_eqi' => $request->iti_eqi,
                            'auto_mobile' => $request->auto_mobile,
                            'm_status' => $request->m_status,
                            'm_question' => $request->m_question,
                            'mech_experience' => $request->mech_experience
                        ]);

                } else {

                    $questionary = new Questionary();
                    $questionary->user_id = Auth::user()->id;
                    $questionary->ncc_grade = $request->input('ncc_grade');
                    $questionary->min_score_mizo = $request->min_score_mizo;
                    $questionary->class_x_mizo = $request->class_x_mizo;
                    $questionary->mizo_as_mil = $request->mizo_as_mil;
                    $questionary->comp_cert = $request->comp_cert;
                    $questionary->ncc_cert = $request->ncc_cert;
                    $questionary->home_guard = $request->home_guard;
                    $questionary->iti_eqi = $request->iti_eqi;
                    $questionary->auto_mobile = $request->auto_mobile;
                    $questionary->m_status = $request->m_status;
                    $questionary->m_question = $request->m_question;
                    $questionary->mech_experience = $request->mech_experience;
                    $save = $questionary->save();
                }
                if ($questionary) {
                    $user = Auth::user();
                    $user->stage = 1;
                    $user->save();
                }

                DB::commit();
                return response()->json([
                    'status' => 200,
                    'success' => true,
                    'message' => 'Data submitted successfully',
                    'data' => $questionary,
                ]);
            } catch (Exception $e) {
                dd($e->getMessage());
                DB::rollBack();
            }
        }
    }


    // public function preference(Request $request)
    // {
    //     if ($request->isMethod('GET')) {
    //         $preferences = Preference::where('user_id', Auth::user()->id)->get();
    //         $questionaries = Questionary::where('user_id', Auth::user()->id)->first();
    //         $check = Preference::select('post_id')->where('user_id', Auth::user()->id)->get();
    //         return view('pages.preference', compact('questionaries', 'preferences', 'check'));
    //     } else {
    //         $posts = $request->input('posts');
    //         $userId = Auth::user()->id;
    //         foreach ($posts as $index => $postId) {
    //             $preference = Preference::where('user_id', $userId)
    //                 ->where('post_id', $postId)
    //                 ->first();

    //             $count_pref = Preference::where('user_id', $userId)->count();
    //             if ($preference) {
    //                 $preference->update([
    //                     'preferences' => $index + 1,
    //                 ]);

    //             } else {
    //                 Preference::create([
    //                     'user_id' => $userId,
    //                     'post_id' => $postId,
    //                     'preferences' => $index + 1,
    //                 ]);
    //             }
    //         }

    //         $posts = [
    //             "AB (ARMED BRANCH)",
    //             "UB (UNARMED BRANCH)",
    //             "CONSTABLE"
    //         ];

    //         return response()->json([
    //             'success' => true,
    //             'posts' => $posts // Return the posts array as it was sent
    //         ]);
    //     }
    // }


    public function preference(Request $request)
    {
        if ($request->isMethod('GET')) {
            $questionaries = Questionary::where('user_id', Auth::user()->id)->first();
            $preferences = Preference::where('user_id', Auth::user()->id)->orderBy('preferences')->get();
            $check = Preference::where('user_id', Auth::user()->id)->first();
            $postStatuses = [
                'ab' => $preferences->where('post_id', 1)->count() > 0, // Check if AB post exists
                'ub' => $preferences->where('post_id', 2)->count() > 0, // Check if UB post exists
                'constable' => $preferences->where('post_id', 3)->count() > 0, // Check if Constable post exists
            ];
            // Extract an array of post_ids from preferences
            // $post_ids = $preferences->pluck('post_id')->toArray();

            // Get posts that are not in the selected post_ids
            // $posts = Post::whereNotIn('id', $post_ids)->get(['id', 'post']);
            return view('pages.preference', compact('preferences', 'postStatuses', 'check', 'questionaries'));
        } else {
            $postData = $request->all();
            $userId = Auth::user()->id;
            $postId = $postData['post_id'];
            $preference = $postData['preference'];

            $existingPreference = Preference::where('user_id', $userId)
                ->where('post_id', $postId)
                ->first();

            if ($existingPreference) {
                $existingPreference->update([
                    'preferences' => $preference
                ]);
            } else {
                $lastPreference = Preference::where('user_id', $userId)
                    ->max('preferences');

                $newPreferenceNumber = $lastPreference + 1;
                Preference::create([
                    'user_id' => $userId,
                    'post_id' => $postId,
                    'preferences' => $newPreferenceNumber
                ]);
            }
            $preferences = Preference::where('user_id', Auth::user()->id)->get();
            if ($preferences) {
                $user = Auth::user();
                $user->stage = 2;
                $user->save();
            }
            return response()->json([
                'success' => true,
                'preferences' => $preferences
            ]);
        }
    }

    public function preferenceUpdate($prefId, $type)
    {
        $student = User::where('id', Auth::id())->first();
        try {
            if ($type == 3) {
                if (!Preference::whereId($prefId)->where('user_id', $student->id)->delete()) {
                    DB::rollBack();
                    $errors['status'] = 'Error';
                    $errors['msg'] = 'Try Again. Fail to Delete';
                    return response()->json($errors, 403);
                }

                $p_data = Preference::where('user_id', $student->id)->orderBy('preferences', "ASC")->get();
                foreach ($p_data as $k => $p) {
                    $p->preferences = $k + 1;
                    if (!$p->save()) {
                        DB::rollBack();
                        $errors['status'] = 'Error';
                        $errors['msg'] = 'Try Again. Fail to Save';
                        return response()->json($errors, 403);
                    }
                }
            }

            if ($type == 2) {
                $p1 = Preference::where('user_id', $student->id)->where('id', $prefId)->first();
                $p2 = Preference::where('user_id', $student->id)->where('preferences', $p1->preferences + 1)->first();
                if (Preference::where('user_id', $student->id)->count() < $p1->preferences + 1) {
                    DB::rollBack();
                    $errors['status'] = 'Error';
                    $errors['msg'] = 'Try Again. Fail to Save';
                    return response()->json($errors, 403);
                } else {
                    $p1->preferences = $p1->preferences + 1;
                    if (!$p1->save()) {
                        DB::rollBack();
                        $errors['status'] = 'Error';
                        $errors['msg'] = 'Try Again. Fail to Save';
                        return response()->json($errors, 403);
                    }
                    $p2->preferences = $p2->preferences - 1;
                    if (!$p2->save()) {
                        DB::rollBack();
                        $errors['status'] = 'Error';
                        $errors['msg'] = 'Try Again. Fail to Save';
                        return response()->json($errors, 403);
                    }
                }
            }

            if ($type == 1) {
                $p1 = Preference::where('user_id', $student->id)->where('id', $prefId)->first();
                $p2 = Preference::where('user_id', $student->id)->where('preferences', $p1->preferences - 1)->first();

                if ($p1->preferences - 1 <= 0) {
                    dd($p1->preferences - 1);
                    return response()->json("error", 403);
                } else {
                    $p1->preferences = $p1->preferences - 1;
                    if (!$p1->save()) {
                        DB::rollBack();
                        $errors['status'] = 'Error';
                        $errors['msg'] = 'Try Again. Fail to Save';
                        return response()->json($errors, 403);
                    }
                    $p2->preferences = $p2->preferences + 1;
                    if (!$p2->save()) {
                        DB::rollBack();
                        $errors['status'] = 'Error';
                        $errors['msg'] = 'Try Again. Fail to Save';
                        return response()->json($errors, 403);
                    }
                }
            }

            DB::commit();
            $errors['status'] = 200;
            $errors['msg'] = "Successfully Updated";
            return response()->json($errors, 200);
        } catch (Exception $e) {
            DB::rollBack();
            $errors['status'] = 'error';
            //$e->getMessage();
            "Failed to save User Data";
            return response()->json($errors, 403);
        }
    }
}
