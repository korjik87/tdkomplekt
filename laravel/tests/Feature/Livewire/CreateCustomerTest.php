<?php

namespace Tests\Feature\Livewire;

use App\Livewire\CreateCustomer;
use Illuminate\Http\UploadedFile;
use Livewire\Features\SupportTesting\Testable;
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
    public function can_set()
    {
        // name
        $name = fake()->firstName();
        Livewire::test(CreateCustomer::class)
            ->set('name', $name)
            ->assertSet('name', $name);

        Livewire::test(CreateCustomer::class)
            ->set('name', $name)
            ->assertNotSet('name', fake()->firstName());

        //surname
        $surname = fake()->lastName();
        Livewire::test(CreateCustomer::class)
            ->set('surname', $surname)
            ->assertSet('surname', $surname);

        Livewire::test(CreateCustomer::class)
            ->set('surname', $surname)
            ->assertNotSet('surname', fake()->lastName());

        //patronymic
        $patronymic = fake()->lastName();
        Livewire::test(CreateCustomer::class)
            ->set('patronymic', $patronymic)
            ->assertSet('patronymic', $patronymic);

        Livewire::test(CreateCustomer::class)
            ->set('patronymic', $patronymic)
            ->assertNotSet('patronymic', fake()->lastName());


        //email
        $email = fake()->email();
        Livewire::test(CreateCustomer::class)
            ->set('email', $email)
            ->assertSet('email', $email);

        Livewire::test(CreateCustomer::class)
            ->set('email', $email)
            ->assertNotSet('email', fake()->email());


        //phones
        $phones = fake()->phoneNumber();
        $phones2 = fake()->phoneNumber();
        Livewire::test(CreateCustomer::class)
            ->set('phones', [$phones, $phones2])
            ->assertSet('phones', [$phones, $phones2]);

        Livewire::test(CreateCustomer::class)
            ->set('phones', [$phones])
            ->assertNotSet('phones', [$phones2]);


        //files
        $files = fake()->image();
        $files2 = fake()->image();
        Livewire::test(CreateCustomer::class)
            ->set('files', [$files, $files2])
            ->assertSet('files', [$files, $files2]);

        Livewire::test(CreateCustomer::class)
            ->set('files', [$files])
            ->assertNotSet('files', [$files2]);



        //birth
        $date = fake()->date();
        Livewire::test(CreateCustomer::class)
            ->set('birth', $date)
            ->assertSet('birth', $date);

        Livewire::test(CreateCustomer::class)
            ->set('birth', $date)
            ->assertNotSet('birth', fake()->date());


        //checkbox
        Livewire::test(CreateCustomer::class)
            ->set('checkbox', true)
            ->assertSet('checkbox', true);

        Livewire::test(CreateCustomer::class)
            ->set('checkbox', true)
            ->assertNotSet('checkbox', false);


    }


    /** @test */
    public function check_validation_blank()
    {



//        $this->blank()
//            ->call('save')
//            ->assertHasErrors();

    }


    /** @test */
    public function check_validation_blank_phone()
    {


        $this->fakerValidWithPhone()
            ->call('save')
            ->assertHasNoErrors();


        $this->fakerValidWithPhone()
            ->call('save')
            ->set('phones', [fake()->e164PhoneNumber(), fake()->e164PhoneNumber()])
            ->assertHasNoErrors();

        $this->fakerValidWithPhone()
            ->call('save')
            ->set('phones', [fake()->e164PhoneNumber(), fake()->e164PhoneNumber(), fake()->e164PhoneNumber()])
            ->assertHasNoErrors();

        $this->fakerValidWithPhone()
            ->call('save')
            ->set('phones', [fake()->e164PhoneNumber(), fake()->e164PhoneNumber(), fake()->e164PhoneNumber(), fake()->e164PhoneNumber()])
            ->assertHasNoErrors();


        $this->fakerValidWithPhone()
            ->call('save')
            ->set('phones', [fake()->e164PhoneNumber(), fake()->e164PhoneNumber(), fake()->e164PhoneNumber(),
                fake()->e164PhoneNumber(), fake()->e164PhoneNumber()])
            ->assertHasNoErrors();

        $this->fakerValidWithPhone()
            ->call('save')
            ->set('phones', [fake()->e164PhoneNumber(), null, fake()->e164PhoneNumber(),
                fake()->e164PhoneNumber(), fake()->e164PhoneNumber()])
            ->assertHasNoErrors();


// not worked
//        $this->fakerValidWithPhone()
//            ->call('save')
//            ->set('phones', ['test', null, fake()->e164PhoneNumber(),
//                fake()->e164PhoneNumber(), fake()->e164PhoneNumber()])
//            ->assertHasErrors();


        $this->fakerValidWithPhone()
            ->call('save')
            ->set('phones', [fake()->e164PhoneNumber(), fake()->e164PhoneNumber(), fake()->e164PhoneNumber(),
                fake()->e164PhoneNumber(), fake()->e164PhoneNumber(), fake()->e164PhoneNumber()])
            ->assertHasErrors();


    }


    /** @test */
    public function check_validation_blank_email()
    {

//        dump($this->fakerValidWithEmail()
//            ->call('save')->errors());

        $this->fakerValidWithEmail()
            ->call('save')
            ->assertHasNoErrors();


        $this->fakerValidWithEmail()
            ->set('email', fake()->firstName())
            ->call('save')
            ->assertHasErrors();


    }


        /** @test */
    public function can_set_birth()
    {


        $this->fakerValidWithEmail()
            ->set('birth', 'test')
            ->call('save')
            ->assertHasErrors();

    }


    /** @test */
    public function can_upload_photo()
    {

        $file1 =  UploadedFile::fake()->image('image_1.jpg');
        $file2 = UploadedFile::fake()->image('image_2.png');
        $file3 = UploadedFile::fake()->image('image_3.pdf');
        $file4 = UploadedFile::fake()->image('image_4.jpg');
        $file5 = UploadedFile::fake()->image('image_5.jpg');
        $file6 = UploadedFile::fake()->image('image_6.jpg');

//        dump($file);






        $this->fakerValidWithEmail()
            ->set('files', [$file1])
            ->call('save')
            ->assertHasNoErrors();


        $this->fakerValidWithEmail()
            ->set('files', [$file1, $file2])
            ->call('save')
            ->assertHasNoErrors();

        $this->fakerValidWithEmail()
            ->set('files', [$file1, $file2, $file3])
            ->call('save')
            ->assertHasNoErrors();


        $this->fakerValidWithEmail()
            ->set('files', [$file1, $file2, $file3, $file4])
            ->call('save')
            ->assertHasNoErrors();


        $this->fakerValidWithEmail()
            ->set('files', [$file1, $file2, $file3, $file4, $file5])
            ->call('save')
            ->assertHasNoErrors();



        $this->fakerValidWithEmail()
            ->set('files', [$file1, $file2, $file3, $file4, $file5, $file6])
            ->call('save')
            ->assertHasErrors();




//        Storage::disk('app/datafake_avatars')->assertExists('uploaded-avatar.png');
    }


    public function blank(): Testable
    {
        return Livewire::test(CreateCustomer::class)
            ->set('name', fake()->firstName())
            ->set('surname', fake()->lastName())
            ->set('birth', fake()->date())
            ->set('checkbox', true)
            ->set('about', fake()->text());
    }

    public function fakerValidWithPhone(): Testable
    {

        $p = fake()->e164PhoneNumber();

//        dump($p);
        return $this->blank()
            ->set('phones', [$p]);

    }

    public function fakerValidWithEmail(): Testable
    {
        return $this->blank()
            ->set('email', fake()->email());

    }
}
