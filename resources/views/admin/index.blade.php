<h2 class="my-3 mx-3 titulo">Dashboard</h2>

@php
use App\Models\User;
use App\Models\Product;
@endphp

<div class="container">
    <div class="row mb-5">

        <div class="my-5 text-center d-flex justify-content-center">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#users" role="tab"
                        aria-controls="users" aria-selected="true">Usuarios</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="products-tab" data-bs-toggle="tab" href="#products" role="tab"
                        aria-controls="products" aria-selected="false">Productos</a>
                </li>
            </ul>
        </div>
        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="home-tab">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">

                            @php
                                $admins = User::where('role', 'Administrador')->get();
                            @endphp

                            <h5 class="card-title text-center mb-5">
                                <strong>Administradores</strong>
                            </h5>
                            <ul class="">
                                @foreach ($admins as $admin)
                                    <li>
                                        <div class="users">
                                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                                <img class="h-8 w-8 rounded-full object-cover inline-block {{ $admin->status ? '' : 'op-4' }}"
                                                    src="{{ $admin->profile_photo_url }}"
                                                    alt="{{ $admin->name }}" />
                                                <p class="inline-block">{{ $admin->name }}</p>
                                            @else
                                                <span class="inline-flex rounded-md">
                                                    {{ $admin->name }}

                                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </span>
                                            @endif
                                            <div class="inline-block float-end">
                                                <form class="inline-block"
                                                    action="{{ route('actualizar-status-user', $admin) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="hidden" name="status"
                                                        value="{{ $admin->status ? 0 : 1 }}">
                                                    <button class="btn-round btn-round-eye">
                                                        <i
                                                            class="fas {{ $admin->status ? 'fa-eye-slash' : 'fa-eye' }} "></i>
                                                    </button>
                                                </form>
                                                <form class="inline-block"
                                                    action="{{ route('eliminar-usuario', $admin) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn-round btn-round-del">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">

                            @php
                                $vendors = User::where('role', 'Vendedor')->get();
                            @endphp

                            <h5 class="card-title text-center mb-5">
                                <strong>Vendedores</strong>
                            </h5>
                            <ul class="">
                                @foreach ($vendors as $vendor)
                                    <li>
                                        <div class="users">
                                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                                <img class="h-8 w-8 rounded-full object-cover inline-block {{ $vendor->status ? '' : 'op-4' }}"
                                                    src="{{ $vendor->profile_photo_url }}"
                                                    alt="{{ $vendor->name }}" />
                                                <p class="inline-block">{{ $vendor->name }}</p>
                                            @else
                                                <span class="inline-flex rounded-md">
                                                    {{ $vendor->name }}

                                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </span>
                                            @endif
                                            <div class="inline-block float-end">
                                                <form class="inline-block"
                                                    action="{{ route('actualizar-status-user', $vendor) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="hidden" name="status"
                                                        value="{{ $vendor->status ? 0 : 1 }}">
                                                    <button class="btn-round btn-round-eye">
                                                        <i
                                                            class="fas {{ $vendor->status ? 'fa-eye-slash' : 'fa-eye' }} "></i>
                                                    </button>
                                                </form>
                                                <form class="inline-block"
                                                    action="{{ route('eliminar-usuario', $vendor) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn-round btn-round-del">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">

                            @php
                                $clients = User::where('role', 'Cliente')->get();
                            @endphp

                            <h5 class="card-title text-center mb-5">
                                <strong>Clientes</strong>
                            </h5>
                            <ul class="">
                                @foreach ($clients as $client)
                                    <li>
                                        <div class="users">
                                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                                <img class="h-8 w-8 rounded-full object-cover inline-block {{ $client->status ? '' : 'op-4' }}"
                                                    src="{{ $client->profile_photo_url }}"
                                                    alt="{{ $client->name }}" />
                                                <p class="inline-block">{{ $client->name }}</p>
                                            @else
                                                <span class="inline-flex rounded-md">
                                                    {{ $client->name }}

                                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </span>
                                            @endif
                                            <div class="inline-block float-end">
                                                <form class="inline-block"
                                                    action="{{ route('actualizar-status-user', $client) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="hidden" name="status"
                                                        value="{{ $client->status ? 0 : 1 }}">
                                                    <button class="btn-round btn-round-eye">
                                                        <i
                                                            class="fas {{ $client->status ? 'fa-eye-slash' : 'fa-eye' }} "></i>
                                                    </button>
                                                </form>
                                                <form class="inline-block"
                                                    action="{{ route('eliminar-usuario', $client) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn-round btn-round-del">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

            </div>


            <div class="tab-pane fade" id="products" role="tabpanel" aria-labelledby="products-tab">
                @php
                    $products = Product::all();
                @endphp

                <div class="container">
                    <div class="row">
                        <h5 class="card-title text-center mb-5">
                            <strong>Productos</strong>
                        </h5>
                        <ul class="product-list">


                            @foreach ($products as $product)
                                <li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="users">
                                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                            <img class="h-8 w-8 object-cover inline-block {{ $product->state ? '' : 'op-4' }}"
                                                src="{{ $product->photo_path }}"
                                                alt="{{ $product->name }}" />
                                            <a href="{{ route('ver-producto', $product) }}">
                                                <p class="inline-block">{{ $product->name }}</p>
                                            </a>
                                        @else
                                            <span class="inline-flex rounded-md">
                                                {{ $product->name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                        @endif
                                        <div class="inline-block float-end">
                                            <form class="inline-block"
                                                action="{{ route('actualizar-status-producto', $product) }}"
                                                method="POST">
                                                @csrf
                                                <input type="hidden" name="state"
                                                    value="{{ $product->state ? 0 : 1 }}">
                                                <button class="btn-round btn-round-eye">
                                                    <i
                                                        class="fas {{ $product->state ? 'fa-eye-slash' : 'fa-eye' }} "></i>
                                                </button>
                                            </form>
                                            <form class="inline-block"
                                                action="{{ route('eliminar-producto', $product) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn-round btn-round-del">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="pages mb-3">
            {{-- {{ $products->links() }} --}}
        </div>
    </div>
</div>
