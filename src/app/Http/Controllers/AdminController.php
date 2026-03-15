<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.index', compact('contacts'));
    }

    public function destroy($id)
    {
        Contact::findOnFail($id)->delete();

        return redirect('/admin');
    }
}
