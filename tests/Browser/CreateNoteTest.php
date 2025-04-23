<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateNoteTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @group createnote
     */

    public function testCreateNote()
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
                ->assertSee('Dashboard')   // sesuaikan dengan teks yang ada di halaman dashboa
                ->clickLink('Notes') // klik link create note
                ->assertSee('Create Note') // pastikan halaman create note ada
                ->clickLink('Create Note') // klik tombol create note
                ->type('title', 'My First Note') // masukkan type judul note
                ->type('description', 'This is the description of my first note') // masukkan type deskripsi note
                ->press('CREATE'); // tekan tombol create untuk membuat
        });
    }
}
