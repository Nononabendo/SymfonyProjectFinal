<?php

namespace App\Classe;

use App\Entity\Order;
use Psr\Log\LoggerInterface;

class StatePreparationEmailService
{

    private LoggerInterface $logger;
    private Mail $mail;

    public function __construct(LoggerInterface $logger, Mail $mail)
    {
        $this->logger = $logger;
        $this->mail = $mail;
    }

    public function sendOrderPreparationEmail(Order $order): void
    {
      
        $user = $order->getUser();
        $orderId = $order->getRef();

        $subject = "État de votre commande n°$orderId";

        $contenu = "Bonjour {$user->getFirstName()} {$user->getLastName()},<br>";
        $contenu .= "Nous souhaitons vous informer que votre commande n°$orderId est actuellement en cours de préparation.<br>";
        $contenu .= "Nous mettons tout en œuvre pour que votre commande vous parvienne dans les délais impartis et en parfait état.<br><br>";
        $contenu .= "Si vous avez des questions ou des préoccupations concernant votre commande, n'hésitez pas à nous contacter à l'adresse e-mail ou au numéro de téléphone figurant sur notre site web.<br><br>";
        $contenu .= "Nous vous remercions pour votre confiance et votre fidélité.";

        $this->mail->send($user->getEmail(), "{$user->getFirstName()} {$user->getLastName()}", $subject, $contenu);

        $this->logger->info('Email de confirmation envoyé', ['to_email' => $user->getEmail()]);

    }
}