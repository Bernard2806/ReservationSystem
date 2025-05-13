<?php
/**
 * Componente Header del sistema de reservas
 * ReservationSystem - EEST N° 1 Chivilcoy
 * 
 * Sistema de reservas para la EEST N° 1 Chivilcoy
 * Creado por: Bernardo Andrés, González Erramuspe
 */

// Asegurarse de que se haya calculado una versión
if (!isset($GLOBALS['version'])) {
    include_once 'version.php';
}

// Detectar la página actual para destacarla en el menú
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReservationSystem - EEST N° 1 Chivilcoy</title>
    <meta name="description" content="Sistema de reservas para espacios de la EEST N° 1 Chivilcoy">
    <meta name="author" content="Bernardo Andrés González Erramuspe">

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

    <!-- Incluir frameworks y dependencias -->
    <?php include_once 'frameworks.php'; ?>

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body class="bg-gray-50 min-h-screen flex flex-col">

    <!-- Barra de navegación -->
    <header class="bg-white shadow-sm">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo y nombre del sistema -->
                <div class="flex items-center space-x-3">
                    <a href="index.php" class="flex items-center">
                        <img src="../assets/img/logo.png" alt="Logo EEST N°1" class="h-10 w-auto">
                        <span class="ml-3 text-xl font-bold text-gray-800">ReservationSystem</span>
                    </a>
                </div>

                <!-- Menú de navegación -->
                <nav class="hidden md:flex space-x-6">
                    <a href="index.php"
                        class="<?= $current_page == 'index.php' ? 'text-blue-600 font-medium' : 'text-gray-600 hover:text-blue-600' ?> transition-colors duration-200">
                        <i class="ti ti-home text-lg align-middle"></i>
                        <span class="ml-1">Inicio</span>
                    </a>
                    <a href="reservations.php"
                        class="<?= $current_page == 'reservations.php' ? 'text-blue-600 font-medium' : 'text-gray-600 hover:text-blue-600' ?> transition-colors duration-200">
                        <i class="ti ti-calendar-event text-lg align-middle"></i>
                        <span class="ml-1">Reservas</span>
                    </a>
                    <a href="spaces.php"
                        class="<?= $current_page == 'spaces.php' ? 'text-blue-600 font-medium' : 'text-gray-600 hover:text-blue-600' ?> transition-colors duration-200">
                        <i class="ti ti-building text-lg align-middle"></i>
                        <span class="ml-1">Espacios</span>
                    </a>
                    <a href="reports.php"
                        class="<?= $current_page == 'reports.php' ? 'text-blue-600 font-medium' : 'text-gray-600 hover:text-blue-600' ?> transition-colors duration-200">
                        <i class="ti ti-report text-lg align-middle"></i>
                        <span class="ml-1">Informes</span>
                    </a>
                </nav>

                <!-- Menú de usuario -->
                <div class="flex items-center space-x-4">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <!-- Usuario logueado -->
                        <div x-data="{ isOpen: false }" class="relative">
                            <button @click="isOpen = !isOpen"
                                class="flex items-center text-gray-700 hover:text-blue-600 focus:outline-none">
                                <i class="ti ti-user-circle text-2xl"></i>
                                <span class="ml-2 hidden md:inline"><?= $_SESSION['username'] ?? 'Usuario' ?></span>
                                <i class="ti ti-chevron-down ml-1 text-sm"></i>
                            </button>

                            <!-- Menú desplegable -->
                            <div x-show="isOpen" @click.away="isOpen = false"
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">

                                <a href="profile.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="ti ti-settings text-lg align-middle"></i>
                                    <span class="ml-2">Mi perfil</span>
                                </a>
                                <a href="my_reservations.php"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="ti ti-calendar-check text-lg align-middle"></i>
                                    <span class="ml-2">Mis reservas</span>
                                </a>
                                <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']): ?>
                                    <a href="admin/dashboard.php"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="ti ti-dashboard text-lg align-middle"></i>
                                        <span class="ml-2">Panel admin</span>
                                    </a>
                                <?php endif; ?>
                                <hr class="my-1">
                                <a href="logout.php" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                    <i class="ti ti-logout text-lg align-middle"></i>
                                    <span class="ml-2">Cerrar sesión</span>
                                </a>
                            </div>
                        </div>
                    <?php else: ?>
                        <!-- Usuario no logueado -->
                        <a href="login.php"
                            class="flex items-center text-gray-600 hover:text-blue-600 transition-colors duration-200">
                            <i class="ti ti-login text-lg align-middle"></i>
                            <span class="ml-1 hidden md:inline">Ingresar</span>
                        </a>
                    <?php endif; ?>

                    <!-- Botón de menú móvil -->
                    <button class="md:hidden text-gray-700 hover:text-blue-600 focus:outline-none" x-data="{}"
                        @click="document.querySelector('#mobile-menu').classList.toggle('hidden')">
                        <i class="ti ti-menu-2 text-2xl"></i>
                    </button>
                </div>
            </div>

            <!-- Menú móvil -->
            <div id="mobile-menu" class="md:hidden hidden pb-4">
                <a href="index.php"
                    class="block py-2 px-4 text-gray-600 hover:bg-gray-100 rounded-md <?= $current_page == 'index.php' ? 'bg-gray-100 text-blue-600' : '' ?>">
                    <i class="ti ti-home text-lg align-middle"></i>
                    <span class="ml-2">Inicio</span>
                </a>
                <a href="reservations.php"
                    class="block py-2 px-4 text-gray-600 hover:bg-gray-100 rounded-md <?= $current_page == 'reservations.php' ? 'bg-gray-100 text-blue-600' : '' ?>">
                    <i class="ti ti-calendar-event text-lg align-middle"></i>
                    <span class="ml-2">Reservas</span>
                </a>
                <a href="spaces.php"
                    class="block py-2 px-4 text-gray-600 hover:bg-gray-100 rounded-md <?= $current_page == 'spaces.php' ? 'bg-gray-100 text-blue-600' : '' ?>">
                    <i class="ti ti-building text-lg align-middle"></i>
                    <span class="ml-2">Espacios</span>
                </a>
                <a href="reports.php"
                    class="block py-2 px-4 text-gray-600 hover:bg-gray-100 rounded-md <?= $current_page == 'reports.php' ? 'bg-gray-100 text-blue-600' : '' ?>">
                    <i class="ti ti-report text-lg align-middle"></i>
                    <span class="ml-2">Informes</span>
                </a>
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <a href="login.php"
                        class="block py-2 px-4 text-gray-600 hover:bg-gray-100 rounded-md <?= $current_page == 'login.php' ? 'bg-gray-100 text-blue-600' : '' ?>">
                        <i class="ti ti-login text-lg align-middle"></i>
                        <span class="ml-2">Ingresar</span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <!-- Contenido principal -->
    <main class="flex-grow container mx-auto px-4 py-6"></main>