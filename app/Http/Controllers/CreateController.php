<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function index()
    {
        $mail = DB::table('mails')->where('id', request('id'))->first();
        $data['mail'] = $mail;
        return view('create', $data);
    }

    public function send(Request $request)
    {
        $payload = $request->all();

        if (DB::table('mails')->where('id', $payload['id'])->exists()) {
            $mail_update = DB::table('mails')->where('id', $payload['id'])->update([
                "title" => $payload['title'],
                "subject" => $payload['subject'],
                "body" => $payload['Article_content'],
                "is_sent" => 0,
                "updated_at" => date("Y-m-d h:m:s")
            ]);
            if ($mail_update) {
                $data['mail']['id'] = $payload['id'];
                return redirect('/compose?id=' . $data['mail']['id']);
            } else {
                dd('Failed to update data ...');
            }
        } else {
            $mail_create = DB::table('mails')->insertGetId([
                "from_email" => NULL,
                "from" => NULL,
                "to" => NULL,
                "cc" => NULL,
                "title" => $payload['title'],
                "subject" => $payload['subject'],
                "body" => $payload['Article_content'],
                "is_sent" => 0,
                "created_at" => date("Y-m-d h:m:s")
            ]);
            if ($mail_create) {
                $data['mail']['id'] = $mail_create;
                return redirect('/compose?id=' . $data['mail']['id']);
            } else {
                dd('Failed to create data ...');
            }
        }
    }
}
