@extends('layouts.template')

@section('title', 'Registrar vendedor - FerreteriaLibre')

@section('content')

    <div class="container cont-form text-center">
        <form action="{{ route('vendor.store') }}" method="POST">
            @csrf
            <div class="row row-form mb-5">
                <div class="title mb-5 text-uppercase">
                    <h2><i class="fas fa-user-friends"></i> Registro vendedor</h2>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-start">
                    <div class="title mb-3">
                        <h4><i class="fas fa-user-circle"></i> Datos del vendedor</h4>
                    </div>

                    <!-- Por favor no borrar, causará fallo en el sistema -->
                    <input type="text" name="rol" value="Vendedor" required class="d-none">

                    <div>
                        <label for="name">Nombre completo <span class="text-danger" title="Obligatorio">*</span></label>
                        <input class="input-left" type="text" name="name" id="name" value="{{ old('name') }}"
                            autofocus required>
                    </div>
                    <div class="mt-3">
                        <label for="email">Correo electrónico <span class="text-danger" title="Obligatorio">*</span>
                        </label>
                        <input class="input-left" type="email" name="email" id="email" value="{{ old('email') }}"
                            required>
                    </div>
                    <div class="mt-3">
                        <label for="password">Contraseña <span class="text-danger" title="Obligatorio">*</span> </label>
                        <input class="input-left" type="password" name="password" id="password" required>
                    </div>
                    <div class="mt-3">
                        <label for="userId">Identificación (CC, CE, Pasaporte) <span class="text-danger"
                                title="Obligatorio">*</span> </label>
                        <input class="input-left" type="number" name="userId" id="userId" value="{{ old('userId') }}"
                            required>
                    </div>
                    <div class="mt-3">
                        <label for="phone">Teléfono <span class="text-danger" title="Obligatorio">*</span> </label>
                        <input class="input-left" type="tel" name="phone" id="phone" value="{{ old('phone') }}"
                            required>
                    </div>
                    <div class="mt-3">
                        <label for="location">Ubicación <span class="text-danger" title="Obligatorio">*</span> </label>
                        <input class="input-left" type="text" name="location" id="location"
                            value="{{ old('location') }}" required>
                    </div>
                    <div class="mt-3">
                        <label for="birthday">Fecha de Nacimiento <span class="text-danger" title="Obligatorio">*</span>
                        </label>
                        <input class="input-left" type="date" name="birthday" id="birthday" max="2003-06-01"
                            value="{{ old('birthday') }}" required>
                    </div>
                </div>
                <div class="line-x"></div>
                <div class="line-y col-1"></div>
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 text-start">
                    <div class="title mb-3">
                        <h4><i class="fas fa-store"></i> Datos de la tienda (opcional)</h4>
                    </div>
                    <div>
                        <label for="storeId">ID de la tienda</label>
                        <input type="number" name="storeId" id="storeId" value="{{ old('storeId') }}">
                    </div>
                    <div class="mt-3">
                        <label for="nameStore">Nombre de la tienda</label>
                        <input type="text" name="nameStore" id="nameStore" value="{{ old('nameStore') }}">
                    </div>
                    <div class="mt-3">
                        <label for="locationStore">Ubicación de la tienda</label>
                        <input type="text" name="locationStore" id="locationStore" value="{{ old('locationStore') }}">
                    </div>
                    <div class="mt-3">
                        <label for="phoneStore">Teléfono de su local</label>
                        <input type="tel" name="phoneStore" id="phoneStore" value="{{ old('phoneStore') }}">
                    </div>
                    <div class="mt-3">
                        <label for="emailStore">Correo de contacto de su tienda</label>
                        <input type="email" name="emailStore" id="emailStore" value="{{ old('emailStore') }}">
                    </div>
                    <div class="mt-3">
                        <label for="description">Descripción</label>
                        <textarea name="description" id="description" rows="5">{{ old('description') }}</textarea>
                    </div>
                </div>
                <div class="col-12 text-center mt-3">
                    <a class="btn btn-page" href="{{ route('dashboard') }}"><i class="fas fa-arrow-left"></i> Volver</a>
                    <button type="submit" class="mr-5"><i class="far fa-save"></i> Registrar</button>
                </div>
            </div>
        </form>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @error('userId')
                <strong>¡ERROR!</strong> {{ $message }}
                <br>
                @enderror
            @error('name')
                <strong>¡ERROR!</strong> {{ $message }}
                <br>
                @enderror
            @error('email')
                <strong>¡ERROR!</strong> {{ $message }}
                <br>
                @enderror
            @error('password')
                <strong>¡ERROR!</strong> {{ $message }}
                <br>
                @enderror
            @error('phone')
                <strong>¡ERROR!</strong> {{ $message }}
                <br>
                @enderror
            @error('location')
                <strong>¡ERROR!</strong> {{ $message }}
                <br>
                @enderror
            @error('birthday')
                <strong>¡ERROR!</strong> {{ $message }}
                <br>
                @enderror
            @error('storeId')
                <strong>¡ERROR!</strong> {{ $message }}
                <br>
                @enderror
            @error('nameStore')
                <strong>¡ERROR!</strong> {{ $message }}
                <br>
                @enderror
            @error('locationStore')
                <strong>¡ERROR!</strong> {{ $message }}
                <br>
                @enderror
            @error('phoneStore')
                <strong>¡ERROR!</strong> {{ $message }}
                <br>
                @enderror
            @error('emailStore')
                <strong>¡ERROR!</strong> {{ $message }}
                <br>
                @enderror
            @error('description')
                <strong>¡ERROR!</strong> {{ $message }}
            @enderror
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

@endsection
