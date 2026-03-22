<?php

namespace Tests\Zataca;

use App\Zataca\Miscellaneous;
// use PHPUnit\Framework\TestCase;
use Tests\Zataca\Utils\TestCase as UtilsTestCase;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\Group;

#[Group('zat_misc')]
class MiscellaneousTest extends UtilsTestCase
{
    private Miscellaneous $miscellaneous;
    protected $championSong = 'We are the champions...my friend!!';

    protected function setUp(): void
    {
        parent::setUp();
        // var_dump('==== setUp - ejecutado después del método de test ====' . "\n");
        $this->miscellaneous = new Miscellaneous();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        // var_dump('==== tearDown - ejecutado después del método de test ====' . "\n");
    }

    #[Test]
    public function it_sings_we_are_champions_successfully()
    {
        // var_dump('==== cantando_con_Exito - dentro de la prueba de test ====');

        // $miscellaneous = new Miscellaneous();
        $this->assertEquals($this->championSong, $this->miscellaneous->sing());
    }

    #[Test]
    public function it_encrypts_an_string()
    {
        // PREPARING
        // $miscellaneous = new Miscellaneous();
        // $preffix = 'ZA';
        // $suffix = 'CK';

        // CALLING
        $encrypted = $this->miscellaneous->encrypt('Aloha');

        // VERIFYING
        $this->assertStringEncryption($encrypted);
    }
}
