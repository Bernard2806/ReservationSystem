<?php include 'includes\header.php'; ?>

<!-- Contenido principal -->
<main class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white shadow rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Bienvenido al Sistema de Reservas</h1>
        <p class="text-gray-600">
            Esta es una página de ejemplo que muestra la integración del header y footer en el sistema de reservas.
            Puede comenzar a añadir su contenido específico aquí.
        </p>

        <!-- Ejemplo de contenido para visualizar el diseño -->
        <div class="mt-8 p-4 bg-blue-50 rounded-md">
            <h2 class="text-lg font-semibold text-blue-800 mb-2">Próximas Reservas</h2>
            <div class="divide-y divide-gray-200">
                <div class="py-3 flex justify-between">
                    <div>
                        <p class="font-medium">Laboratorio de Informática</p>
                        <p class="text-sm text-gray-500">Profesor: Juan Pérez</p>
                    </div>
                    <div class="text-right">
                        <p class="font-medium">Lunes, 15 de Mayo</p>
                        <p class="text-sm text-gray-500">14:00 - 16:00</p>
                    </div>
                </div>
                <div class="py-3 flex justify-between">
                    <div>
                        <p class="font-medium">Taller de Electrónica</p>
                        <p class="text-sm text-gray-500">Profesor: María Gómez</p>
                    </div>
                    <div class="text-right">
                        <p class="font-medium">Martes, 16 de Mayo</p>
                        <p class="text-sm text-gray-500">10:00 - 12:00</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'includes\footer.php'; ?>