<!-- Modal -->
<div class="modal fade" id="modalCrearProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sube tu producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('registro-producto') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-3 mb-3">
                        <label for="name">Nombre *</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus>
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
                            rows="5">{{ old('description') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="size">Tamaño</label>
                        <input type="text" name="size" id="size" value="{{ old('size') }}">
                    </div>
                    <div class="mb-3">
                        <label for="price">Precio *</label>
                        <input type="number" name="price" id="price" value="{{ old('price') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="stock">Cantidad disponible *</label>
                        <input type="number" name="stock" id="stock" value="{{ old('stock') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="state">Estado del producto *</label><br>
                        <select class="w-100" name="state" id="state">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
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
                        <label for="photo">Portada del producto *</label>
                        <input type="file" name="photo" id="photo" required>
                    </div>
                    <div class="mb-3">
                        <br>
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Imágenes del producto</h2> <br>
                        <label for="portada1">Imagen 1 *</label>
                        <input type="file" name="portada1" id="portada1" required>
                    </div>
                    <div class="mb-3">
                        <label for="portada2">Imagen 2</label>
                        <input type="file" name="portada2" id="portada2">
                    </div>
                    <div class="mb-5">
                        <label for="portada3">Imagen 3</label>
                        <input type="file" name="portada3" id="portada3">
                    </div>
                    <div class="mb-3">
                        <i>* Campos obligatorios</i>
                    </div>
                    <div class="mb-5 text-center">
                        <button type="submit" class="btn btn-primary w-100">Subir producto</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cerrar</button>
            </div>
        </div>
    </div>
</div>

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
