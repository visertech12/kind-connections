<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SupportAttachment;
use App\Models\SupportMessage;
use App\Models\SupportTicket;
use Illuminate\Http\Request;

class SupportTicketController extends Controller
{
    public function tickets()
    {
        $pageTitle = 'Support Tickets';
        $emptyMessage = 'No Data found.';
        $items = SupportTicket::orderBy('id', 'desc')->with('user')->paginate(getPaginate());
        return view('admin.support.tickets', compact('items', 'pageTitle', 'emptyMessage'));
    }

    public function pendingTicket()
    {
        $pageTitle = 'Pending Tickets';
        $emptyMessage = 'No Data found.';
        $items = SupportTicket::whereIn('status', [0,2])->orderBy('id', 'desc')->with('user')->paginate(getPaginate());
        return view('admin.support.tickets', compact('items', 'pageTitle', 'emptyMessage'));
    }

    public function closedTicket()
    {
        $pageTitle = 'Closed Tickets';
        $emptyMessage = 'No Data found.';
        $items = SupportTicket::where('status', 3)->orderBy('id', 'desc')->with('user')->paginate(getPaginate());
        return view('admin.support.tickets', compact('items', 'pageTitle', 'emptyMessage'));
    }

    public function answeredTicket()
    {
        $pageTitle = 'Answered Tickets';
        $emptyMessage = 'No Data found.';
        $items = SupportTicket::where('status', 1)->orderBy('id', 'desc')->with('user')->paginate(getPaginate());
        return view('admin.support.tickets', compact('items', 'pageTitle', 'emptyMessage'));
    }

    public function ticketReply($id)
    {
        $ticket = SupportTicket::with('user')->where('id', $id)->firstOrFail();
        $pageTitle = 'Reply Ticket';
        $messages = SupportMessage::with('ticket')->where('support_ticket_id', $ticket->id)->orderBy('id', 'desc')->get();
        return view('admin.support.reply', compact('ticket', 'messages', 'pageTitle'));
    }

    public function ticketReplySend(Request $request, $id)
    {
        $ticket = SupportTicket::with('user')->where('id', $id)->firstOrFail();
        $message = new SupportMessage();
        if ($request->replayTicket == 1) {
            $ticket->status = 3;
            $ticket->last_reply = now();
            $ticket->save();
            return back()->with('success', 'Support ticket closed successfully!');
        }

        $request->validate([
            'message' => 'required',
            'attachments.*' => 'nullable|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048'
        ]);

        $ticket->status = 1;
        $ticket->last_reply = now();
        $ticket->save();

        $message->support_ticket_id = $ticket->id;
        $message->admin_id = auth('admin')->id() ?? 1; // Fallback if admin auth is different
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

        return back()->with('success', 'Support ticket replied successfully!');
    }

    public function ticketDelete($id)
    {
        $message = SupportMessage::findOrFail($id);
        if ($message->attachments()->count() > 0) {
            foreach ($message->attachments as $attachment) {
                removeFile('assets/support/' . $attachment->attachment);
                $attachment->delete();
            }
        }
        $message->delete();
        return back()->with('success', 'Delete successfully.');
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
