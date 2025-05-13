<?php include 'includes/header.php'; ?>

<!-- Encabezado principal -->
<section class="relative h-[420px] bg-[#1e293b]">
    <img src="assets\img\School.webp" alt="Foto de la escuela"
        class="w-full h-full object-cover opacity-30 absolute inset-0">
    <div class="relative z-10 flex items-center justify-center h-full">
        <div class="text-center text-white px-6">
            <h1 class="text-4xl sm:text-5xl font-bold mb-4">Sistema de Reservas</h1>
            <p class="text-lg sm:text-xl max-w-2xl mx-auto text-gray-200">
                Escuela Técnica Industrial N°1 "Mariano Moreno" - Chivilcoy
            </p>
        </div>
    </div>
</section>

<!-- Presentación del sistema -->
<section class="bg-[#f1f5f9] py-12 px-6">
    <div class="max-w-5xl mx-auto text-center">
        <h2 class="text-3xl font-bold text-[#1e293b] mb-6">¿Qué es este sistema?</h2>
        <p class="text-[#475569] text-lg leading-relaxed">
            Este portal permite a docentes, personal institucional y entidades externas reservar espacios disponibles
            dentro de la escuela de forma clara y organizada.
        </p>
        <p class="text-[#475569] text-lg mt-4">
            Garantiza una gestión eficiente de salones, laboratorios, el comedor y otras áreas comunes.
        </p>
    </div>
</section>

<!-- Áreas reservables -->
<section class="bg-white py-16 px-6">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold text-center text-[#1e293b] mb-10">Espacios Reservables (Ejemplo)</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white border border-[#e2e8f0] rounded-lg shadow-sm p-6">
                <h3 class="text-xl font-semibold text-[#1e293b] mb-2">Laboratorio de Informática</h3>
                <p class="text-[#475569] mb-3">Computadoras para clases técnicas o talleres.</p>
                <p class="text-sm text-[#64748b]"><strong>Horario disponible:</strong> 8:00 - 18:00</p>
            </div>
            <div class="bg-white border border-[#e2e8f0] rounded-lg shadow-sm p-6">
                <h3 class="text-xl font-semibold text-[#1e293b] mb-2">Salón de Actos</h3>
                <p class="text-[#475569] mb-3">Reservable para eventos escolares o externos.</p>
                <p class="text-sm text-[#64748b]"><strong>Horario disponible:</strong> 9:00 - 17:00</p>
            </div>
            <div class="bg-white border border-[#e2e8f0] rounded-lg shadow-sm p-6">
                <h3 class="text-xl font-semibold text-[#1e293b] mb-2">Comedor Escolar</h3>
                <p class="text-[#475569] mb-3">Reservas posibles para uso institucional o externo.</p>
                <p class="text-sm text-[#64748b]"><strong>Horario disponible:</strong> 12:00 - 14:00</p>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>