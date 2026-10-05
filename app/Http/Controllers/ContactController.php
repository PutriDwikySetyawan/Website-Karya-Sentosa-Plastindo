<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\PenawaranBaru;
use App\Models\Contact;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('name')->get();

        return view('contact.index', compact('products'));
    }

    public function store(ContactRequest $request)
    {
        $contact = Contact::create($request->validated());

        try {
            Mail::to(config('company.email'))->send(new PenawaranBaru($contact));
        } catch (\Throwable $e) {
            report($e);
        }

        return back()->with('success', 'Permintaan penawaran terkirim. Tim kami akan segera menghubungi Anda.');
    }
}