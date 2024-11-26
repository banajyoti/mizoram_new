<?php

namespace App\Http\Controllers;

use App\Models\Preference;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use QrCode;
use \PDF;

class DownloadController extends Controller
{
    public function download_ack(Request $request)
    {
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
                'preferences.*',
                'profiles.*',
                'documents.*',
                'castes.name as c',
                's1.name as pState',
                's2.name as cState',
                'd1.name as pDist',
                'd2.name as cDist',
                'users.updated_at as up'
            )
            ->where('users.id', Auth::user()->id)
            ->first();

        $preferences = Preference::leftJoin('posts', 'posts.id', '=', 'preferences.post_id')
            ->select('preferences', 'posts.*')
            ->where('preferences.user_id', Auth::user()->id)
            ->orderBy('preferences.preferences')
            ->get();

        $qr_code = $userDetails->full_name . "\n" . $userDetails->registration_number;
        $qrcode = base64_encode(QrCode::format("svg")->size(230)
            ->errorCorrection("H")
            ->generate($qr_code));

        $pdf = PDF::loadview('pages.acknowledgement', compact('userDetails', 'preferences', 'qrcode'));
        $page = $userDetails->full_name . '-acknowledgement.pdf';
        $pdf->getDomPDF()->setHttpContext(stream_context_create(['ssl' => ['allow_self_signed' => true, 'verify_peer' => false, 'verify_peer_name' => false]]));
        return $pdf->setPaper('A4', 'Portrait')->download($page);
        //return view('pages.acknowledgement', compact('userDetails', 'preferences'));
    }
}
