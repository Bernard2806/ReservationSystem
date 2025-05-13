<?php
require_once __DIR__ . '/../../vendor/autoload.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Reservas - Escuela Técnica</title>

    <!-- Incluir frameworks y dependencias -->
    <?php include_once 'frameworks.php'; ?>
    
    <!-- Estilos personalizados -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">
    <!-- Header/Navbar -->
    <header class="bg-indigo-700 text-white shadow-md">
        <div class="container mx-auto px-4 py-3">
            <div class="flex items-center justify-between">
                <!-- Logo y título -->
                <div class="flex items-center space-x-3">
                    <i class="ti ti-calendar-event text-2xl"></i>
                    <h1 class="text-xl font-bold">Sistema de Reservas</h1>
                </div>

                <!-- Menú de navegación -->
                <nav x-data="{ isOpen: false }" class="relative">
                    <!-- Navegación para escritorio -->
                    <div class="hidden md:flex items-center space-x-6">
                        <a href="index.php" class="hover:text-indigo-200 font-medium transition">Inicio</a>
                        <a href="reservas.php" class="hover:text-indigo-200 font-medium transition">Reservas</a>
                        <a href="espacios.php" class="hover:text-indigo-200 font-medium transition">Espacios</a>
                        <a href="calendario.php" class="hover:text-indigo-200 font-medium transition">Calendario</a>

                        <!-- Botón de perfil -->
                        <div x-data="{ isProfileOpen: false }" class="relative">
                            <button @click="isProfileOpen = !isProfileOpen"
                                class="flex items-center space-x-1 focus:outline-none">
                                <i class="ti ti-user-circle text-xl"></i>
                                <span>Usuario</span>
                                <i class="ti ti-chevron-down text-sm transition"
                                    :class="{'transform rotate-180': isProfileOpen}"></i>
                            </button>

                            <!-- Menú desplegable del perfil -->
                            <div x-show="isProfileOpen" @click.away="isProfileOpen = false"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-100"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-95" x-cloak
                                class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                                <a href="perfil.php" class="block px-4 py-2 text-gray-800 hover:bg-indigo-100">Mi
                                    Perfil</a>
                                <a href="ajustes.php"
                                    class="block px-4 py-2 text-gray-800 hover:bg-indigo-100">Ajustes</a>
                                <hr class="my-1">
                                <a href="logout.php" class="block px-4 py-2 text-gray-800 hover:bg-indigo-100">Cerrar
                                    Sesión</a>
                            </div>
                        </div>
                    </div>

                    <!-- Botón de menú móvil -->
                    <button @click="isOpen = !isOpen" class="md:hidden flex items-center">
                        <i class="ti ti-menu-2 text-2xl"></i>
                    </button>

                    <!-- Menú móvil -->
                    <div x-show="isOpen" @click.away="isOpen = false"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-100"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                        x-cloak class="absolute right-0 mt-3 w-48 bg-white rounded-md shadow-lg py-2 z-50">
                        <a href="index.php" class="block px-4 py-2 text-gray-800 hover:bg-indigo-100">Inicio</a>
                        <a href="reservas.php" class="block px-4 py-2 text-gray-800 hover:bg-indigo-100">Reservas</a>
                        <a href="espacios.php" class="block px-4 py-2 text-gray-800 hover:bg-indigo-100">Espacios</a>
                        <a href="calendario.php"
                            class="block px-4 py-2 text-gray-800 hover:bg-indigo-100">Calendario</a>
                        <hr class="my-1">
                        <a href="perfil.php" class="block px-4 py-2 text-gray-800 hover:bg-indigo-100">Mi Perfil</a>
                        <a href="ajustes.php" class="block px-4 py-2 text-gray-800 hover:bg-indigo-100">Ajustes</a>
                        <a href="logout.php" class="block px-4 py-2 text-gray-800 hover:bg-indigo-100">Cerrar Sesión</a>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <!-- Contenido principal -->
    <main class="flex-grow container mx-auto px-4 py-6"></main>