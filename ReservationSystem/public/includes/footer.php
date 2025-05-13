<?php
/**
 * Componente Footer del sistema de reservas
 * ReservationSystem - EEST N° 1 Chivilcoy
 * 
 * Sistema de reservas para la EEST N° 1 Chivilcoy
 * Creado por: Bernardo Andrés, González Erramuspe
 */

// Asegurarse de que se haya calculado una versión
if (!isset($GLOBALS['version'])) {
    include_once 'version.php';
}
?>

</main>

<!-- Footer -->
<footer class="bg-white border-t border-gray-200 mt-auto">
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Información de contacto -->
            <div class="text-center md:text-left">
                <h4 class="text-lg font-semibold text-gray-800 mb-3">Contacto</h4>
                <p class="text-gray-600">
                    <a href="tel:02346431330"
                        class="flex items-center justify-center md:justify-start hover:text-blue-600 transition-colors duration-200">
                        <i class="ti ti-phone text-lg mr-2"></i>
                        2346-431330
                    </a>
                </p>
                <p class="text-gray-600 mt-2">
                    <span class="flex items-center justify-center md:justify-start">
                        <i class="ti ti-map-pin text-lg mr-2"></i>
                        Chivilcoy, Buenos Aires
                    </span>
                </p>
            </div>

            <!-- Información del sistema -->
            <div class="text-center">
                <h4 class="text-lg font-semibold text-gray-800 mb-3">ReservationSystem</h4>
                <p class="text-gray-600">
                    <span class="flex items-center justify-center">
                        <i class="ti ti-code text-lg mr-2"></i>
                        Versión <?php echo $GLOBALS['version'] ?? '1.0.0'; ?>
                    </span>
                </p>
                <p class="text-gray-600 mt-2">
                    <a href="https://github.com/EEST1Chivilcoy/ReservationSystem" target="_blank"
                        class="flex items-center justify-center hover:text-blue-600 transition-colors duration-200">
                        <i class="ti ti-brand-github text-lg mr-2"></i>
                        GitHub
                    </a>
                </p>
            </div>

            <!-- Créditos -->
            <div class="text-center md:text-right">
                <h4 class="text-lg font-semibold text-gray-800 mb-3">Créditos</h4>
                <p class="text-gray-600">
                    <button type="button" id="openCreditsModal"
                        class="hover:text-blue-600 transition-colors duration-200">
                        <i class="ti ti-info-circle text-lg mr-1"></i>
                        Ver créditos completos
                    </button>
                </p>
            </div>
        </div>

        <!-- Copyright -->
        <div class="text-center pt-6 mt-6 border-t border-gray-200">
            <p class="text-gray-600">
                &copy; 2023 - <?php echo date('Y'); ?> | EEST N° 1 Chivilcoy
            </p>
            <p class="text-gray-500 text-sm mt-1">
                Desarrollado por <span class="font-semibold">Bernardo Andrés González Erramuspe</span>
                <br>
                Profesor: <span class="font-semibold">Sergio Caffaro</span>
            </p>
        </div>
    </div>
</footer>

<!-- Modal de Créditos -->
<div id="creditsModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog"
    aria-modal="true">
    <div class="flex items-center justify-center min-h-screen p-4 text-center sm:block sm:p-0">
        <!-- Overlay de fondo -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

        <!-- Contenido del modal -->
        <div
            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="flex justify-between items-start">
                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                        Créditos del Sistema
                    </h3>
                    <button type="button" id="closeCreditsModal" class="text-gray-400 hover:text-gray-500">
                        <i class="ti ti-x text-xl"></i>
                    </button>
                </div>

                <!-- Contenido de los créditos -->
                <div class="mt-4">
                    <!-- Logo del sistema -->
                    <div class="flex justify-center mb-6">
                        <img src="assets/img/logo.png" alt="Logo del Sistema" class="h-24 w-auto">
                    </div>

                    <p class="text-sm text-gray-600 mb-4">
                        Este proyecto es el resultado del esfuerzo y la dedicación de quienes han contribuido
                        a su desarrollo, con el objetivo de mejorar la gestión de espacios en la institución.
                    </p>

                    <!-- Colaboradores principales -->
                    <h4 class="font-semibold text-gray-800 mt-4 mb-2">Colaboradores principales:</h4>
                    <ul class="list-disc list-inside text-sm text-gray-600 space-y-1">
                        <li><strong>Profesor Sergio Cáffaro:</strong> Generador de la idea inicial y guía conceptual del
                            proyecto.</li>
                        <li><strong>Bernardo González:</strong> Estudiante de 7mo año (2024), desarrollador principal y
                            encargado del mantenimiento en GitHub.</li>
                    </ul>

                    <p class="text-sm text-gray-600 mt-4">
                        Este sistema fue desarrollado como proyecto escolar en la EEST N° 1 de Chivilcoy,
                        utilizando tecnologías modernas y siguiendo buenas prácticas de desarrollo.
                    </p>
                </div>
            </div>

            <!-- Botones del modal -->
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <a href="https://github.com/EEST1Chivilcoy/ReservationSystem" target="_blank"
                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                    <i class="ti ti-brand-github mr-2"></i>
                    Ver repositorio
                </a>
                <button type="button" id="closeModalBtn"
                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Script para el modal -->
<script>
    // Elementos del DOM
    const modal = document.getElementById('creditsModal');
    const openModalBtn = document.getElementById('openCreditsModal');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const closeCreditsModal = document.getElementById('closeCreditsModal');

    // Funciones para manejar el modal
    function openModal() {
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    // Event listeners
    openModalBtn.addEventListener('click', openModal);
    closeModalBtn.addEventListener('click', closeModal);
    closeCreditsModal.addEventListener('click', closeModal);

    // Cerrar modal cuando se hace clic fuera del contenido
    modal.addEventListener('click', function (e) {
        if (e.target === modal) {
            closeModal();
        }
    });

    // Cerrar modal con la tecla Escape
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            closeModal();
        }
    });
</script>
</body>

</html>