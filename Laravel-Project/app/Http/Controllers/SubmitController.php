<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submit;

class SubmitController extends Controller
{
    public function index()
    {
        $submits = Submit::all();
        return view('submits.index', compact('submits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'contactText' => 'required',
        ]);
        $submit = new Submit;
        $submit->user_id = $request->user()->id;
        $submit->contactText = $request->contactText;
        $submit->save();

        return redirect('/submits')->with('success', 'Submit created successfully!');
    }
}
