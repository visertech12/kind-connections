<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\SupportAttachment;
use App\Models\SupportMessage;
use App\Models\SupportTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function ticketIndex()
    {
        $pageTitle = "Support Tickets";
        $user = auth()->user();
        $tickets = SupportTicket::where('user_id', $user->id)->orderBy('id', 'desc')->paginate(15);
        $ticketCount = $tickets->count();
        $fakePage = $tickets;
        return view('user.support.index', compact('pageTitle', 'tickets', 'ticketCount', 'fakePage'));
    }

    public function ticketNew()
    {
        $pageTitle = "New Ticket";
        $user = auth()->user();
        return view('user.support.create', compact('pageTitle', 'user'));
    }

    public function ticketStore(Request $request)
    {
        $request->validate([
            'subject' => 'required|max:100',
            'priority' => 'required',
            'message' => 'required',
            'attachments.*' => 'nullable|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048'
        ]);

        $user = auth()->user();
        $ticket = new SupportTicket();
        $ticket->user_id = $user->id;
        $ticket->name = $user->fullname;
        $ticket->email = $user->email;
        $ticket->ticket = rand(100000, 999999);
        $ticket->subject = $request->subject;
        $ticket->priority = $request->priority;
        $ticket->status = 0;
        $ticket->last_reply = now();
        $ticket->save();

        $message = new SupportMessage();
        $message->support_ticket_id = $ticket->id;
        $message->message = $request->message;
        $message->save();

        // Handle Attachments if exist
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                try {
                    $attachment = new SupportAttachment();
                    $attachment->support_message_id = $message->id;
                    $attachment->attachment = uploadImage($file, 'assets/support/');
                    $attachment->save();
                } catch (\Exception $exp) {
                    return back()->with('error', 'Could not upload your file');
                }
            }
        }

        return redirect()->route('user.ticket.index')->with('success', 'Ticket opened successfully!');
    }

    public function ticketDetails($id)
    {
        $user = auth()->user();
        $ticket = SupportTicket::where('user_id', $user->id)->where('ticket', $id)->firstOrFail();
        $pageTitle = "Support Ticket #" . $ticket->ticket;
        $messages = SupportMessage::where('support_ticket_id', $ticket->id)->orderBy('id', 'desc')->get();
        return view('user.support.view', compact('ticket', 'pageTitle', 'messages'));
    }

    public function ticketReply(Request $request, $id)
    {
        $request->validate([
            'message' => 'required',
            'attachments.*' => 'nullable|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048'
        ]);

        $user = auth()->user();
        $ticket = SupportTicket::where('user_id', $user->id)->where('ticket', $id)->firstOrFail();
        $ticket->status = 2; // User Reply
        $ticket->last_reply = now();
        $ticket->save();

        $message = new SupportMessage();
        $message->support_ticket_id = $ticket->id;
        $message->message = $request->message;
        $message->save();

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                try {
                    $attachment = new SupportAttachment();
                    $attachment->support_message_id = $message->id;
                    $attachment->attachment = uploadImage($file, 'assets/support/');
                    $attachment->save();
                } catch (\Exception $exp) {
                    return back()->with('error', 'Could not upload your file');
                }
            }
        }

        return back()->with('success', 'Ticket replied successfully!');
    }

    public function ticketClose($id)
    {
        $user = auth()->user();
        $ticket = SupportTicket::where('user_id', $user->id)->where('ticket', $id)->firstOrFail();
        $ticket->status = 3; // Closed
        $ticket->save();
        return back()->with('success', 'Ticket closed successfully!');
    }

    public function ticketDownload($attachment_id)
    {
        $attachment = SupportAttachment::findOrFail($attachment_id);
        $file = $attachment->attachment;

        $path = 'assets/support/' . $file;
        $full_path = realpath($path);

        if ($full_path) {
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $mimetype = mime_content_type($full_path);
            header('Content-Disposition: attachment; filename="' . $file . '"');
            header("Content-Type: " . $mimetype);
            return readfile($full_path);
        } else {
            return back()->with('error', 'File not found');
        }
    }
}
