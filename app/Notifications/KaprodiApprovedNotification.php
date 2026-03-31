<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class KaprodiApprovedNotification extends Notification
{
    use Queueable;

    public $pengajuan;

    /**
     * Create a new notification instance.
     */
    public function __construct($pengajuan)
    {
        $this->pengajuan = $pengajuan;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toDatabase(object $notifiable): array
    {
        // Handle fallback names gracefully
        if ($this->pengajuan->type === 'ruangan') {
            $nama_ruangan = $this->pengajuan->kelas->nama_kelas ?? 'Ruangan';
        } elseif ($this->pengajuan->type === 'support') {
            $nama_ruangan = $this->pengajuan->support->nama_ruangan ?? 'Fasilitas';
        } elseif ($this->pengajuan->type === 'laboratorium') {
            $nama_ruangan = $this->pengajuan->laboratorium->nama_laboratorium ?? 'Laboratorium';
        } else {
            $nama_ruangan = 'Ruangan';
        }

        $nama_pemohon = $this->pengajuan->user->name ?? 'User';

        return [
            'title' => 'Pengajuan Disetujui Kaprodi',
            'message' => "Pengajuan untuk {$nama_ruangan} oleh {$nama_pemohon} telah disetujui Kaprodi dan menunggu persetujuan Anda.",
            'url' => route('admin.pengajuan-ruangan.index'),
        ];
    }
}
