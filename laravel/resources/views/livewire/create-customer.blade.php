<div>
    <form wire:submit="save">
        <label for="title">Name:</label>
        <input type="string" id="email" wire:model="name" required>
        <br>
        <label for="title">surname:</label>
        <input type="string" id="Surname" wire:model="surname" required>
        <br>
        <label for="title">Patronymic:</label>
        <input type="string" id="patronymic" wire:model="patronymic" required>


        <br>
        <label for="title">Email:</label>
        <input type="email" id="email" wire:model="email" >

        <br>
        <label for="title">Phone:</label>

        @foreach ($this->phones as $key => $item)
            <input wire:model='phones.{{ $key }}' type="text" />
        @endforeach


        <br>
        <button type="submit">Save</button>
    </form>
</div>
