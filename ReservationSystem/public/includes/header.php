<?php
$pageTitle = isset($pageTitle) ? $pageTitle . ' - EEST N° 1' : 'EEST N° 1 Chivilcoy';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle; ?></title>

    <?php include 'frameworks.php'; ?>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-slate-50 min-h-screen flex flex-col">

    <header x-data="{ mobileOpen: false, adminOpen: false }"
        class="bg-gradient-to-r from-indigo-600 to-blue-500 text-white shadow-md z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <a href="index.php" class="flex items-center space-x-3">
                    <img src="assets/img/logo.png" alt="Logo" class="h-10 bg-white p-1.5 rounded-lg shadow" />
                    <div>
                        <h1 class="text-xl font-bold">EEST N° 1</h1>
                    </div>
                </a>

                <!-- Desktop Nav -->
                <nav class="hidden lg:flex items-center space-x-6">
                    <a href="index.php" class="hover:text-white/90 font-medium flex items-center space-x-1">
                        <i class="ti ti-home"></i><span>Inicio</span>
                    </a>
                    <a href="reservas.php" class="hover:text-white/90 font-medium flex items-center space-x-1">
                        <i class="ti ti-calendar"></i><span>Reservas</span>
                    </a>
                    <a href="contacto.php" class="hover:text-white/90 font-medium flex items-center space-x-1">
                        <i class="ti ti-mail"></i><span>Contacto</span>
                    </a>

                    <!-- Admin Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" @keydown.escape.window="open = false"
                            class="flex items-center space-x-1 font-medium hover:text-white/90">
                            <i class="ti ti-settings"></i><span>Administración</span>
                            <i class="ti ti-chevron-down" :class="{ 'rotate-180': open }"
                                class="transition-transform"></i>
                        </button>
                        <div x-show="open" @click.away="open = false" x-transition
                            class="absolute right-0 mt-2 w-56 bg-white text-gray-700 rounded-lg shadow-lg py-2 z-50">
                            <a href="admin/usuarios.php"
                                class="block px-4 py-2 hover:bg-indigo-50 hover:text-indigo-700 flex items-center space-x-2">
                                <i class="ti ti-users text-indigo-600"></i><span>Gestión de Usuarios</span>
                            </a>
                            <a href="admin/areas.php"
                                class="block px-4 py-2 hover:bg-indigo-50 hover:text-indigo-700 flex items-center space-x-2">
                                <i class="ti ti-building text-indigo-600"></i><span>Áreas Reservables</span>
                            </a>
                            <a href="admin/reservas.php"
                                class="block px-4 py-2 hover:bg-indigo-50 hover:text-indigo-700 flex items-center space-x-2">
                                <i class="ti ti-calendar-stats text-indigo-600"></i><span>Control de Reservas</span>
                            </a>
                            <a href="admin/informes.php"
                                class="block px-4 py-2 hover:bg-indigo-50 hover:text-indigo-700 flex items-center space-x-2">
                                <i class="ti ti-report text-indigo-600"></i><span>Informes</span>
                            </a>
                        </div>
                    </div>
                </nav>

                <!-- Actions -->
                <div class="flex items-center space-x-3">
                    <button @click="$dispatch('open-login')"
                        class="hidden md:inline-flex items-center bg-white text-indigo-700 hover:bg-indigo-100 px-4 py-2 rounded-lg font-medium transition shadow">
                        <i class="ti ti-user mr-2"></i>Iniciar Sesión
                    </button>
                    <button @click="mobileOpen = !mobileOpen" class="lg:hidden text-white focus:outline-none">
                        <i :class="mobileOpen ? 'ti ti-x' : 'ti ti-menu-2'" class="text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileOpen" x-transition x-cloak
            class="lg:hidden bg-white text-gray-800 border-t border-indigo-200 shadow-md">
            <div class="space-y-1 px-4 py-3">
                <a href="index.php" class="block py-2 hover:text-indigo-700">Inicio</a>
                <a href="reservas.php" class="block py-2 hover:text-indigo-700">Reservas</a>
                <a href="contacto.php" class="block py-2 hover:text-indigo-700">Contacto</a>
            </div>
            <div class="border-t border-gray-100 mt-2 px-4 py-3">
                <p class="text-sm text-gray-500 font-semibold mb-2">Administración</p>
                <a href="admin/usuarios.php" class="block py-2 hover:text-indigo-700">Gestión de Usuarios</a>
                <a href="admin/areas.php" class="block py-2 hover:text-indigo-700">Áreas Reservables</a>
                <a href="admin/reservas.php" class="block py-2 hover:text-indigo-700">Control de Reservas</a>
                <a href="admin/informes.php" class="block py-2 hover:text-indigo-700">Informes</a>
            </div>
            <div class="px-4 py-3">
                <button @click="$dispatch('open-login')"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-lg">
                    <i class="ti ti-user mr-2"></i> Iniciar Sesión
                </button>
            </div>
        </div>
    </header>