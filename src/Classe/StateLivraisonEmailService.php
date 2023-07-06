<?php

namespace App\Classe;

use App\Entity\Order;
use Psr\Log\LoggerInterface;

class StateLivraisonEmailService
{
    private LoggerInterface $logger;
    private Mail $mail;

    public function __construct(LoggerInterface $logger, Mail $mail)
    {
        $this->logger = $logger;
        $this->mail = $mail;
    }

    public function sendOrderLivraisonEmail(Order $order): void
    {
        /*$contenu = "Bonjour, ". $order->getUser()->getFirstName(). ' '. $order->getUser()->getLastName();
        $this->mail->send($order->getUser()->getEmail(), $order->getUser()->getFirstName(). ' '. $order->getUser()->getLastName(), 'Votre commande est en cours de livraison.', $contenu);
        $this->logger->info('Email de confirmation envoyé', ['to_email' => $order->getUser()->getEmail()]);*/

        $user = $order->getUser();
        $orderId = $order->getRef();

        $subject = "État de votre commande n°$orderId";

        $contenu = sprintf("Bonjour %s %s,\n", $user->getFirstName(), $user->getLastName());
        $contenu .= sprintf("Nous sommes heureux de vous informer que votre commande n°%s est en cours de livraison.\n", $orderId);
        $contenu .= "Nous espérons que vous serez satisfait(e) de votre commande et nous restons à votre disposition si vous avez des questions ou des préoccupations.\n";
        $contenu .= "Nous vous remercions pour votre confiance et votre fidélité.";

        $this->mail->send($user->getEmail(), "{$user->getFirstName()} {$user->getLastName()}", $subject, $contenu);

        $this->logger->info(message: 'Email de confirmation envoyé', context: ['to_email' => $user->getEmail()]);
    }
}