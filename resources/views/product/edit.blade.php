<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}">
                <i class="fas fa-arrow-left"></i>
            </a> &nbsp; &nbsp;
            {{ __('Editar producto') }}
        </h2>
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
        </h2> --}}
    </x-slot>

    <div class="container bg-white mt-5 bloque">
        <form action="{{ route('actualizar-producto', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row p-3">
                <h2 class="titulo text-gray-800 leading-tight mb-3">
                    {{ $product->id }} - {{ $product->name }} -
                    @if (!$product->state)
                        <span>Inactivo</span>
                    @endif
                </h2>

                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 gallery">
                    <div class="fachada">
                        @if (file_exists(public_path() . $product->photo_path))
                            <a href="{{ asset($product->photo_path) }}">
                                <img class="mt-3 mb-3" src="{{ asset($product->photo_path) }}" alt="">
                            </a>
                        @else
                            <img class="mt-3 mb-3" src="{{ asset('images/products/404.png') }}" alt="">
                        @endif
                        <div class="mb-5">
                            <label for="photo">Portada del producto</label>
                            <input type="file" name="photo" id="photo">
                        </div>
                    </div>
                    <div class="portadas">
                        <div class="row">
                            <h2>Imágenes del producto</h2>
                            <div class="col-4 mb-3">
                                @if (file_exists(public_path() . $product->portada1))
                                    <a href="{{ asset($product->portada1) }}">
                                        <img src="{{ asset($product->portada1) }}" alt="" width="100%">
                                    </a>
                                @else
                                    <img src="{{ asset('images/products/404.png') }}" alt="">
                                @endif
                            </div>
                            <div class="col-4">
                                @if (file_exists(public_path() . $product->portada2))
                                    <a href="{{ asset($product->portada2) }}">
                                        <img src="{{ asset($product->portada2) }}" alt="" width="100%">
                                    </a>
                                @endif
                            </div>
                            <div class="col-4">
                                @if (file_exists(public_path() . $product->portada3))
                                    <a href="{{ asset($product->portada3) }}">
                                        <img src="{{ asset($product->portada3) }}" alt="" width="100%">
                                    </a>
                                @endif
                            </div>
                        </div>

                        {{-- <div class="mb-3">
                            <label for="portada1">Imagen 1</label>
                            <input type="file" name="portada1" id="portada1">
                        </div>
                        <div class="mb-3">
                            <label for="portada2">Imagen 2</label>
                            <input type="file" name="portada2" id="portada2">
                        </div>
                        <div class="mb-5">
                            <label for="portada3">Imagen 3</label>
                            <input type="file" name="portada3" id="portada3">
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">

                    <div class="mt-3 mb-3">
                        <label for="name">Nombre *</label>
                        <input type="text" name="name" id="name" value="{{ $product->name }}" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="category">Categoria *</label><br>
                        <select class="w-100" name="category" id="category">
                            <option value="manual">Manuales</option>
                            <option value="electrico">Eléctrico</option>
                            <option value="no_manual">No manual</option>
                            <option value="agricola">Agricola</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description">Descripción *</label>
                        <textarea name="description" id="description" cols="30"
                            rows="5">{{ $product->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="size">Tamaño</label>
                        <input type="text" name="size" id="size" value="{{ $product->size }}">
                    </div>
                    <div class="mb-3">
                        <label for="price">Precio *</label>
                        <input type="number" name="price" id="price" value="{{ $product->price }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="stock">Cantidad disponible *</label>
                        <input type="number" name="stock" id="stock" value="{{ $product->stock }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="state">Estado del producto *</label>
                        <select class="w-100" name="state" id="state">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                        @if (!$product->state)
                            <i class="text-danger">El producto está <strong>inactivo</strong>, los demás usuarios no podrán ver el producto, solo usted.</i>
                        @endif
                    </div>
                    @if (Auth::user()->storeId)
                        <div class="mb-3">
                            <label for="store-id">ID de la tienda *</label>
                            <input type="number" name="store-id" id="store-id" value="{{ Auth::user()->storeId }}"
                                disabled>
                            <input type="number" name="storeId" id="storeId" value="{{ Auth::user()->storeId }}"
                                class="d-none">
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="vendor-id">ID del vendedor *</label>
                        <input type="number" name="vendor-id" id="vendor-id" value="{{ Auth::user()->userId }}"
                            disabled>
                        <input type="number" name="vendorId" id="vendorId" value="{{ Auth::user()->userId }}"
                            class="d-none">
                    </div>
                    <div class="mb-3">
                        <i>* Campos obligatorios</i>
                    </div>
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-check"></i>&nbsp;
                            Actualizar producto
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            </div>
            <form class="col-lg-8 col-md-6 col-sm-12 col-xs-12" action="{{ route('eliminar-producto', $product) }}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-danger w-100 mb-5" type="submit">
                    <i class="fas fa-trash"></i> Eliminar producto
                </button>
            </form>
        </div>
        
    </div>
</x-app-layout>

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        @error('name')
            <strong>¡ERROR!</strong> {{ $message }}
            <br>
        @enderror
        @error('category')
            <strong>¡ERROR!</strong> {{ $message }}
            <br>
        @enderror
        @error('description')
            <strong>¡ERROR!</strong> {{ $message }}
            <br>
        @enderror
        @error('size')
            <strong>¡ERROR!</strong> {{ $message }}
            <br>
        @enderror
        @error('price')
            <strong>¡ERROR!</strong> {{ $message }}
            <br>
        @enderror
        @error('stock')
            <strong>¡ERROR!</strong> {{ $message }}
            <br>
        @enderror
        @error('vendorId')
            <strong>¡ERROR!</strong> {{ $message }}
            <br>
        @enderror
        @error('storeId')
            <strong>¡ERROR!</strong> {{ $message }}
            <br>
        @enderror
        @error('photo')
            <strong>¡ERROR!</strong> {{ $message }}
            <br>
        @enderror
        @error('portada1')
            <strong>¡ERROR!</strong> {{ $message }}
            <br>
        @enderror
        @error('portada2')
            <strong>¡ERROR!</strong> {{ $message }}
            <br>
        @enderror
        @error('portada3')
            <strong>¡ERROR!</strong> {{ $message }}
            <br>
        @enderror
        <strong>NO se ha registrado tu producto</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
