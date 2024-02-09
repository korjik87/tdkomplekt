<div class="container my-2">
    <div class="row">
        <div class="col-xl-6 m-auto">
            <form wire:submit="save" x-data="{ submit: false, about: '{{$about}}', surname: '{{$surname}}', patronymic: '{{$patronymic}}', email: '{{$email}}'}">
                <div class="card shadow">
                    <div class="card-body">

                        {{--  name --}}
                        <div class="form-group">
                            <label for="name">name</label>
                            <input  type="text" id="name" wire:model="name" placeholder="name" aria-describedby="name-error" aria-required="true" @error('name') aria-invalid="true" @enderror class="form-control @error('name') is-invalid @enderror">
                            {{-- Display name validation error message --}}
                            @error('name')
                            <span id="name-error" class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>




                        {{-- surname --}}
                        <div class="form-group">
                            <label for="surname">surname</label>
                            <input  type="text" id="surname" wire:model="surname" placeholder="surname" aria-describedby="surname-error" aria-required="true" @error('surname') aria-invalid="true" @enderror class="form-control @error('surname') is-invalid @enderror">
                            {{-- Display name validation error message --}}
                            @error('surname')
                            <span id="surname-error" class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>




                        {{-- patronymic --}}
                        <div class="form-group">
                            <label for="patronymic">patronymic</label>
                            <input  type="text" id="patronymic" wire:model="patronymic" placeholder="patronymic" aria-describedby="patronymic-error" aria-required="true" @error('patronymic') aria-invalid="true" @enderror class="form-control @error('patronymic') is-invalid @enderror">
                            {{-- Display name validation error message --}}
                            @error('patronymic')
                            <span id="patronymic-error" class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>




                        {{-- email --}}
                        <div class="form-group">
                            <label for="email">email</label>
                            <input  type="email" id="email" wire:model="email" placeholder="email" aria-describedby="email-error" aria-required="true" @error('email') aria-invalid="true" @enderror class="form-control @error('email') is-invalid @enderror">
                            {{-- Display name validation error message --}}
                            @error('email')
                            <span id="email-error" class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        {{-- phones --}}
                        <div class="form-group">
                            <label >phone: </label><button type="button" class="btn btn-secondary btn-sm" wire:click="addPhone" id="add">+</button>
                            @foreach ($this->phones as $key => $item)
                            <div>
                                <input  type="tel" id="phones{{ $key }}" wire:model="phones.{{ $key }}" placeholder="phone {{ $key }}" aria-describedby="phones.{{ $key }}-error" aria-required="true" @error('phones.'. $key ) aria-invalid="true" @enderror class="form-control @error('phones.'. $key ) is-invalid @enderror">
                            </div>
                            @error('phones.' .  $key)
                            <span id="phones.{{ $key }}-error" class="text-danger">{{ $message }}</span>
                            @enderror
                            @endforeach
                        </div>
                        <script>
                            const options = {
                                onlyCountries: ["ru", "by"],
                                utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@19.2.16/build/js/utils.js",
                            };
                            function initPhone() {
                                setTimeout(() => document.querySelectorAll("#phones0, #phones1, #phones2, #phones3, #phones4")
                                    .forEach(e => window.intlTelInput(e, options)), 0);
                            }
                            initPhone();
                            window.addEventListener('contentChangedPhone', initPhone);
                            window.addEventListener('saveCustomer', initPhone);
                        </script>




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
                            <input type="date" id="birth" wire:model="birth" placeholder="birth" aria-describedby="birth-error" aria-required="true" @error('birth') aria-invalid="true" @enderror class="form-control @error('birth') is-invalid @enderror">
                            {{-- Display name validation error message --}}
                            @error('birth')
                            <span id="birth-error" class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        {{-- files --}}
                        <div class="form-group">
                            <label for="files">files</label>
                            <input wire:model="files" type="file" id="files" accept="image/png, image/jpeg, application/pdf" multiple  placeholder="files" aria-describedby="files-error" aria-required="true" @error('files') aria-invalid="true" @enderror class="form-control @error('files') is-invalid @enderror">
                            {{-- Display name validation error message --}}
                            @error('files')
                            <span id="files-error" class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>







                        <div class="form-group">
                            <label for="about">about</label>
                            <textarea  x-model="about" rows="7" id="about"  wire:model="about" onkeydown="return limitLines(this, event)" placeholder="about" aria-describedby="about-error" aria-required="true" @error('about') aria-invalid="true" @enderror class="form-control @error('about') is-invalid @enderror"></textarea>
                            {{-- Display name validation error message --}}
                            @error('about')
                            <span id="about-error" class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <script>

                            function ihitAbout() {
                                setTimeout(() => {
                                        const about = document.getElementById('about');
                                        let maxHeight = about.getBoundingClientRect().height;
                                        about.style.maxHeight  = maxHeight + 'px';
                                        about.rows  = 2;
                                    }
                                )
                            }

                            ihitAbout();
                            window.addEventListener('saveCustomer', ihitAbout);


                            function limitLines(obj, e) {
                                let keynum, lines = obj.value.split('\n').length;

                                // IE
                                if(window.event) {
                                    keynum = e.keyCode;
                                    // Netscape/Firefox/Opera
                                } else if(e.which) {
                                    keynum = e.which;
                                }

                                if(keynum === 13 && lines === 7) {
                                    return false;
                                }
                            }

                        </script>


                        <div class="form-check">
                            <input x-model="submit" class="form-check-input" type="checkbox" value="" id="checkbox" wire:model="checkbox" aria-describedby="checkbox-error" aria-required="true" @error('checkbox') aria-invalid="true" @enderror class="form-control @error('checkbox') is-invalid @enderror">
                            <label class="form-check-label" for="checkbox">
                                Я ознакомился c правилами
                            </label>
                            @error('checkbox')
                            <br>
                            <span id="checkbox-error" class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <br>
                        <div class="form-group mb-2">
                            <button type="submit" class="btn btn-primary" x-bind:disabled="!submit">Submit</button>
                        </div>

                    </div>
                </div>



            </form>
        </div>
    </div>
</div>
