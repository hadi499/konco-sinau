<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function score()
    {
        $results = Result::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.score', [
            'title' => 'score',
            'results' => $results
        ]);
    }

    public function deleteResultAll()
    {
        // Hapus semua record dari tabel results
        Result::truncate();

        // Redirect ke halaman dengan pesan sukses
        return redirect()->back()->with('success', 'All results have been deleted successfully!');
    }
}
