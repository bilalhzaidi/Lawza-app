<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Optional logic if you're using user-specific documents
        // $docs = Document::where('user_id', auth()->id())->get();

        return view('dashboard');

}
}
