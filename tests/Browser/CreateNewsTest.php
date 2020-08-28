<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshMigrations;

class CreateNewsTest extends DuskTestCase
{
    public function testNewsForm()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/create')
                    ->type('news-name', 'Test')
                    ->type('news-text', 'Text test')
                    ->press('Отправить')
                    ->assertPathIs('/admin')
                    ->assertSee('Новость успешно добавлена');
        });
    }
}
