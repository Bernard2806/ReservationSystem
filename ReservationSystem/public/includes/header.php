<?php
// Establecer título por defecto si no se proporciona
$pageTitle = isset($pageTitle) ? $pageTitle . ' - EEST N° 1' : 'EEST N° 1 Chivilcoy';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>

    <?php include 'frameworks.php'; ?>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col bg-slate-50">
    <!-- Header Principal -->
    <header x-data="{ 
        mobileMenuOpen: false,
        userMenuOpen: false,
        isAdmin: true // Esto deberá ser dinámico según el rol del usuario
    }" class="relative bg-gradient-to-r from-indigo-600 to-blue-500 text-white shadow-lg">

        <!-- Contenido principal del header -->
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-3 lg:py-4">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="index.php" class="flex items-center group">
                        <div
                            class="bg-white p-1.5 rounded-lg shadow mr-3 transform group-hover:scale-105 transition-transform duration-300">
                            <img src="assets/img/logo.png" alt="Logo EEST N° 1" class="h-10">
                        </div>
                        <div>
                            <span class="text-xl font-bold text-white tracking-tight">EEST N° 1</span>
                            <span class="block text-xs text-indigo-100">Escuela de Educación Secundaria Técnica</span>
                        </div>
                    </a>
                </div>

                <!-- Navegación Desktop -->
                <nav class="hidden lg:flex items-center space-x-1">
                    <a href="index.php" class="nav-link">
                        <i class="ti ti-home"></i>
                        <span>Inicio</span>
                    </a>
                    <a href="reservas.php" class="nav-link">
                        <i class="ti ti-calendar"></i>
                        <span>Reservas</span>
                    </a>
                    <a href="contacto.php" class="nav-link">
                        <i class="ti ti-mail"></i>
                        <span>Contacto</span>
                    </a>

                    <!-- Menú Admin (visible solo para administradores) -->
                    <template x-if="isAdmin">
                        <div class="relative" x-data="{ adminMenuOpen: false }">
                            <button @click="adminMenuOpen = !adminMenuOpen"
                                @keydown.escape.window="adminMenuOpen = false" class="nav-link group">
                                <i class="ti ti-settings"></i>
                                <span>Administración</span>
                                <i class="ti ti-chevron-down transition-transform duration-200"
                                    :class="{'rotate-180': adminMenuOpen}"></i>
                            </button>
                            <div x-show="adminMenuOpen" @click.away="adminMenuOpen = false"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-95"
                                class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-xl py-2 z-50 border border-gray-100">
                                <div class="px-3 py-2 border-b border-gray-100">
                                    <h3 class="text-sm font-semibold text-gray-800">Panel de Administración</h3>
                                </div>
                                <div class="py-1">
                                    <a href="admin/usuarios.php" class="admin-menu-item">
                                        <i class="ti ti-users text-indigo-600"></i>
                                        <span>Gestión de Usuarios</span>
                                    </a>
                                    <a href="admin/areas.php" class="admin-menu-item">
                                        <i class="ti ti-building text-indigo-600"></i>
                                        <span>Áreas Reservables</span>
                                    </a>
                                    <a href="admin/reservas.php" class="admin-menu-item">
                                        <i class="ti ti-calendar-stats text-indigo-600"></i>
                                        <span>Control de Reservas</span>
                                    </a>
                                    <a href="admin/informes.php" class="admin-menu-item">
                                        <i class="ti ti-report text-indigo-600"></i>
                                        <span>Informes</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </template>
                </nav>

                <!-- Botones de acción -->
                <div class="flex items-center space-x-3">
                    <button x-data @click="$dispatch('open-login')"
                        class="hidden md:flex items-center bg-white text-indigo-700 hover:bg-indigo-50 px-4 py-2 rounded-lg shadow transition-colors font-medium">
                        <i class="ti ti-user mr-1.5"></i> Iniciar Sesión
                    </button>

                    <!-- Toggle Menu Mobile -->
                    <button @click="mobileMenuOpen = !mobileMenuOpen"
                        class="lg:hidden rounded-lg p-2 text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-300 transition">
                        <i class="ti ti-menu-2 text-xl" x-show="!mobileMenuOpen"></i>
                        <i class="ti ti-x text-xl" x-show="mobileMenuOpen"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Menú móvil -->
        <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-10" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-10" x-cloak
            class="lg:hidden bg-white absolute w-full z-20 shadow-lg">
            <div class="py-3 divide-y divide-gray-100">
                <div class="space-y-1 px-3 pb-3">
                    <a href="index.php" class="mobile-nav-item">
                        <i class="ti ti-home text-indigo-600"></i> Inicio
                    </a>
                    <a href="reservas.php" class="mobile-nav-item">
                        <i class="ti ti-calendar text-indigo-600"></i> Reservas
                    </a>
                    <a href="contacto.php" class="mobile-nav-item">
                        <i class="ti ti-mail text-indigo-600"></i> Contacto
                    </a>
                </div>

                <!-- Menú Admin Mobile -->
                <template x-if="isAdmin">
                    <div class="pt-2">
                        <div class="text-sm font-semibold text-gray-500 px-4 py-2">Administración</div>
                        <div class="space-y-1 px-3 pb-3">
                            <a href="admin/usuarios.php" class="mobile-nav-item">
                                <i class="ti ti-users text-indigo-600"></i> Gestión de Usuarios
                            </a>
                            <a href="admin/areas.php" class="mobile-nav-item">
                                <i class="ti ti-building text-indigo-600"></i> Áreas Reservables
                            </a>
                            <a href="admin/reservas.php" class="mobile-nav-item">
                                <i class="ti ti-calendar-stats text-indigo-600"></i> Control de Reservas
                            </a>
                            <a href="admin/informes.php" class="mobile-nav-item">
                                <i class="ti ti-report text-indigo-600"></i> Informes
                            </a>
                        </div>
                    </div>
                </template>

                <div class="pt-3 px-3">
                    <button @click="$dispatch('open-login')"
                        class="w-full flex items-center justify-center bg-indigo-600 hover:bg-indigo-700 text-white py-2.5 px-4 rounded-lg transition">
                        <i class="ti ti-user mr-2"></i> Iniciar Sesión
                    </button>
                </div>
            </div>
        </div>
    </header>

    <style>
        .nav-link {
            @apply text-white/90 hover:text-white px-3 py-2 rounded-lg font-medium transition flex items-center space-x-1.5 hover:bg-white/10;
        }

        .admin-menu-item {
            @apply flex items-center space-x-2 px-3 py-2 text-gray-700 hover:bg-indigo-50 hover:text-indigo-700 rounded-md transition;
        }

        .mobile-nav-item {
            @apply flex items-center space-x-2 py-2.5 px-4 text-gray-800 hover:bg-indigo-50 hover:text-indigo-700 rounded-lg transition font-medium;
        }
    </style>