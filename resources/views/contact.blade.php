<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}">
                <i class="fas fa-arrow-left"></i>
            </a> &nbsp; &nbsp;
            {{ __('Contactanos') }}
        </h2>
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
        </h2> --}}
    </x-slot>


    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-5 mx-5">
        <div class="container">
            <div class="row mt-3">
                <div class="col-lg-6">
                    <p class="my-5">Si tuviste algún problema con el sistema, o si quieres que alguien te contacte, por favor escríbenos.</p>
                </div>
                <div class="col-lg-6">
                    <form class="my-5" action="{{ route('sendMail') }}" method="POST">
                        @csrf
                        <input type="text" style="display: none" data-type="text" name="page" value="Contacto WEB: FerreteriaLibre"
                                class="required">
                        <div class="form-group mb-3">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" value="{{ old('name') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Correo</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Correo" value="{{ old('email') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone">Teléfono</label>
                            <input type="tel" class="form-control" name="phone" id="phone" placeholder="Correo" value="{{ old('phone') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="msg">Mensaje</label>
                            <textarea name="msg" id="msg" cols="30" rows="10" class="">{{ old('msg') }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <input type="checkbox" name="account" id="account" value="si">
                            <label for="account">¿Tiene cuenta en la plataforma?</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Enviar</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        @error('name')
            <strong>¡ERROR!</strong> {{ $message }}
            <br>
        @enderror
        @error('email')
            <strong>¡ERROR!</strong> {{ $message }}
            <br>
        @enderror
        @error('phone')
            <strong>¡ERROR!</strong> {{ $message }}
            <br>
        @enderror
        @error('msg')
            <strong>¡ERROR!</strong> {{ $message }}
            <br>
        @enderror
        @error('account')
            <strong>¡ERROR!</strong> {{ $message }}
            <br>
        @enderror
        <strong>NO se ha registrado tu producto</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
