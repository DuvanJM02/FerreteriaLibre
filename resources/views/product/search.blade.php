<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}">
                <i class="fas fa-arrow-left"></i>
            </a> &nbsp; &nbsp;
            {{ __('Busqueda del producto') }}
        </h2>
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
        </h2> --}}
    </x-slot>


    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-5 mx-5">
        <div class="container">
            <div class="row mt-3">

                @if ($products->count() > 0)
                    @foreach ($products as $product)
                        <div class="col-lg-6 col-md-6 col-xs-12 my-3 mx-5 producto-busqueda">
                            <div class="row">
                                <div class="col-lg-3">
                                    <a href="{{ route('ver-producto', $product) }}">
                                        @if (file_exists(public_path() . $product->photo_path))
                                            <img src="{{ $product->photo_path }}" class="{{ $product->state ? '' : 'inactivo' }}" alt="">
                                        @else
                                            <img src="{{ asset('images/products/404.png') }}" alt="">
                                        @endif
                                    </a>
                                </div>
                                <div class="col-lg-9">
                                    <a href="{{ route('ver-producto', $product) }}">
                                        <h2>
                                            {{ $product->name }}
                                        </h2>
                                    </a>
                                    <h3>${{ $product->price }} COP</h3>
                                    <p>Unidades: {{ $product->stock }}</p>
                                    <button class="btn btn-primary w-48">
                                        <i class="far fa-credit-card"></i> Comprar
                                    </button>
                                    <button class="btn btn-primary w-48">
                                        <i class="fas fa-shopping-cart"></i> Agregar al carrito
                                    </button>
                                    {{-- <form action="{{ route('eliminar-producto', $product) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a class="btn btn-warning" href="{{ route('editar-producto', $product) }}"> 
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <button class="btn btn-danger" type="submit">
                                            <i class="fas fa-trash"></i> Borrar
                                        </button>
                                    </form> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="row text-center">
                        <div class="col-12">
                            <img src="https://icon-library.com/images/no-data-icon/no-data-icon-10.jpg" alt="">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-3 text-uppercase">No existen
                                productos con su criterio de Busqueda</h2>
                        </div>
                    </div>

                @endif
                <div class="pages mb-3">
                    {{-- {{ $products->links() }} --}}
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
