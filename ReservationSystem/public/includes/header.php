<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include 'frameworks.php'; ?>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-md">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <!-- Logo y Navegación -->
                <div class="flex items-center">
                    <a href="index.php" class="flex items-center">
                        <img src="assets/img/logo.png" alt="Logo EEST N° 1 Chivilcoy" class="h-12 mr-3">
                        <span class="text-xl font-semibold text-gray-800">EEST N° 1</span>
                    </a>

                    <!-- Navegación Desktop -->
                    <nav class="hidden md:flex ml-10 space-x-6">
                        <a href="index.php"
                            class="text-gray-700 hover:text-blue-600 px-2 py-1 rounded-md font-medium transition duration-150 ease-in-out flex items-center">
                            <i class="ti ti-home mr-1"></i> Inicio
                        </a>
                        <a href="reservas.php"
                            class="text-gray-700 hover:text-blue-600 px-2 py-1 rounded-md font-medium transition duration-150 ease-in-out flex items-center">
                            <i class="ti ti-calendar mr-1"></i> Reservas
                        </a>
                        <a href="contacto.php"
                            class="text-gray-700 hover:text-blue-600 px-2 py-1 rounded-md font-medium transition duration-150 ease-in-out flex items-center">
                            <i class="ti ti-mail mr-1"></i> Contacto
                        </a>
                    </nav>
                </div>

                <!-- Botones de acción -->
                <div class="flex items-center space-x-4">
                    <button x-data @click="$dispatch('open-login')"
                        class="hidden md:flex items-center bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition duration-150 ease-in-out">
                        <i class="ti ti-user mr-1"></i> Iniciar Sesión
                    </button>

                    <!-- Toggle Menu Mobile -->
                    <button x-data @click="$dispatch('toggle-mobile-menu')"
                        class="md:hidden rounded-md p-2 text-gray-600 hover:bg-gray-100 focus:outline-none">
                        <i class="ti ti-menu-2 text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Menú móvil -->
        <div x-data="{ mobileMenuOpen: false }" @toggle-mobile-menu.window="mobileMenuOpen = !mobileMenuOpen"
            x-show="mobileMenuOpen" x-cloak class="md:hidden bg-white border-t border-gray-200">
            <div class="px-4 py-3 space-y-1">
                <a href="index.php" class="block py-2 px-4 text-gray-700 hover:bg-gray-100 rounded-md">
                    <i class="ti ti-home mr-1"></i> Inicio
                </a>
                <a href="reservas.php" class="block py-2 px-4 text-gray-700 hover:bg-gray-100 rounded-md">
                    <i class="ti ti-calendar mr-1"></i> Reservas
                </a>
                <a href="contacto.php" class="block py-2 px-4 text-gray-700 hover:bg-gray-100 rounded-md">
                    <i class="ti ti-mail mr-1"></i> Contacto
                </a>
                <button @click="$dispatch('open-login')"
                    class="w-full text-left py-2 px-4 text-gray-700 hover:bg-gray-100 rounded-md">
                    <i class="ti ti-user mr-1"></i> Iniciar Sesión
                </button>
            </div>
        </div>
    </header>

    <!-- Modal de inicio de sesión -->
    <div x-data="{ loginOpen: false }" @open-login.window="loginOpen = true" x-show="loginOpen" x-cloak
        class="fixed inset-0 z-50 overflow-y-auto bg-black bg-opacity-50 flex items-center justify-center">
        <div @click.away="loginOpen = false" class="bg-white rounded-lg shadow-xl max-w-md w-full p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-medium text-gray-900">Iniciar Sesión</h3>
                <button @click="loginOpen = false" class="text-gray-400 hover:text-gray-500">
                    <i class="ti ti-x text-xl"></i>
                </button>
            </div>
            <form class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Usuario</label>
                    <input type="text"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Contraseña</label>
                    <input type="password"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input type="checkbox"
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label class="ml-2 block text-sm text-gray-900">Recordarme</label>
                    </div>
                    <a href="#" class="text-sm text-blue-600 hover:text-blue-500">¿Olvidaste tu contraseña?</a>
                </div>
                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Ingresar
                    </button>
                </div>
            </form>
        </div>
    </div>