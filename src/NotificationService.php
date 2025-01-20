<?php

namespace App;

class NotificationService
{
    public function send($to, $content)
    {
        echo "Enviando notificación a $to: '$content'";
    }
}
