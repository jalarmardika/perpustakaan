<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Book, Member, Transaction};

class TransactionController extends Controller
{
    public function index()
    {
    	return view('transaction.index', [
    		'transactions' => Transaction::orderBy('id', 'desc')->get()
    	]);
    }

    public function create()
    {
    	return view('transaction.create', [
            'books' => Book::orderBy('id', 'desc')->get(),
            'members' => Member::orderBy('id', 'desc')->get()
        ]);
    }

    public function store(Request $request)
    {
    	$validatedData = $request->validate([
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
            'transaction_date' => 'required|date',
            'return_date' => 'required|date'
        ]);

        // cek stock buku
        $book = Book::find($validatedData['book_id']);
        if ($book->stock < 1) {
            return redirect('transaction/create')->with('fail', 'Failed, this book is out of stock');
        }

        // member tidak boleh meminjam buku baru, jika sedang meminjam buku yg lain dan belum dikembalikan  
        if (Transaction::where('member_id', $validatedData['member_id'])->where('status', 'borrowed')->count()) {
            return redirect('transaction/create')->with('fail', 'Failed, this member is borrowing a book');
        }

        $validatedData['transaction_code'] = 'T-' . time();
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['status'] = 'borrowed';
        $validatedData['notes'] = $request->notes;

        Transaction::create($validatedData);

        $updateStock = $book->stock - 1;
        $book->update(['stock' => $updateStock]);
        return redirect('transaction')->with('success', 'Transaction Successfully');
    }

    public function show(Transaction $transaction)
    {
    	return view('transaction.show', [
    		'transaction' => $transaction
    	]);
    }

    public function edit(Transaction $transaction)
    {
    	return view('transaction.edit', [
    		'transaction' => $transaction,
            'books' => Book::orderBy('id', 'desc')->get(),
            'members' => Member::orderBy('id', 'desc')->get()
    	]);
    }

    public function update(Request $request, Transaction $transaction)
    {
    	$validatedData = $request->validate([
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
            'transaction_date' => 'required|date',
            'return_date' => 'required|date'
        ]);

        // cek stock buku
        $book = Book::find($validatedData['book_id']);
        if ($book->stock < 1) {
            return redirect('transaction/'. $transaction->id .'/edit')->with('fail', 'Failed, this book is out of stock');
        }

        if (Transaction::where('member_id', $validatedData['member_id'])->where('status', 'borrowed')->count() && $transaction->member_id != $validatedData['member_id']) {
            return redirect('transaction/'. $transaction->id .'/edit')->with('fail', 'Failed, this member is borrowing a book');
        }

        if (isset($request->status) && $request->status == "returned") {
            $updateStock = $book->stock + 1;
            $book->update(['stock' => $updateStock]);

            $validatedData['status'] = "returned";
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['notes'] = $request->notes;

        $transaction->update($validatedData);
        return redirect('transaction')->with('success', 'Transaction Updated Successfully');
    }

    public function destroy(Transaction $transaction)
    {
        // jika status masih dipinjam, lalu data transaksi dihapus maka stock buku otomatis ditambah 1
        if ($transaction->status == "borrowed") {
            $book = Book::find($transaction->book_id);
            $updateStock = $book->stock + 1;
            $book->update(['stock' => $updateStock]);
        }
        $transaction->delete();
        return redirect('transaction')->with('success', 'Transaction Deleted Successfully');
    }
}
