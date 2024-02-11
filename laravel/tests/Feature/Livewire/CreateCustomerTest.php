<?php

namespace Tests\Feature\Livewire;

use App\Livewire\CreateCustomer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
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
            ->set('surname', fake()->lastName())
            ->set('patronymic', fake()->firstName())
            ->set('phones', [fake()->phoneNumber()])
            ->set('email', fake()->email())
            ->set('birth', fake()->date())
            ->set('about', fake()->text())
            ->set('files', [fake()->image()])
            ->set('checkbox', fake()->boolean)
            ->call('save')
            ->assertHasErrors();


//        Livewire::test(CreateCustomer::class)
//            ->set('name', fake()->firstName())
//            ->set('surname', fake()->lastName())
//            ->set('patronymic', fake()->firstName())
//            ->set('phones', [fake()->phoneNumber()])
//            ->set('email', fake()->email())
//            ->set('birth', fake()->date())
//            ->set('about', fake()->text())
//            ->set('files', [fake()->image()])
//            ->set('checkbox', true)
//            ->call('save')
//            ->assertHasNoErrors();


        $d = Livewire::test(CreateCustomer::class)
            ->set('name', fake()->firstName())
            ->set('surname', fake()->lastName())
            ->set('patronymic', fake()->firstName())
            ->set('phones', [fake()->phoneNumber()])
            ->set('email', fake()->email())
            ->set('birth', fake()->date())
            ->set('about', fake()->text())
            ->set('files', [fake()->image()])
            ->set('checkbox', true)
            ->errors();

//        dump($d);

        $d = Livewire::test(CreateCustomer::class)
            ->set('name', fake()->firstName())
            ->set('surname', fake()->lastName())
            ->set('patronymic', fake()->firstName())
            ->set('phones', [fake()->phoneNumber()])
            ->set('email', fake()->email())
            ->set('birth', fake()->date())
            ->set('about', fake()->text())
            ->set('files', [fake()->image()])
            ->set('checkbox', true)
            ->call('save')
            ->errors();


        dump($d);

    }

    /** @test */
    public function can_upload_photo()
    {

        $file = fake()->image(storage_path("app/fake_avatars"));
        dump($file);

        $l = Livewire::test(CreateCustomer::class)
            ->set('name', fake()->firstName())
            ->set('surname', fake()->lastName())
            ->set('files', [$file])
            ->call('save');

        dump($l->errors());

//        Storage::disk('app/datafake_avatars')->assertExists('uploaded-avatar.png');
    }
}
