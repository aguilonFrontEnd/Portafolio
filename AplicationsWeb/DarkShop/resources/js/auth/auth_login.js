document.addEventListener('DOMContentLoaded', function () {
    const formRegister = document.querySelector('.form_register');
    const formLogin = document.querySelector('.form_login');
    
    const rolInputRegister = document.getElementById('rolInput');
    const rolInputLogin = document.getElementById('rolInput');

    const btnVendedorRegister = document.getElementById('btnVendedor');
    const btnCompradorRegister = document.getElementById('btnComprador');

    const btnVendedorLogin = document.getElementById('btnVendedor');
    const btnCompradorLogin = document.getElementById('btnComprador');

    if (btnCompradorRegister) {
        btnCompradorRegister.classList.add('acti');
    }

    if (btnCompradorLogin) {
        btnCompradorLogin.classList.add('acti');
    }

    if (btnVendedorRegister && btnCompradorRegister) {
        btnVendedorRegister.addEventListener('click', function (e) {
            e.preventDefault();
            btnCompradorRegister.classList.remove('acti');
            btnVendedorRegister.classList.add('acti');
            rolInputRegister.value = 1;
        });

        btnCompradorRegister.addEventListener('click', function (e) {
            e.preventDefault();
            btnVendedorRegister.classList.remove('acti');
            btnCompradorRegister.classList.add('acti');
            rolInputRegister.value = 2;
        });
    }

    if (btnVendedorLogin && btnCompradorLogin) {
        btnVendedorLogin.addEventListener('click', function (e) {
            e.preventDefault();
            btnCompradorLogin.classList.remove('acti');
            btnVendedorLogin.classList.add('acti');
            rolInputLogin.value = 1;
        });

        btnCompradorLogin.addEventListener('click', function (e) {
            e.preventDefault();
            btnVendedorLogin.classList.remove('acti');
            btnCompradorLogin.classList.add('acti');
            rolInputLogin.value = 2;
        });
    }

    // Lógica de envío para los formularios sin validaciones
    const submitButtonRegister = formRegister.querySelector('.btn_sesion');
    const submitButtonLogin = formLogin.querySelector('.btn_sesion');

    if (submitButtonRegister) {
        submitButtonRegister.addEventListener('click', function (e) {
            e.preventDefault();
            formRegister.submit(); 
        });
    }

    if (submitButtonLogin) {
        submitButtonLogin.addEventListener('click', function (e) {
            e.preventDefault();
            formLogin.submit(); 
        });
    }
});
