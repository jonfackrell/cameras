<?php

namespace App\Http\Controllers\Printing;

use App\Models\Patron;
use App\Models\Printer;
use App\Models\Setting;
use App\Models\User;
use App\Notifications\QuestionNotification;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Display the Homepage
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $public = Setting::where('group', 'PUBLIC')->get();
        return view('3d.public.index', compact('public'));
    }

    /**
     * Display all printers
     *
     * @return \Illuminate\Http\Response
     */
    public function printers()
    {
        $public = Setting::where('group', 'PUBLIC')->get();
        $printers = Printer::all();
        return view('3d.public.printers', compact('public', 'printers'));
    }

    /**
     * Display policy
     *
     * @return \Illuminate\Http\Response
     */
    public function policy()
    {
        $public = Setting::where('group', 'PUBLIC')->get();
        return view('3d.public.policy', compact('public'));
    }

    /**
     * Display the contact form
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        $public = Setting::where('group', 'PUBLIC')->get();
        return view('3d.public.contact', compact('public'));
    }

    /**
     * Display the history of uploads
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sendEmail(Request $request)
    {
        $user = User::whereEmail(env('CONTACT'))->first();
        $user->notify(new QuestionNotification($request->get('name'), $request->get('email'), $request->get('message') ));
        return redirect()->route('3d.home');
    }
}
