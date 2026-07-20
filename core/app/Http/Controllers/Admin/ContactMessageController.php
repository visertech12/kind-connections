<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactMessageController extends Controller
{
    public function index(Request $request)
    {
        $page_title = 'Contact Messages';
        $query = ContactMessage::query();

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('name', 'like', "%$s%")
                  ->orWhere('email', 'like', "%$s%")
                  ->orWhere('subject', 'like', "%$s%")
                  ->orWhere('message', 'like', "%$s%");
            });
        }

        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', (int) $request->status);
        }

        $messages = $query->orderByDesc('id')->paginate(getPaginate());

        $counts = [
            'total'    => ContactMessage::count(),
            'new'      => ContactMessage::where('status', 0)->count(),
            'read'     => ContactMessage::where('status', 1)->count(),
            'replied'  => ContactMessage::where('status', 2)->count(),
        ];

        return view('admin.contact.index', compact('page_title', 'messages', 'counts'));
    }

    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);
        if ($message->status == 0) {
            $message->status = 1;
            $message->save();
        }
        $page_title = 'Contact Message #' . $message->id;
        return view('admin.contact.show', compact('page_title', 'message'));
    }

    public function reply(Request $request, $id)
    {
        $request->validate([
            'reply' => 'required|string|max:10000',
        ]);

        $message = ContactMessage::findOrFail($id);
        $message->admin_reply = $request->reply;
        $message->replied_at  = now();
        $message->status      = 2;
        $message->save();

        try {
            $general  = gs();
            $siteName = $general->site_name ?? config('app.name');
            $subject  = 'Re: ' . $message->subject;
            $body     = "Hi {$message->name},\n\n{$request->reply}\n\n--\n{$siteName}\n\n----- Original message -----\n{$message->message}";

            Mail::raw($body, function ($mail) use ($message, $subject) {
                $mail->to($message->email, $message->name)->subject($subject);
            });
        } catch (\Throwable $e) {
            return back()->withErrors(['reply' => 'Reply saved but email failed: ' . $e->getMessage()]);
        }

        return back()->with('success', 'Reply sent to ' . $message->email);
    }

    public function destroy($id)
    {
        ContactMessage::findOrFail($id)->delete();
        return redirect()->route('admin.contact.index')->with('success', 'Contact message deleted.');
    }
}