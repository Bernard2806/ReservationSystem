<!-- Footer Moderno con Gradiente -->
<footer class="bg-gradient-to-r from-blue-700 via-blue-600 to-blue-800 text-white mt-auto">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="flex flex-col md:flex-row justify-between items-center gap-6">
            <!-- Logo e Info -->
            <div class="flex items-center gap-3">
                <img src="assets/img/logo.png" alt="Logo EEST N°1" class="h-12">
                <span class="text-lg font-semibold">EEST N°1 Chivilcoy</span>
            </div>

            <!-- Contacto -->
            <div class="text-sm text-center md:text-right leading-relaxed">
                <p>📍 Carlos Pellegrini 338, Chivilcoy, Buenos Aires</p>
                <p>📞 (02346) 43-1330</p>
            </div>
        </div>

        <div class="mt-8 border-t border-blue-400/30 pt-4 text-center text-sm text-white/70">
            &copy; <?php echo date('Y'); ?> Escuela de Educación Secundaria Técnica N°1 "Mariano Moreno" de Chivilcoy. Todos los derechos reservados.
        </div>
    </div>

    <!-- Botón de volver arriba -->
    <div x-data="{ showButton: false }"
         @scroll.window="showButton = (window.pageYOffset > 300)"
         x-show="showButton"
         x-transition
         x-cloak
         class="fixed bottom-4 right-4 z-50">
        <button @click="window.scrollTo({top: 0, behavior: 'smooth'})"
                class="bg-white text-blue-700 hover:bg-blue-100 p-3 rounded-full shadow-lg transition">
            <i class="ti ti-arrow-up"></i>
        </button>
    </div>
</footer>

</body>

</html>