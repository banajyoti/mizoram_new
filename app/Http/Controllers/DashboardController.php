<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Preference;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $userDetails = User::where('id', Auth::user()->id)->first();
        $preferences = Preference::leftJoin('posts', 'posts.id', '=', 'preferences.post_id')
            ->select('preferences', 'posts.*')
            ->where('preferences.user_id', Auth::user()->id)
            ->orderBy('preferences')
            ->get();
        $documents = Document::where('user_id', Auth::user()->id)->first();

        return view('pages.dashboard', compact('preferences', 'userDetails', 'documents'));
    }
}
