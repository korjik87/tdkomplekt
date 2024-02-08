<?php

namespace App\Livewire;

use App\Enums\FamilyStatusEnum;
use App\Models\Customer;
use App\Models\Email;
use App\Models\Phone;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CreateCustomer extends Component
{

    public string $name;
    public string $surname;
    public string $patronymic;
    public string $email;
    public string $birth;
    public string $status;
    public array $phones = ['', ''];


    protected array $rules = [
        'name' => 'required|min:6',
        'surname' => 'required|min:6',
        'patronymic' => 'required|min:6',
        'email' => 'email:rfc',
        'phones' => 'array',
        'birth' => 'date',
    ];

    public function rules(): array {
        $rules = $this->rules;
        $rules['status'] = [Rule::enum(FamilyStatusEnum::class)];
        return $rules;
    }

    public function save()
    {
        $this->validate($this->rules());


        $customer = Customer::create([
            'name' => $this->name,
            'surname' => $this->surname,
            'patronymic' => $this->patronymic
        ]);

        if($this->email) {
            $email =  new Email(['email' =>$this->email]);
            $customer->email()->save($email);
        }



        foreach ($this->phones as $item) {
            if($item) {
                $phone =  new Phone(['phone' =>$item]);
                $customer->phone()->save($phone);
            }
        }




//        return redirect()->to('/customer')
//            ->with('status', 'Успешно');
    }



    public function render()
    {
        return view('livewire.create-customer');
    }
}
