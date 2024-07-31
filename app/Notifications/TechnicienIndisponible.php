<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class TechnicienIndisponible extends Notification
{
    use Queueable;

    protected $tache;

    /**
     * Create a new notification instance.
     *
     * @param  $tache
     * @return void
     */
    public function __construct($tache)
    {
        $this->tache = $tache;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Un technicien a signalé qu\'il n\'est pas disponible.')
            ->line('Description de la tâche : ' . $this->tache->demande->description)
            ->line('Technicien : ' . $this->tache->technicien->nom)
            ->action('Voir les détails', url('/admin/taches/' . $this->tache->id))
            ->line('Merci de gérer cette tâche rapidement.');
    }

    // Ajoutez éventuellement la méthode `toArray` si vous souhaitez aussi notifier par d'autres canaux comme la base de données.
}
