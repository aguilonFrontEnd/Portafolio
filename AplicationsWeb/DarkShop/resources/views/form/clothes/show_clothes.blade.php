<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $producto->nombre }} - DarkShop</title>

    @vite(['resources/scss/form/show_clothes.scss'])
    @vite(['resources/js/modules/show_clothes.js'])
</head>
<body>

    <form action="{{ route('productos.update', $producto->id) }}" method="POST" class="form_section" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    
        <span class="span_form">
            <!-- Contenedor de select de categorías -->
            <div class="container_form input_category">
                <select name="ropa" class="select_category" required>
                    <option value="" disabled>Seleccione una categoría</option>
                    @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" 
                        {{ $producto->categorias->contains($categoria->id) ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                    @endforeach
                </select>
            </div>
    
            <!-- Contenedor de código y tallas -->
            <div class="container_form input_auth">
                <!-- Código de la prenda -->
                <span class="span_number">
                    <label class="label_number">Código de la prenda:</label>
                    <input type="text" class="input_number" name="codigo_producto" 
                           value="{{ old('codigo_producto', $producto->codigo_producto) }}" required>
                </span>
    
                <!-- Tallas -->
                <span class="span_size">
                    <span class="span_size size_select">
                        <select name="talla" class="select_size" id="tallaSelect" required>
                            <option value="{{ $producto->talla }}" selected>{{ $producto->talla }}</option>
                            <option value="" disabled>Talla:</option>
                            <optgroup label="Torso">
                                <option value="XS">XS</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                            </optgroup>
                            <optgroup label="Pierna">
                                @for($i = 30; $i <= 38; $i += 2)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </optgroup>
                            <optgroup label="Calzado">
                                @for($i = 30; $i <= 42; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </optgroup>
                            <optgroup label="Cabeza">
                                @for($i = 6; $i <= 14; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </optgroup>
                        </select>
                    </span>
                    <input type="hidden" name="tipo_talla" id="tipoTalla" value="{{ $producto->tipo_talla }}">
                </span>
            </div>
    
            <!-- Nombre de la prenda -->
            <div class="container_form input_name">
                <span class="span_name">
                    <label class="label_name">Nombre de la prenda:</label>
                    <input type="text" class="input_name" name="nombre" 
                           value="{{ old('nombre', $producto->nombre) }}" required>
                </span>
            </div>
    
            <!-- Marca, Precio y Cantidad -->
            <div class="container_form input_info">
                <span class="span_brand">
                    <label class="label_brand">Marca:</label>
                    <input type="text" class="input_brand" name="marca" 
                           value="{{ old('marca', $producto->marca) }}" required>
                </span>
    
                <span class="span_price">
                    <label class="label_price">Precio:</label>
                    <input type="number" step="0.01" class="input_price" name="precio" 
                           value="{{ old('precio', $producto->precio) }}" required>
                </span>
    
                <span class="span_amount">
                    <label class="label_amount">Cantidad:</label>
                    <input type="number" class="input_amount" name="cantidad" 
                           value="{{ old('cantidad', $producto->stock) }}" required min="0">
                </span>
            </div>
    
            <!-- Imagen de la prenda -->
            <div class="container_form input_image">
                <span class="span_image">
                    <input type="file" id="fileInput" class="input-file" accept="image/*" name="imagen">
                    <label for="fileInput" class="custom-label">Cambiar imagen</label>
                </span>
            </div>
    
            <!-- Botones -->
            <div class="container_form input_btn">
                <span class="span_btn">
                    <button type="button" class="btn_post" id="destroyBtn">Eliminar</button>
                    <button type="submit" class="btn_post">Guardar</button>
                </span>
            </div>
        </span>
    
        <!-- Previsualización de la imagen -->
        <figure class="figure_form">
            <img src="{{ $producto->foto_prenda ?: 'https://via.placeholder.com/300' }}" 
                 alt="Imagen de la prenda" class="image_form" id="imagePreview">
        </figure>
    </form>
    
    <!-- Formulario oculto para eliminar -->
    <form id="deleteForm" action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

</body>
</html>