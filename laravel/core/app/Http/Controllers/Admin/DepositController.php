<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    // ── All deposits (with optional status filter via ?status=pending|approved|rejected)
    public function index(Request $request)
    {
        $pageTitle = 'All Manual Deposits';
        $query = Deposit::with(['user', 'gateway'])
            ->where('method_code', '>=', 1000)
            ->latest();

        $filter = $request->get('status', 'all');
        if ($filter === 'pending') {
            $query->where('status', Status::PAYMENT_PENDING);
            $pageTitle = 'Pending Manual Deposits';
        } elseif ($filter === 'approved') {
            $query->where('status', Status::PAYMENT_SUCCESS);
            $pageTitle = 'Approved Manual Deposits';
        } elseif ($filter === 'rejected') {
            $query->where('status', Status::PAYMENT_REJECT);
            $pageTitle = 'Rejected Manual Deposits';
        }

        $deposits      = $query->paginate(20)->withQueryString();
        $pendingCount  = Deposit::pending()->count();
        $approvedCount = Deposit::approved()->count();
        $rejectedCount = Deposit::rejected()->count();

        return view('admin.deposit.index', compact(
            'pageTitle', 'deposits', 'filter',
            'pendingCount', 'approvedCount', 'rejectedCount'
        ));
    }

    // ── Shortcut routes
    public function pending()
    {
        return redirect()->route('admin.deposit.index', ['status' => 'pending']);
    }

    public function approved()
    {
        return redirect()->route('admin.deposit.index', ['status' => 'approved']);
    }

    public function rejected()
    {
        return redirect()->route('admin.deposit.index', ['status' => 'rejected']);
    }

    // ── Full deposit detail page
    public function details($id)
    {
        $pageTitle = 'Deposit Details';
        $deposit = Deposit::with(['user', 'gateway'])->where('method_code', '>=', 1000)->findOrFail($id);
        return view('admin.deposit.details', compact('pageTitle', 'deposit'));
    }

    // ── Approve a pending deposit
    public function approve($id)
    {
        $deposit = Deposit::where('method_code', '>=', 1000)
            ->where('status', Status::PAYMENT_PENDING)
            ->findOrFail($id);

        $user = User::findOrFail($deposit->user_id);
        $creditAmount = $deposit->amount;

        $detail = $deposit->detail;
        if (!empty($detail->invoice_payload)) {
            try {
                $payload = decrypt($detail->invoice_payload);
                $exp = explode('|', $payload);
                $invoiceType = $exp[0];
                $invoiceID = $exp[1];

                $invoice = \App\Models\Invoice::where('user_id', $user->id)->where(function($q) use ($invoiceID) {
                    $q->where('invid', $invoiceID)->orWhere('id', $invoiceID);
                })->first();

                if ($invoice) {
                    $invoice->paid = $invoice->paid + $creditAmount;
                    if($invoice->paid >= $invoice->amount){
                        $invoice->status = 1;
                    }else{
                        $invoice->status = 2; // partially paid
                    }
                    $invoice->save();
                    
                    // Transaction for invoice payment
                    Transaction::create([
                        'user_id'      => $user->id,
                        'amount'       => $creditAmount,
                        'post_balance' => $user->balance,
                        'charge'       => $deposit->charge ?? 0,
                        'trx_type'     => '-', // Invoice payment deducts conceptually, but since they deposited directly to the invoice, we just log it
                        'details'      => 'Paid for Invoice: ' . $invoiceID . ' via manual deposit',
                        'trx'          => $deposit->trx,
                        'remark'       => 'invoice_payment',
                    ]);
                } else {
                    // Fallback if invoice deleted: credit user balance
                    $user->balance += $creditAmount;
                    $user->save();
                    Transaction::create([
                        'user_id'      => $user->id,
                        'amount'       => $creditAmount,
                        'post_balance' => $user->balance,
                        'charge'       => $deposit->charge ?? 0,
                        'trx_type'     => '+',
                        'details'      => 'Manual deposit approved (Invoice not found) — Trx: ' . $deposit->trx,
                        'trx'          => $deposit->trx,
                        'remark'       => 'manual_deposit',
                    ]);
                }
            } catch (\Exception $e) {
                // Fallback on decryption failure
                $user->balance += $creditAmount;
                $user->save();
            }
        } else {
            // Normal deposit: Credit the user's balance
            $user->balance += $creditAmount;
            $user->save();

            // Log the transaction
            Transaction::create([
                'user_id'      => $user->id,
                'amount'       => $creditAmount,
                'post_balance' => $user->balance,
                'charge'       => $deposit->charge ?? 0,
                'trx_type'     => '+',
                'details'      => 'Manual deposit approved — Trx: ' . $deposit->trx,
                'trx'          => $deposit->trx,
                'remark'       => 'manual_deposit',
            ]);
        }

        // Mark deposit approved
        $deposit->status = Status::PAYMENT_SUCCESS;
        $deposit->save();

        return redirect()->route('admin.deposit.details', $id)
            ->with('success', 'Deposit approved successfully.');
    }

    // ── Reject a pending deposit
    public function reject(Request $request, $id)
    {
        $deposit = Deposit::where('method_code', '>=', 1000)
            ->where('status', Status::PAYMENT_PENDING)
            ->findOrFail($id);

        $deposit->status = Status::PAYMENT_REJECT;
        $deposit->save();

        return redirect()->route('admin.deposit.details', $id)
            ->with('success', 'Deposit has been rejected.');
    }
}
