<h2 class="my-3 mx-3 titulo">Mis productos</h2>

@php
use App\Models\Product;
$id = Auth::user()->userId;
$products = Product::where('vendorId', $id)->get();
@endphp

<div class="container text-center d-flex justify-content-center">
    <div class="row">
        @foreach ($products as $product)
            <div class="col-lg-3 col-md-3 col-xs-6 py-3 px-3 producto producto-private">
                <a href="{{ route('ver-producto', $product) }}">
                    @if (file_exists( public_path().$product->photo_path ))
                        <img src="{{ $product->photo_path }}" class="{{ $product->state ? '' : 'inactivo' }}" alt="">
                    @else
                        <img src="{{ asset('images/products/404.png') }}" alt="">  
                    @endif
                </a>
                <div class="info py-3">
                    <h4 class="product-title">
                        <a href="{{ route('ver-producto', $product) }}">
                            {{ $product->id }} - {{ $product->name }} &nbsp;
                            <i class="fas  {{ $product->state ? 'fa-eye' : 'fa-eye-slash' }}"></i>
                        </a>
                    </h4>
                    <form action="{{ route('eliminar-producto', $product) }}" method="post">
                        @csrf
                        @method('delete')
                        {{-- <a class="btn btn-primary mt-3" href="{{ route('ver-producto', $product) }}"><i class="fas fa-eye"></i> Ver</a> --}}
                        <a class="btn btn-warning mt-3" href="{{ route('editar-producto', $product) }}"> 
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <button class="btn btn-danger mt-3" type="submit">
                            <i class="fas fa-trash"></i> Borrar
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
        <div class="pages mb-3">
            {{-- {{ $products->links() }} --}}
        </div>
    </div>
</div>
