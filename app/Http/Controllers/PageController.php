<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Mail;
use App\mail\ContactForm;

class PageController extends Controller
{
    public function about()
    {
        return ("This is about page");
    }
    public function contact()
    {
        return view('contact');
    }
    public function sendContact(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required|min:15',
        ]);

        Mail::to('roshankumar.giri19@gmail.com')->send(new ContactForm($request));
        return redirect('/');
    }
    public function submitContact()
    {
        return ("This is submit contact page");
    }
    public function profile($id)
    {
        $user = User::with(['questions', 'answers', 'answers.question'])->find($id);
        return view('profile', compact('user'));
    }
}
