<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index ()
    {
        return view('contact.index');
    }

    public function confirm(Request $request)
    {
        $contact = $request->only(['last_name','first_name','gender','email','tel1','tel2','tel3','address','building','contact_type','content']);
        
        return view('contact.confirm', compact('contact'));
    }

    public function store(Request $request)
    {
        $contact = $request->only(['last_name','first_name','gender','email','tel1','tel2','tel3','address','building','contact_type','content']);
        Contact::create($contact);

        return view('contact.thanks');

    }
}


