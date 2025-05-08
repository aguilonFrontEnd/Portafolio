/* DASHBOARD VENDEDOR */

// LÓGICA DEL MENÚ DE NAVEGACIÓN
document.addEventListener('DOMContentLoaded', function () {
    const defaultSection = document.querySelector('.section_default');
    if (defaultSection) {
        defaultSection.style.display = 'block';
    }

    const navButtons = document.querySelectorAll('.btn_nav');

    navButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.id;

            document.querySelectorAll('.section').forEach(section => {
                section.style.display = 'none';
            });

            switch (id) {
                case 'add':
                    document.querySelector('.section_register').style.display = 'block';
                    break;
                case 'productos':
                    document.querySelector('.section_products').style.display = 'block';
                    break;
                case 'pedidos':
                    document.querySelector('.section_order').style.display = 'block';
                    break;
                case 'historial':
                    document.querySelector('.section_history').style.display = 'block';
                    break;
                case 'cuenta':
                    document.querySelector('.section_account').style.display = 'block';
                    break;
                default:
                    console.log('ID de sección no reconocido:', id);
            }
        });
    });
});

// LÓGICA DE BOTONES DE TALLAS
document.addEventListener('DOMContentLoaded', function () {
    const sizeButtons = document.querySelectorAll('.btn_size');

    sizeButtons.forEach(button => {
        button.addEventListener('click', function () {
            sizeButtons.forEach(btn => btn.classList.remove('acti'));
            this.classList.add('acti');
            const selectedSize = this.value;
            console.log('Talla seleccionada:', selectedSize);
        });
    });
});

// VISTA PREVIA DE IMAGEN EN REGISTRO DE PRENDAS
document.addEventListener('DOMContentLoaded', function () {
    const fileInput = document.getElementById('fileInput');
    const label = document.querySelector('.custom-label');
    const previewImg = document.querySelector('.image_form');

    if (fileInput) {
        fileInput.addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file && ['image/jpeg', 'image/png', 'image/jpg'].includes(file.type)) {
                label.classList.add('acti');
                const reader = new FileReader();
                reader.onload = function (event) {
                    previewImg.src = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    }
});

// VISTA PREVIA DE FOTO DE PERFIL
document.addEventListener('DOMContentLoaded', function () {
    const fileInput = document.getElementById('file-input');
    const profilePreview = document.getElementById('profile-preview');

    if (fileInput && profilePreview) {
        fileInput.addEventListener('change', function (e) {
            const reader = new FileReader();
            reader.onload = function (event) {
                profilePreview.src = event.target.result;
            };
            reader.readAsDataURL(e.target.files[0]);
        });
    }
});

// ACTUALIZAR TIPO DE TALLA AUTOMÁTICAMENTE EN EL REGISTRO
document.addEventListener('DOMContentLoaded', function () {
    const tallaSelect = document.getElementById('tallaSelect');
    const tipoTallaInput = document.getElementById('tipoTalla');

    if (tallaSelect && tipoTallaInput) {
        tallaSelect.addEventListener('change', function () {
            const optgroup = this.options[this.selectedIndex].parentElement;
            if (optgroup.tagName === 'OPTGROUP') {
                tipoTallaInput.value = optgroup.label.toLowerCase();
            }
        });
    }
});

// ✅ VALIDACIÓN SOLO PARA FORMULARIO DE REGISTRO DE ROPA
document.addEventListener('DOMContentLoaded', function () {
    const registerForm = document.getElementById('form_register_clothes');
    const tallaSelect = document.getElementById('tallaSelect');
    const tipoTallaInput = document.getElementById('tipoTalla');

    if (registerForm && tallaSelect && tipoTallaInput) {
        registerForm.addEventListener('submit', function (e) {
            if (!tallaSelect.value || !tipoTallaInput.value) {
                e.preventDefault();
                alert('Por favor selecciona una talla válida');
            }
        });
    }
});