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
    public function can_set_inputs()
    {
        $name = fake()->firstName();
        Livewire::test(CreateCustomer::class)
            ->set('name', $name)
            ->assertSet('name', $name);

        Livewire::test(CreateCustomer::class)
            ->set('name', $name)
            ->assertNotSet('name', fake()->firstName());

    }

    /** @test */
    public function check_validation_rules()
    {


        Livewire::test(CreateCustomer::class)
            ->set('name', fake()->firstName())
            ->call('save')
            ->assertHasErrors();
    }
}
