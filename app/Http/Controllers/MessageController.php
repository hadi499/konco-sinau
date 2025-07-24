<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function index()
    {
        $messages = Message::latest()->get();
        return view('messages.index', compact('messages'));
    }


    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('messages.index')->with('success', 'Pesan berhasil dihapus.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:200',
        ]);

        Message::create($request->only('name', 'email', 'message'));

        return redirect()->route('join')->with('success', 'Pesan Anda berhasil dikirim!');
    }
}
