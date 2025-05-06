document.addEventListener('DOMContentLoaded', function() {
    // Vista previa de imagen
    document.getElementById('fileInput').addEventListener('change', function(e) {
        if (e.target.files.length > 0) {
            const reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('imagePreview').src = event.target.result;
            };
            reader.readAsDataURL(e.target.files[0]);
        }
    });

    // Actualizar tipo de talla
    document.getElementById('tallaSelect').addEventListener('change', function() {
        const optgroup = this.options[this.selectedIndex].parentElement;
        if (optgroup.tagName === 'OPTGROUP') {
            document.getElementById('tipoTalla').value = optgroup.label.toLowerCase();
        }
    });

    // Manejar eliminación
    document.getElementById('destroyBtn').addEventListener('click', function() {
        if (confirm('¿Estás seguro de que deseas eliminar esta prenda?')) {
            document.getElementById('deleteForm').submit();
        }
    });
});