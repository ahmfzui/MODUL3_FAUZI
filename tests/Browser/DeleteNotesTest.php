<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DeleteNotesTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @group deletenote
     */

    public function testDeleteNote()
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
                ->assertPathIs('/notes') // pastikan berada di halaman notes
                ->assertSee('Create Note') // pastikan halaman create note ada
                ->clickLink('Create Note') // klik tombol create note
                ->type('title', 'My First Note') // masukkan type judul note
                ->type('description', 'This is the description of my first note') // masukkan type deskripsi note
                ->press('CREATE') // tekan tombol create untuk membuat
                ->assertPathIs('/notes') // pastikan berada di halaman notes
                ->assertSee('My First Note') // pastikan note berhasil dibuat
                ->click('@edit-1') // klik tombol edit note pertama
                ->assertPathIs('/edit-note-page/1') // pastikan berada di halaman edit note
                ->type('title', 'My First Edited Note') // masukkan type judul note
                ->type('description', 'This is the description of my first edited note') // masukkan type deskripsi note
                ->press('UPDATE') // tekan tombol update untuk memperbarui
                ->assertPathIs('/notes') // pastikan berada di halaman notes
                ->assertSee('My First Edited Note') // pastikan note berhasil diedit
                ->click('#delete-1') // klik tombol delete note pertama
                ->assertPathIs('/notes'); // pastikan berada di halaman notes
        });
    }
}
