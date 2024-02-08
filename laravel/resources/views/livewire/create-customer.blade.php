<div class="container my-2">
    <div class="row">
        <div class="col-xl-6 m-auto">
            <form wire:submit.prevent="save">

                <div class="card shadow">
                    <div class="card-body">

                        {{-- name, surname, patronymic, email --}}

                        @foreach([['name' => 'name', 'type' => 'text'], ['name' => 'surname', 'type' => 'text'],
['name' => 'patronymic', 'type' => 'text'], ['name' => 'email', 'type' => 'email'], ] as $name)

                        <div class="form-group">
                            <label for="{{$name['name']}}">{{$name['name']}}</label>
                            <input type="{{$name['type']}}" id="{{$name['name']}}" wire:model="{{$name['name']}}" placeholder="{{$name['name']}}" aria-describedby="{{$name['name']}}-error" aria-required="true" @error($name['name']) aria-invalid="true" @enderror class="form-control @error($name['name']) is-invalid @enderror">
                            {{-- Display name validation error message --}}
                            @error($name['name'])
                            <span id="{{$name['name']}}-error" class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        @endforeach

                        {{-- phones --}}
                        @foreach ($this->phones as $key => $item)
                        <div class="form-group">
                            <label for="phones{{ $key }}">phone:</label>
                            <input type="text" id="phones.{{ $key }}" wire:model="phones.{{ $key }}" placeholder="phone {{ $key }}" aria-describedby="phones.{{ $key }}-error" aria-required="true" @error('phones.'. $key ) aria-invalid="true" @enderror class="form-control @error('phones.'. $key ) is-invalid @enderror">
                            @error('phones.' .  $key)
                            <span id="phones{{ $key }}-error" class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @endforeach



                        {{-- status --}}
                        <div class="form-group">
                            <label for="status">status:</label>
                            <select class="form-select" id="status" aria-label="Default select example" wire:model="status" name="status">
                                <option value="none">None</option>
                                @foreach(\App\Enums\FamilyStatusEnum::forSelect() as $name)
                                    <option value="{{$name}}">{{$name}}</option>
                                @endforeach
                            </select>
                        </div>





                        {{-- birth --}}
                        <div class="form-group">
                            <label for="birth">birth</label>
                            <input type="text" id="birth" wire:model="birth" placeholder="birth" aria-describedby="birth-error" aria-required="true" @error('birth') aria-invalid="true" @enderror class="form-control @error('birth') is-invalid @enderror">
                            {{-- Display name validation error message --}}
                            @error('birth')
                            <span id="birth-error" class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        {{-- files --}}
                        <div class="form-group">
                            <label for="files">birth</label>
                            <input type="file" id="files" accept="image/png, image/jpeg, application/pdf" multiple wire:model="files" placeholder="files" aria-describedby="files-error" aria-required="true" @error('files') aria-invalid="true" @enderror class="form-control @error('files') is-invalid @enderror">
                            {{-- Display name validation error message --}}
                            @error('files')
                            <span id="files-error" class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>







                        <div class="form-group">
                            <label for="about">about</label>
                            <textarea wire:model="about" placeholder="about" aria-describedby="about-error" aria-required="true" @error('about') aria-invalid="true" @enderror class="form-control @error('about') is-invalid @enderror"></textarea>
                            {{-- Display name validation error message --}}
                            @error('about')
                            <span id="about-error" class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <br>
                        <div class="form-group mb-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </div>
                </div>



            </form>
        </div>
    </div>
</div>
