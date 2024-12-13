<?php

namespace App\Http\Controllers;

use App\Models\ExamCentre;
use App\Models\ExamPreference;
use App\Models\User;
use Auth;
use DB;
use Exception;
use Illuminate\Http\Request;
use Validator;

class ExamCentrePreference extends Controller
{
    public function centrePreference(Request $request)
    {
        if ($request->isMethod('GET')) {
            $preferenceCount = ExamPreference::where('user_id', Auth::user()->id)->count();
            $check = ExamPreference::where('user_id', Auth::user()->id)->first();
            $preferences = ExamPreference::join('exam_centres', 'exam_centres.id', '=', 'exam_preferences.centre_id')
                ->select('exam_preferences.*', 'exam_centres.name')
                ->where('exam_preferences.user_id', Auth::user()->id)
                ->orderBy('exam_preferences.preferences')
                ->get();

            // Extract an array of post_ids from preferences
            $centre_ids = $preferences->pluck('centre_id')->toArray();
            // Get posts that are not in the selected centre_ids
            $examCentres = ExamCentre::whereNotIn('id', $centre_ids)->get(['id', 'name']);
            return view('pages.examPreference', compact('examCentres', 'preferences', 'check', 'preferenceCount'));
        } else {
            $rules = [
                'centre_id' => 'required|exists:exam_centres,id', // Ensure the centre_id exists in the exam_centres table
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 400,
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 400);
            }

            // Get the current preference count for the user
            $count_pref = ExamPreference::where('user_id', Auth::user()->id)->count();

            // Data to be saved
            $data = [
                'user_id' => Auth::user()->id,
                'centre_id' => $request->centre_id,
                'preferences' => $count_pref + 1  // Increment preference count
            ];
            // Create or update the preference data
            $examPreference = ExamPreference::updateOrCreate(
                [
                    'user_id' => Auth::user()->id,    // Find by user_id
                    'centre_id' => $request->centre_id // Find by centre_id
                ],
                $data // The data to create or update the record with
            );

            if ($data) {
                $user = Auth::user();
                $user->stage = 4;
                $user->save();
            }

            return response()->json([
                'success' => true,
                'message' => 'Preference uploaded successfully!',
                // 'data' => $examPreference // Return the saved or updated preference data
            ]);
        }
    }

    public function centrePreferenceUpdate($prefId, $type)
    {
        $student = User::where('id', Auth::id())->first();
        try {
            if ($type == 3) {
                if (!ExamPreference::whereId($prefId)->where('user_id', $student->id)->delete()) {
                    DB::rollBack();
                    $errors['status'] = 'Error';
                    $errors['msg'] = 'Try Again. Fail to Delete';
                    return response()->json($errors, 403);
                }

                $p_data = ExamPreference::where('user_id', $student->id)->orderBy('preferences', "ASC")->get();
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
                $p1 = ExamPreference::where('user_id', $student->id)->where('id', $prefId)->first();
                $p2 = ExamPreference::where('user_id', $student->id)->where('preferences', $p1->preferences + 1)->first();
                if (ExamPreference::where('user_id', $student->id)->count() < $p1->preferences + 1) {
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
                $p1 = ExamPreference::where('user_id', $student->id)->where('id', $prefId)->first();
                $p2 = ExamPreference::where('user_id', $student->id)->where('preferences', $p1->preferences - 1)->first();

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
