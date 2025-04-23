<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @group login
     */

    public function testLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') // kunjungi halaman utama aplikasi
                ->assertSee('Log in') // pastikan halaman login ada
                ->clickLink('Log in') // klik link login
                ->type('email', 'fauzi@example.com') // masukan type email yang digunakan
                ->type('password', 'password123') // masukkan type password yang digunakan
                ->press('LOG IN'); // tekan tombol register 
        });
    }
}
