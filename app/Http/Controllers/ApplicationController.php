<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $name = $request->file('file')->getClientOriginalName();
            $path = $request->file('file')->storeAs(
                'files',
                $name,
                'public'
            );
        }
        $validated = $request->validate([
            'subject' => 'required|max:255',
            'message' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048',
        ]);
        $application = Application::create([
            "user_id" => auth()->id(),
            "name" => $request->name,
            "message" => $request->message,
            'file_url' => $path ?? null,
        ]);
        return redirect()->back();
    }
}
