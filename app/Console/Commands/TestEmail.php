<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TestEmail extends Command
{
    protected $signature = 'email:test';

    protected $description = 'Tes pengiriman email perusahaan';

    public function handle(): int
    {
        try {
            Mail::raw(
                'Ini adalah email percobaan dari website PT Karya Sentosa Plastindo.',
                function ($message) {
                    $message
                        ->to('ptkaryasentosaplastindo@gmail.com')
                        ->subject('Tes Notifikasi Website');
                }
            );

            $this->info('Email berhasil diteruskan ke layanan SMTP.');
            return self::SUCCESS;
        } catch (\Throwable $e) {
            $this->error('Gagal mengirim email: ' . $e->getMessage());
            return self::FAILURE;
        }
    }
}
