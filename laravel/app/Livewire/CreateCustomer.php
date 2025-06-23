<?php

namespace App\Livewire;

use App\Enums\FamilyStatusEnum;
use App\Models\{AboutMe, Customer, CustomerFile, DateOfBirth, Email, FamilyStatus, Phone};
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateCustomer extends Component
{
    use WithFileUploads;

    // Основные данные
    public string $name = '';
    public string $surname = '';
    public string $patronymic = '';
    public string $checkbox;

    // Контактная информация
    public string $email = '';
    public string $birth = '';
    public string $status = '';
    public string $about = '';
    public array $files = [];
    public array $phones = [''];

    public string $title = 'Create customer...';

    public function rules(): array
    {
        return [
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            'patronymic' => 'nullable|min:3',
            'checkbox' => 'required|boolean',
            'email' => [
                Rule::requiredIf(empty(array_filter($this->phones))),
                'nullable',
                'email'
            ],
            'birth' => 'required|date',
            'status' => [Rule::enum(FamilyStatusEnum::class)],
            'about' => 'nullable|max:1000',
            'files' => 'array|max:5',
            'files.*' => 'max:5126|mimes:png,jpg,pdf',
            'phones' => ['required_without:email', 'array', 'max:5'],
            'phones.*' => [
                'nullable',
                'distinct',
                'min:10',
                'max:20',
                'regex:/^\+[1-9]\d{1,14}$/'
            ],
        ];
    }

    public function addPhone(): void
    {
        if (count($this->phones) < 5) {
            $this->phones[] = '';
            $this->dispatch('phone-field-added');
        }
    }

    public function save(): void
    {
        $this->validate();

        DB::transaction(function () {
            $customer = Customer::create([
                'name' => $this->name,
                'surname' => $this->surname,
                'patronymic' => $this->patronymic,
            ]);

            $this->saveContactInfo($customer);
            $this->saveAdditionalInfo($customer);
            $this->handleFiles($customer);
        });

        $this->dispatch('customer-created');
        $this->resetForm();
    }

    protected function saveContactInfo(Customer $customer): void
    {
        if ($this->email) {
            $customer->email()->save(new Email(['email' => $this->email]));
        }

        $phones = array_filter($this->phones);
        if (!empty($phones)) {
            $customer->phones()->saveMany(
                collect($phones)->map(fn ($phone) => new Phone(['phone' => $phone]))
            );
        }
    }

    protected function saveAdditionalInfo(Customer $customer): void
    {
        $customer->dateOfBirth()->save(new DateOfBirth(['birth' => $this->birth]));

        if ($this->status) {
            $customer->familyStatus()->save(new FamilyStatus(['status' => $this->status]));
        }

        if ($this->about) {
            $customer->aboutMe()->save(new AboutMe(['about' => $this->about]));
        }
    }

    protected function handleFiles(Customer $customer): void
    {
        foreach ($this->files as $file) {
            $path = $file->store('customer_files', 'public');
            $customer->files()->create(['path' => $path]);
        }
    }

    protected function resetForm(): void
    {
        $this->reset([
            'name', 'surname', 'patronymic', 'email', 'birth',
            'status', 'about', 'files', 'phones'
        ]);
        $this->phones = [''];
    }

    public function render(): View
    {
        return view('livewire.create-customer');
    }
}
