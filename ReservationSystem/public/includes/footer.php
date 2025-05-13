</main>

<!-- Footer -->
<footer class="bg-indigo-800 text-white py-6 mt-auto" x-data="footerData()">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Columna 1: Información del sistema -->
            <div>
                <h3 class="font-bold text-lg mb-3">Sistema de Reservas</h3>
                <p class="text-indigo-200 mb-2">Gestión eficiente de espacios y recursos para la comunidad educativa.
                </p>
                <p class="text-sm text-indigo-300">
                    <template x-if="loading">
                        <span>Cargando versión...</span>
                    </template>
                    <template x-if="!loading">
                        <span>Versión <span x-text="version"></span></span>
                    </template>
                </p>
            </div>

            <!-- Columna 2: Enlaces rápidos -->
            <div>
                <h3 class="font-bold text-lg mb-3">Enlaces Rápidos</h3>
                <ul class="space-y-2">
                    <li><a href="index.php" class="text-indigo-200 hover:text-white transition">Inicio</a></li>
                    <li><a href="reservas.php" class="text-indigo-200 hover:text-white transition">Reservas</a></li>
                    <li><a href="calendario.php" class="text-indigo-200 hover:text-white transition">Calendario</a></li>
                    <li><a href="ayuda.php" class="text-indigo-200 hover:text-white transition">Ayuda</a></li>
                </ul>
            </div>

            <!-- Columna 3: Contacto y soporte -->
            <div>
                <h3 class="font-bold text-lg mb-3">Contacto y Soporte</h3>
                <ul class="space-y-2">
                    <li class="flex items-center text-indigo-200">
                        <i class="ti ti-mail mr-2"></i>
                        <span>soporte@escuelatecnica.edu</span>
                    </li>
                    <li class="flex items-center text-indigo-200">
                        <i class="ti ti-phone mr-2"></i>
                        <span>+123 456 7890</span>
                    </li>
                    <li class="flex items-center text-indigo-200">
                        <i class="ti ti-brand-github mr-2"></i>
                        <a href="https://github.com/EEST1Chivilcoy/ReservationSystem"
                            class="hover:text-white transition">GitHub</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Línea separadora -->
        <hr class="border-indigo-600 my-4">

        <!-- Copyright -->
        <div class="text-center text-sm text-indigo-300">
            <p>&copy; <span x-text="currentYear"></span> Escuela Técnica. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>

<!-- Script para cargar la versión desde el servidor -->
<script>
    function footerData() {
        return {
            version: '1.0.0',
            currentYear: new Date().getFullYear(),
            loading: true,
            init() {
                // Cargar la versión desde version.php mediante una petición fetch
                fetch('version.php')
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Error al cargar la versión');
                        }
                        return response.text();
                    })
                    .then(data => {
                        this.version = data.trim();
                        this.loading = false;
                    })
                    .catch(error => {
                        console.error('Error al cargar la versión:', error);
                        this.version = '1.0.0';
                        this.loading = false;
                    });
            }
        }
    }
</script>
</body>

</html>