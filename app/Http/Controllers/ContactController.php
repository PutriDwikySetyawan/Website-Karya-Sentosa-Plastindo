<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Product;

class ContactController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('name')->get();

        return view('contact.index', compact('products'));
    }

    public function store(ContactRequest $request)
    {
        Contact::create($request->validated());

        return redirect()
            ->to(url()->previous() . '#minta-penawaran')
            ->with('success', 'Terima kasih! Permintaan penawaran Anda sudah kami terima. Tim kami akan segera menghubungi Anda.');
    }
}