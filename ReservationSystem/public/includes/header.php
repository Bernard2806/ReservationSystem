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
        [x-cloak] { display: none !important; }
    </style>
</head>

<body class="min-h-screen flex flex-col bg-gray-50">
    <header x-data="{ 
        mobileMenuOpen: false,
        userMenuOpen: false,
        isAdmin: true // Esto deberá ser dinámico según el rol del usuario
    }" class="bg-white shadow-md">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="index.php" class="flex items-center">
                        <img src="assets/img/logo.png" alt="Logo EEST N° 1" class="h-10 mr-3">
                        <span class="text-xl font-semibold text-gray-800">EEST N° 1</span>
                    </a>
                </div>

                <!-- Navegación Desktop -->
                <nav class="hidden lg:flex items-center space-x-6">
                    <a href="index.php" class="nav-link"><i class="ti ti-home"></i> Inicio</a>
                    <a href="reservas.php" class="nav-link"><i class="ti ti-calendar"></i> Reservas</a>
                    <a href="contacto.php" class="nav-link"><i class="ti ti-mail"></i> Contacto</a>
                    
                    <!-- Menú Admin (visible solo para administradores) -->
                    <template x-if="isAdmin">
                        <div class="relative" x-data="{ adminMenuOpen: false }">
                            <button @click="adminMenuOpen = !adminMenuOpen" 
                                    class="nav-link flex items-center">
                                <i class="ti ti-settings"></i> 
                                Administración 
                                <i class="ti ti-chevron-down ml-1"></i>
                            </button>
                            <div x-show="adminMenuOpen" 
                                 @click.away="adminMenuOpen = false"
                                 x-transition
                                 class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                                <a href="admin/usuarios.php" class="admin-menu-item">
                                    <i class="ti ti-users"></i> Gestión de Usuarios
                                </a>
                                <a href="admin/areas.php" class="admin-menu-item">
                                    <i class="ti ti-building"></i> Áreas Reservables
                                </a>
                                <a href="admin/reservas.php" class="admin-menu-item">
                                    <i class="ti ti-calendar-stats"></i> Control de Reservas
                                </a>
                                <a href="admin/informes.php" class="admin-menu-item">
                                    <i class="ti ti-report"></i> Informes
                                </a>
                            </div>
                        </div>
                    </template>
                </nav>

                <!-- Botones de acción -->
                <div class="flex items-center space-x-4">
                    <button x-data @click="$dispatch('open-login')"
                            class="hidden md:flex items-center bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition">
                        <i class="ti ti-user mr-1"></i> Iniciar Sesión
                    </button>

                    <!-- Toggle Menu Mobile -->
                    <button @click="mobileMenuOpen = !mobileMenuOpen"
                            class="lg:hidden rounded-md p-2 text-gray-600 hover:bg-gray-100">
                        <i class="ti ti-menu-2 text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Menú móvil -->
            <div x-show="mobileMenuOpen" 
                 x-transition
                 x-cloak 
                 class="lg:hidden border-t border-gray-200">
                <div class="px-4 py-3 space-y-1">
                    <a href="index.php" class="mobile-nav-item">
                        <i class="ti ti-home"></i> Inicio
                    </a>
                    <a href="reservas.php" class="mobile-nav-item">
                        <i class="ti ti-calendar"></i> Reservas
                    </a>
                    <a href="contacto.php" class="mobile-nav-item">
                        <i class="ti ti-mail"></i> Contacto
                    </a>
                    
                    <!-- Menú Admin Mobile -->
                    <template x-if="isAdmin">
                        <div class="border-t border-gray-200 pt-2 mt-2">
                            <div class="text-sm font-semibold text-gray-600 px-4 py-2">Administración</div>
                            <a href="admin/usuarios.php" class="mobile-nav-item">
                                <i class="ti ti-users"></i> Gestión de Usuarios
                            </a>
                            <a href="admin/areas.php" class="mobile-nav-item">
                                <i class="ti ti-building"></i> Áreas Reservables
                            </a>
                            <a href="admin/reservas.php" class="mobile-nav-item">
                                <i class="ti ti-calendar-stats"></i> Control de Reservas
                            </a>
                            <a href="admin/informes.php" class="mobile-nav-item">
                                <i class="ti ti-report"></i> Informes
                            </a>
                        </div>
                    </template>
                    
                    <button @click="$dispatch('open-login')"
                            class="w-full text-left mobile-nav-item">
                        <i class="ti ti-user"></i> Iniciar Sesión
                    </button>
                </div>
            </div>
        </div>
    </header>

    <style>
        .nav-link {
            @apply text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md font-medium transition flex items-center;
        }
        .admin-menu-item {
            @apply block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center gap-2;
        }
        .mobile-nav-item {
            @apply block py-2 px-4 text-gray-700 hover:bg-gray-100 rounded-md flex items-center gap-2;
        }
    </style>
</body>
</html>