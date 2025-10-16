<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {
        $this->checkDate(); // Funksiyani chaqirish
        if ($response = $this->checkDate()) {
        return $response; // checkDate redirect qilsa shu yerda to‘xtaydi
    }


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
            'name' => $request->name,
            'message' => $request->message,
            'file_url' => $path ?? null,
            'subject' => $request->subject,
        ]);

        Log::info('Application stored, ID: '.$application->id);

        // Job dispatch
        SendEmailJob::dispatch($application);

        return redirect()->back()->with('success', 'Ariza muvaffaqiyatli yuborildi!');
    }

    protected function checkDate()
{
    $last_application = auth()->user()->applications()->latest()->first();

    if ($last_application) {
        $last_app_date = Carbon::parse($last_application->created_at)->format('Y-m-d');
        $today = Carbon::now()->format('Y-m-d');

        if ($last_app_date == $today) {
            // BU YERDA return QILISH SHART!
            return redirect()->back()->with('error', "Siz kuniga bir marotaba ariza jo'natishingiz mumkin!");
        }
    }
}       

}
