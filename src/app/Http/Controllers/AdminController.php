<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $contacts = Contact::keywordSearch($request->keyword)
        ->genderSearch($request->gender)
        ->categorySearch($request->category_id)
        ->dateSearch($request->date)
        ->paginate(7);

        $categories = Category::all();

        return view('admin.index',compact('contacts','categories'));
    }

    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/admin');

    }
}
