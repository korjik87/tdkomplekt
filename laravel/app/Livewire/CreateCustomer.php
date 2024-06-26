<?php

namespace App\Livewire;

use App\Enums\FamilyStatusEnum;
use App\Models\AboutMe;
use App\Models\Customer;
use App\Models\CustomerFile;
use App\Models\DateOfBirth;
use App\Models\Email;
use App\Models\FamilyStatus;
use App\Models\Phone;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Renderless;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateCustomer extends Component
{
    use WithFileUploads;

    #[Validate('required')]
    public string $name = '';
    public string $checkbox;
    public string $surname = '';
    public string $patronymic = '';
    public string $email;
    public string $birth;
    public string $status = '';
    public string $about = '';
    public $files = [];
    public array $phones = [''];
    private Customer|null $customer;


    public $title = 'Create сustomer...';

    protected array $rules = [
        'name' => 'required|min:3',
        'surname' => 'required|min:3',
        'patronymic' => 'nullable|min:3',
        'email' => [
            'required_if_accepted:phones',
            'nullable',
            'email'],
        'phones' => ['required_without:email', 'nullable','array','max:5'],
//        'phones' => 'array|max:5',
//        'phones.*' => 'max:20|nullable|distinct|regex:/^\+[1-9]\d{1,14}$/|min:10',
        'phones.*' => ['max:20','nullable','distinct',
            ['regex','/^\+[1-9]\d{1,14}$/'],
            ['min','10']
        ],
        'birth' => 'required|date',
        'about' => 'max:1000',
        "files" => "array|max:5|nullable",
        'files.*' => ['max:5126','mimes:png,jpg,pdf'],
        'checkbox' => 'required|boolean'

    ];

//    #[Renderless]
    public function updated($property)
    {
        $this->validateOnly($property);
    }

//    #[Renderless]
    public function updatedFiles()
    {
        $this->dispatch('updatedFiles');
        $this->validate($this->rules());

        // here you can store immediately on any change of the property
    }

    public function rules(): array {
        $rules = $this->rules;
        $rules['status'] = [Rule::enum(FamilyStatusEnum::class)];

        return $rules;
    }

//    #[Renderless]
    public function addPhone(): void {
        $this->dispatch('contentChangedPhone');
        count($this->phones) < 5? $this->phones[] = '' :'';
    }

    #[Renderless]
    public function save()
    {
        $this->dispatch('saveCustomer');
        $this->validate($this->rules());


        $this->customer = Customer::create($this->only(['name', 'surname', 'patronymic']));

        if($this->customer instanceof Customer) {
            if($this->email) {
                $email =  new Email($this->only(['email']));
                $this->customer->email()->save($email);
            }


            $phones = [];
            foreach ($this->phones as $item) {
                if($item) {
                    $phones[] =  new Phone(['phone' => $item]);
                }
            }
            if($phones) {
                $this->customer->phones()->saveMany($phones);
            }



            foreach ($this->files as $item) {
                (new CustomerFile(['customer_id' => $this->customer->getKey()], $item))->save();
            }

            if($this->about) {
                $about =  new AboutMe($this->only(['about']));
                $this->customer->aboutMe()->save($about);
            }

            if($this->status) {
                $status =  new FamilyStatus($this->only(['status']));
                $this->customer->familyStatus()->save($status);
            }

            if($this->birth) {
                $status =  new DateOfBirth($this->only('birth'));
                $this->customer->dateOfBirth()->save($status);
            }

            $this->dispatch('saveCustomerSuccessfully');
        }


    }

    public function saveTest() {

    }



    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.create-customer');
    }
}
