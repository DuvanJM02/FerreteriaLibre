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
                    Tu formulario de contacto fue enviado.
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
