<?php

namespace App;

class NotificationService
{
    // -> con dos párametros separados...
    // public function send($to, $content)
    // {
    //     echo "Enviando notificación a $to: '$content'";
    // }
    // --------------------------------------------------------------
    // -> con un ARRAY asociativo a modo de párametro único...
    public function send(array $data)
    {
        echo "Enviando notificación a {$data['to']}: '{$data['content']}'";
    }
}
