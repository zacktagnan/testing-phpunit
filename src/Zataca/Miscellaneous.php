<?php

namespace App\Zataca;

class Miscellaneous
{
    public function sing(): string
    {
        return 'We are the champions...my friend!!';
    }

    public function encrypt(string $text): string
    {
        $encrypted = base64_encode(openssl_encrypt(
            data: $text,
            cipher_algo: 'aes-256-cbc',
            passphrase: 'my_super_secret_passphrase',
            options: 0,
            iv: openssl_random_pseudo_bytes(16),
        ));

        $preffix = 'ZA';
        $suffix = 'CK';

        return $preffix . $encrypted . $suffix;
    }
}
