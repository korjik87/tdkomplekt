<?php

namespace Tests\Feature\Livewire;

use App\Livewire\CreateCustomer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CreateCustomerTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(CreateCustomer::class)
            ->assertStatus(200);
    }

    /** @test */
    public function can_set_name()
    {
        Livewire::test(CreateCustomer::class)
            ->set('name', 'Sergey')
            ->assertSet('name', 'Sergey');

//        Livewire::test(CreateCustomer::class)
//            ->set('name', 'Sergey')
//            ->call('submit');
    }
}
