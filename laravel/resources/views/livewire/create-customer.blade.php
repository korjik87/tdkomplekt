<div>
    <form wire:submit.prevent="save">
        <label for="title">Name:</label>
        <input type="string" id="email" wire:model="name">
        <div>@error('name') {{ $message }} @enderror</div>
        <br>
        <label for="title">surname:</label>
        <input type="string" id="surname" wire:model="surname">
        <div>@error('surname') {{ $message }} @enderror</div>
        <br>
        <label for="title">Patronymic:</label>
        <input type="string" id="patronymic" wire:model="patronymic">
        <div>@error('patronymic') {{ $message }} @enderror</div>
        <br>
        <label for="title">Email:</label>
        <input type="email" id="email" wire:model="email" >
        <div>@error('email') {{ $message }} @enderror</div>
        <br>
        <label for="title">Birth:</label>
        <input type="text" id="birth" wire:model="birth" >
        <div>@error('birth') {{ $message }} @enderror</div>
        <br>
        <label for="title">Status:</label>


        <select wire:model="status">
            <option value="none">None</option>
            @foreach(\App\Enums\FamilyStatusEnum::forSelect() as $name)
                <option value="{{$name}}">{{$name}}</option>
            @endforeach
        </select>


        <div>Status @json($status)</div>
        <div>@error('status') {{ $message }} @enderror</div>
        <br>
        <label for="title">Phone:</label>
        @foreach ($this->phones as $key => $item)
            <input wire:model='phones.{{ $key }}' type="text" />
            <div>@error('phones.' .  $key ) {{ $message }} @enderror</div>
        @endforeach


        <br>
        <button type="submit">Save</button>
    </form>
</div>
