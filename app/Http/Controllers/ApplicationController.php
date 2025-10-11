<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\Log;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048',
        ]);

        // Faylni saqlash
        $path = null;
        if ($request->hasFile('file')) {
            $name = $request->file('file')->getClientOriginalName();
            $path = $request->file('file')->storeAs('files', $name, 'public');
        }

        // Ma’lumotlarni saqlash
        $application = Application::create([
            'user_id' => auth()->id(),
            'message' => $validated['message'],
            'file_url' => $path,
        ]);

        Log::info('Application stored, ID: '.$application->id);

        // Job dispatch
        SendEmailJob::dispatch($application);

        return redirect()->back()->with('success', 'Ariza muvaffaqiyatli yuborildi!');
    }
}
