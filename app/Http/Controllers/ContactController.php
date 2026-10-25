<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\PenawaranBaru;
use App\Models\Contact;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
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
        // Simpan permintaan pengunjung ke database.
        $contact = Contact::create($request->validated());

        try {
            // Kirim notifikasi ke email perusahaan.
            Mail::to(config('company.email'))
                ->send(new PenawaranBaru($contact));

            return back()->with(
                'success',
                'Permintaan penawaran berhasil dikirim. Tim kami akan segera menghubungi Anda.'
            );
        } catch (\Throwable $e) {
            // Catat error agar bisa diperiksa di log Laravel.
            Log::error('Gagal mengirim email permintaan penawaran.', [
                'contact_id' => $contact->id,
                'error' => $e->getMessage(),
            ]);

            return back()->with(
                'warning',
                'Permintaan Anda sudah tersimpan, tetapi notifikasi email belum berhasil dikirim. Silakan coba lagi nanti.'
            );
        }
    }
}
