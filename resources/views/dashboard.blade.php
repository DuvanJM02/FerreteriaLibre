<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-jet-welcome /> --}}

                @if (Auth::guest())
                    @include('product.index')
                @else
                    @if (Auth::user()->role == 'Administrador')
                        @include('admin.index')
                    @endif

                    @if (Auth::user()->role == 'Cliente')
                        @include('product.index')
                    @endif

                    @if (Auth::user()->role == 'Vendedor')
                        @include('vendors.vendor-view')
                        @include('components.modal-subir-producto')
                    @endif
                        
                @endif
            </div>
        </div>
    </div>
</x-app-layout>


