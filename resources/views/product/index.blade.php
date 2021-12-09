<h2 class="my-3 mx-3 titulo">Productos</h2>

@php
    use App\Models\Product;
    $products = Product::where('state', '=', 1)->get();
@endphp

<div class="container text-center d-flex justify-content-center">
    <div class="row mb-5">
        @foreach ($products as $product)
            <div class="col-lg-3 col-md-3 col-xs-6 py-3 px-3 producto producto-public {{ Auth::guest() ? 'producto-public' : 'producto-cliente' }}">
                <a href="{{ route('ver-producto', $product) }}">
                    @if (file_exists( public_path().$product->photo_path ))
                        <img src="{{ $product->photo_path }}" class="{{ $product->state ? '' : 'inactivo' }}" alt="">
                    @else
                        <img src="{{ asset('images/products/404.png') }}" alt="">  
                    @endif
                    <div class="info py-3">
                        <h4 class="product-title">
                            {{ $product->name }} <br>
                        </h4>
                        <p class="precio-public">
                            ${{ $product->price }}
                        </p>
                        @if (Auth::guest())
                        @else
                                <button class="btn btn-primary w-100" >
                                    <i class="far fa-credit-card"></i> Comprar
                                </button>
                        @endif
                    </div>
                </a>
            </div>
        @endforeach
        <div class="pages mb-3">
            {{-- {{ $products->links() }} --}}
        </div>
    </div>
</div>