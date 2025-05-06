/* DASHBOARD VENDEDOR */

// LOGICA PARA EL MENU DE NAVEGACIÓN LAS SECCIONES DEL DASHBOARD
document.addEventListener('DOMContentLoaded', function () {
    
    // Mostramos la sección por defecto al cargar la página
    const defaultSection = document.querySelector('.section_default');
    if (defaultSection) {
        defaultSection.style.display = 'block';
    }

    // Obtenemos todos los botones del menú
    const navButtons = document.querySelectorAll('.btn_nav');

    // Recorremos cada botón
    navButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.id;

            // Ocultamos todas las secciones
            document.querySelectorAll('.section').forEach(section => {
                section.style.display = 'none';
            });

            // Mostramos la sección correspondiente al botón presionado
            switch (id) {

                case 'add':
                    document.querySelector('.section_register').style.display = 'block';
                    break;
                case 'productos':
                    document.querySelector('.section_products').style.display = 'block';
                    break;
                case 'pedidos': // Mostrar pedidos = sección .section_order
                    document.querySelector('.section_order').style.display = 'block';
                    break;
                case 'historial': // Mostrar historial = sección .section_history
                    document.querySelector('.section_history').style.display = 'block';
                    break;
                case 'cuenta': // Mostrar cuenta
                    document.querySelector('.section_account').style.display = 'block';
                    break;
                case 'cerrar':
                    alert('Cerrando sesión...');
                    break;
                default:
                    console.log('ID de sección no reconocido:', id);
            }     
        });
    });
});

// LOGICA DEL BOTON DE TALLAS DE LA SECCION DE REGISTRO DE PRENDAS
document.addEventListener('DOMContentLoaded', function () {
    const sizeButtons = document.querySelectorAll('.btn_size');

    sizeButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Quitar clase 'acti' de todos
            sizeButtons.forEach(btn => btn.classList.remove('acti'));

            // Activar solo el clicado
            this.classList.add('acti');

            // (Opcional) Guardar el value seleccionado en una variable
            const selectedSize = this.value;
            console.log('Talla seleccionada:', selectedSize);
        });
    });
});

// LOGICA DEL BOTON DE TALLAS DE LA SECCION DE REGISTRO DE PRENDAS
document.addEventListener('DOMContentLoaded', function () {
    const sizeButtons = document.querySelectorAll('.btn_size');

    sizeButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Quitar clase 'acti' de todos
            sizeButtons.forEach(btn => btn.classList.remove('acti'));

            // Activar solo el clicado
            this.classList.add('acti');

            // (Opcional) Guardar el value seleccionado en una variable
            const selectedSize = this.value;
            console.log('Talla seleccionada:', selectedSize);
        });
    });
});

// LOGICA DE LA IMAGEN A INSERTAR EN EL REGISTRO DE LAS PRENDAS 
document.getElementById('fileInput').addEventListener('change', function (e) {
    const file = e.target.files[0];
    const label = document.querySelector('.custom-label');
    const previewImg = document.querySelector('.image_form');

    if (file && ['image/jpeg', 'image/png', 'image/jpg'].includes(file.type)) {
        // Agregar la clase 'acti' al label
        label.classList.add('acti');

        // Leer y mostrar imagen
        const reader = new FileReader();
        reader.onload = function (event) {
            previewImg.src = event.target.result;
        };
        reader.readAsDataURL(file);
    }
});

/* LOGICA PARA LAS TALLAS */
document.getElementById('tallaSelect').addEventListener('change', function() {
    const optgroup = this.options[this.selectedIndex].parentElement;
    document.getElementById('tipoTalla').value = optgroup.label;
});

// LOGICA PARA LA VISTA PREVIA DE LA IMAGEN
document.getElementById('file-input').addEventListener('change', function(e) {
    const reader = new FileReader();
    reader.onload = function(event) {
        document.getElementById('profile-preview').src = event.target.result;
    }
    reader.readAsDataURL(e.target.files[0]);
});

// LOGICA DE TALLAS
document.addEventListener('DOMContentLoaded', function() {
    const tallaSelect = document.getElementById('tallaSelect');
    const tipoTallaInput = document.getElementById('tipoTalla');
    
    // Actualizar tipo_talla cuando se selecciona una talla
    tallaSelect.addEventListener('change', function() {
        const optgroup = this.options[this.selectedIndex].parentElement;
        if (optgroup.tagName === 'OPTGROUP') {
            tipoTallaInput.value = optgroup.label.toLowerCase();
        }
    });
    
    // Validar antes de enviar
    document.querySelector('form').addEventListener('submit', function(e) {
        if (!tallaSelect.value || !tipoTallaInput.value) {
            e.preventDefault();
            alert('Por favor selecciona una talla válida');
        }
    });
});




