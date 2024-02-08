<?php

namespace App\Livewire;

use App\Enums\FamilyStatusEnum;
use App\Models\Customer;
use App\Models\Email;
use App\Models\Phone;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateCustomer extends Component
{
    use WithFileUploads;

    #[Validate('required')]
    public string $name;
    public string $surname;
    public string $patronymic;
    public string $email;
    public string $birth;
    public string $status;
    public string $about;
//    #[Validate(['files.*' => 'required|max:5|file|size:5126|mimes:png,jpg,pdf'])]
    public $files = [];
    public array $phones = [''];


    public $title = 'Create сustomer...';

    protected array $rules = [
        'name' => 'required|min:6',
        'surname' => 'required|min:6',
        'patronymic' => 'required|min:6',
        'email' => 'email:rfc',
        'phones' => 'array|max:5',
        'birth' => 'date',
        'about' => 'max:1000',
//        'files.*' => 'file|mimes:png,jpg,pdf|max:102400'
        'files.*' => 'required|max:5|file|size:5126|mimes:png,jpg,pdf'

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
                $customer->phones()->save($phone);
            }
        }




//        return redirect()->to('/customer')
//            ->with('status', 'Успешно');
    }



    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.create-customer');
    }
}
