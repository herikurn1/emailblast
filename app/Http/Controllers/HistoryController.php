<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function indexAllMails() {
        $mails = DB::table('mails')->orderBy('updated_at', 'desc')->orderBy('created_at', 'desc')->get();
        if($mails) {
            return response()->json([
                "status" => true,
                "message" => 'Mails Retrieved',
                "data" => $mails
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => 'Mails Not Found'
            ], 404);
        }
    }

    public function destroyMail(Request $request) {
        $destroy_mail = DB::table('mails')->where('id', $request->id)->delete();
        if($destroy_mail) {
            return response()->json([
                "status" => true,
                "message" => 'Mails Destroyed'
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => 'Mails Not Affected'
            ], 400);
        }
    }
}
