<?php

namespace App\Livewire;

use App\Models\Customer;
use App\Models\Email;
use App\Models\Phone;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CreateCustomer extends Component
{


    #[Rule('required|min:3')]
    public string $name;
    #[Rule('required|min:3')]
    public string $surname;
    #[Rule('required|min:3')]
    public string $patronymic;

    #[Rule('email:rfc')]
    public string $email;

    #[Rule('array')]
    public array $phones = ['', ''];

    public function save()
    {
//        $customer = Customer::create([
//            'email' => $this->email
//        ]);

        $customer = Customer::create([
            'name' => $this->name,
            'surname' => $this->surname,
            'patronymic' => $this->patronymic
        ]);

        $email =  new Email(['email' =>$this->email]);
        $customer->email()->save($email);


        foreach ($this->phones as $item) {
            $phone =  new Phone(['phone' =>$item]);
            $customer->phone()->save($phone);
        }




//        return redirect()->to('/customer')
//            ->with('status', 'Успешно');
    }



    public function render()
    {
        return view('livewire.create-customer');
    }
}
