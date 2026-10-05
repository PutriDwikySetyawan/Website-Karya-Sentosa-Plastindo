<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class PenawaranBaru extends Mailable
{
    public function __construct(public Contact $contact) {}

    public function envelope(): Envelope
{
    $kontak = trim((string) $this->contact->contact);

    return new Envelope(
        subject: 'Permintaan Penawaran Baru dari ' . ($this->contact->name ?? 'Pengunjung'),
        replyTo: filter_var($kontak, FILTER_VALIDATE_EMAIL)
            ? [new Address($kontak, $this->contact->name ?? '')]
            : [],
    );
}

    public function content(): Content
    {
        return new Content(view: 'emails.penawaran-baru');
    }
}