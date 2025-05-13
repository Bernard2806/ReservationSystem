<!-- Footer -->
<footer class="bg-gray-800 text-white mt-auto">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Logo e Información -->
            <div class="space-y-4">
                <div class="flex items-center space-x-2">
                    <img src="assets/img/logo.png" alt="Logo EEST N° 1 Chivilcoy"
                        class="h-12 filter brightness-0 invert">
                    <span class="text-lg font-semibold">EEST N° 1 Chivilcoy</span>
                </div>
                <p class="text-gray-300">Sistema de reservas.</p>
            </div>

            <!-- Enlaces Rápidos -->
            <div>
                <h3 class="text-lg font-medium mb-4">Enlaces Rápidos</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="index.php" class="text-gray-300 hover:text-white transition duration-150 ease-in-out">
                            <i class="ti ti-home mr-1"></i> Inicio
                        </a>
                    </li>
                    <li>
                        <a href="reservas.php"
                            class="text-gray-300 hover:text-white transition duration-150 ease-in-out">
                            <i class="ti ti-calendar mr-1"></i> Reservas
                        </a>
                    </li>
                    <li>
                        <a href="contacto.php"
                            class="text-gray-300 hover:text-white transition duration-150 ease-in-out">
                            <i class="ti ti-mail mr-1"></i> Contacto
                        </a>
                    </li>
                    <li>
                        <a href="faq.php" class="text-gray-300 hover:text-white transition duration-150 ease-in-out">
                            <i class="ti ti-help mr-1"></i> Preguntas Frecuentes
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contacto y Redes -->
            <div>
                <h3 class="text-lg font-medium mb-4">Contáctanos</h3>
                <ul class="space-y-2">
                    <li class="flex items-start">
                        <i class="ti ti-map-pin mt-1 mr-2 text-gray-300"></i>
                        <span class="text-gray-300">Av. Ceballos 631, Chivilcoy, Buenos Aires</span>
                    </li>
                    <li class="flex items-center">
                        <i class="ti ti-phone mr-2 text-gray-300"></i>
                        <span class="text-gray-300">(02346) 423-109</span>
                    </li>
                    <li class="flex items-center">
                        <i class="ti ti-mail mr-2 text-gray-300"></i>
                        <span class="text-gray-300">info@eest1chivilcoy.edu.ar</span>
                    </li>
                </ul>

                <div class="mt-4">
                    <h4 class="text-sm font-medium mb-2">Síguenos en:</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-white transition duration-150 ease-in-out">
                            <i class="ti ti-brand-facebook text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white transition duration-150 ease-in-out">
                            <i class="ti ti-brand-instagram text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white transition duration-150 ease-in-out">
                            <i class="ti ti-brand-twitter text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white transition duration-150 ease-in-out">
                            <i class="ti ti-brand-youtube text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-700 mt-8 pt-6 flex flex-col md:flex-row justify-between items-center">
            <p class="text-sm text-gray-300">&copy; <?php echo date('Y'); ?> EEST N° 1 Chivilcoy. Todos los derechos
                reservados.</p>
            <div class="mt-4 md:mt-0">
                <ul class="flex space-x-4 text-sm text-gray-300">
                    <li><a href="#" class="hover:text-white">Términos y Condiciones</a></li>
                    <li><a href="#" class="hover:text-white">Política de Privacidad</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Botón de volver arriba -->
    <div x-data="{ showButton: false }" @scroll.window="showButton = (window.pageYOffset > 300) ? true : false"
        x-show="showButton" x-transition x-cloak class="fixed bottom-4 right-4">
        <button @click="window.scrollTo({top: 0, behavior: 'smooth'})"
            class="bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-full shadow-lg">
            <i class="ti ti-arrow-up"></i>
        </button>
    </div>
</footer>
</body>

</html>