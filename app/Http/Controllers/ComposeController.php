<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ComposeController extends Controller
{
    public function index()
    {
        $mail = DB::table('mails')->where('id', request('id'))->first();
        if ($mail) {
            $data['mail'] = $mail;
            return view('compose', $data);
        } else {
            return redirect('/create');
        }
    }

    public function send(Request $request)
    {
        $payload = $request->all();
        
        if (DB::table('mails')->where('id', $payload['id'])->exists()) {
            $mail_update = DB::table('mails')->where('id', $payload['id'])->update([
                "from_email" => $payload['from_email'],
                "from" => $payload['from'],
                "to" => $payload['to'],
                "cc" => $payload['cc'],
                "title" => $payload['title'],
                "subject" => $payload['subject'],
                "is_sent" => 1,
                "updated_at" => date("Y-m-d h:m:s")
            ]);
            if ($mail_update) {
                $data['mail']['id'] = $payload['id'];
                return redirect('/history');
            } else {
                dd('Failed to update data ...');
            }
        } else {
            return redirect('/compose?id=' . $payload['id']);
        }
    }
}
