<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use View;

class HomeController extends JoshController
{

    /*
     * $user_activation set to false makes the user activation via user registered email
     * and set to true makes user activated while creation
     */
    private $user_activation = false;

    /**
     * Account sign in.
     *
     * @return View
     */
    public function home()
    {
        $developers = Developer::where('archived', '0')->get();
        return view('home', compact('developers'));
    }


    public function getContent(Request $request)
    {
        $page = Page::where('type', 'default')->where('slug', $request->slug)->with('banner')->firstOrFail();
        return view('default', compact('page'));
    }


    public function getContact()
    {
        $page = Page::where('type', 'contact')->with('banner')->firstOrFail();
        return view('contact-us', compact('page'));
    }

    public function saveContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
            //'g-recaptcha-response' => 'required|captcha',
        ]);

        $contact = ContactUs::create($request->all());

        $emails = explode(',', env('CONTACT_US_RECIPIENT'));
        if ($emails != null && $emails[0] != null) {
            foreach ($emails as $email) {
                Notification::route('mail', $email)
                    ->notify(new ContactUsSubmitted($contact));
            }
        }

        return redirect()->route('thank-you');
    }
}
