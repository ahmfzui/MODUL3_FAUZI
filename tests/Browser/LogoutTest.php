<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LogoutTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @group logout
     */

    public function testLogout()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') // kunjungi halaman utama aplikasi
                ->assertSee('Register') // pastikan halaman register ada
                ->clickLink('Register') // klik link register
                ->type('name', 'Ahmad Fauzi')  // masukkan type nama yang digunakan
                ->type('email', 'fauzi@example.com') // masukan type email yang digunakan
                ->type('password', 'password123') // password yang digunakan
                ->type('password_confirmation', 'password123') // konfirmasi password
                ->press('REGISTER') // tekan tombol register
                ->assertPathIs('/dashboard') // asumsi redirect ke dashboard setelah register
                ->assertSee('Dashboard');   // sesuaikan dengan teks yang ada di halaman dashboard
                ->assert( 'Logout') // pastikan tombol logout ada
                ->clickLink('Logout') // klik tombol logout
                ->assertPathIs('/') // pastikan berada di halaman utama setelah logout
        });
    }
}
