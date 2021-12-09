<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}">
                <i class="fas fa-arrow-left"></i>
            </a> &nbsp; &nbsp;
            {{ __('Producto') }}
        </h2>
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
        </h2> --}}
    </x-slot>

    <div class="container bg-white mt-5 bloque">
        <div class="row p-3">
            <h2 class="precio text-gray-800 leading-tight mb-3">{{ $product->name }}</h2>

            <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner gallery">
                        <div class="carousel-item active">
                            @if (file_exists(public_path() . $product->portada1))
                                <a href="{{ $product->portada1 }}">
                                    <img src="{{ $product->portada1 }}" class="d-block w-100" alt="...">
                                </a>

                            @else
                                <img src="{{ asset('images/products/404.png') }}" class="d-block w-100" alt="...">
                            @endif
                        </div>
                        @if (file_exists(public_path() . $product->portada2))
                            <div class="carousel-item">
                                <a href="{{ asset($product->portada2) }}">
                                    <img src="{{ asset($product->portada2) }}" class="d-block w-100" alt="">
                                </a>

                            </div>
                        @endif
                        @if (file_exists(public_path() . $product->portada3))
                            <div class="carousel-item">
                                <a href="{{ asset($product->portada3) }}">
                                    <img src="{{ asset($product->portada3) }}" class="d-block w-100" alt="">
                                </a>

                            </div>
                        @endif
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">

                <div class="mt-3 mb-3">
                    <h1 class="precio inline-block {{ $product->state ? '' : 'precio-inactivo' }}">
                        ${{ $product->price }} COP</h1>
                    <img class="inline-block" src="https://cdn-icons-png.flaticon.com/512/330/330508.png" alt=""
                        width="40rem">
                </div>
                @if (!$product->state)
                    <div class="mb-3">
                        <p><strong>Estado: </strong>INACTIVO</p>
                    </div>
                @endif
                <div class="mb-3">
                    <p><strong>Categoría: </strong> {{ $product->category }}</p>
                </div>
                <div class="mb-3">
                    <p><strong>Tamaño: </strong>{{ $product->size }} mts</p>
                </div>
                <div class="mb-3">
                    <p><strong>Stock: </strong>{{ $product->stock }} unidades disponibles</p>
                </div>
                @if ($product->storeId)
                    <div class="mb-3">
                        <p><strong>Tienda: </strong>{{ $product->storeId }}</p>
                    </div>
                @endif
                <div class="mb-3">
                    <p><strong>ID del vendedor: </strong>
                        <a href="">{{ $product->vendorId }}</a>
                    </p>
                </div>
                
                <div class="mb-5">
                    <p><strong>Descripción</strong><br><br>
                        <hr><br>{{ $product->description }}
                    </p><br><br>
                    <hr><br>
                </div>

                <div class="mb-5 text-center">
                    @if ($product->state)
                        <button type="submit" class="btn btn-primary  mr-3">
                            <i class="far fa-credit-card"></i> &nbsp;
                            Comprar
                        </button>
                    @endif
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-shopping-cart"></i> Agregar al carrito
                    </button>
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
        <strong>NO se ha registrado tu producto</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
