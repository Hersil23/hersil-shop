</main>

    <!-- Footer -->
    <footer class="bg-slate-100 dark:bg-slate-900 border-t border-slate-200 dark:border-slate-800 mt-16 transition-colors duration-300">
        <div class="container mx-auto px-4 py-8">
            <!-- Mobile First: Stack en móvil, Grid en desktop -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                
                <!-- Columna 1: Sobre Nosotros -->
                <div class="text-center md:text-left">
                    <div class="flex items-center justify-center md:justify-start space-x-3 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-800 to-blue-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-bolt text-white"></i>
                        </div>
                        <span class="text-xl font-bold">Hersil Shop</span>
                    </div>
                    <p class="text-slate-600 dark:text-slate-400 text-sm">
                        Tu tienda de confianza para productos electrónicos de calidad. 
                        Los mejores precios y servicio al cliente.
                    </p>
                </div>

                <!-- Columna 2: Enlaces Rápidos -->
                <div class="text-center md:text-left">
                    <h3 class="font-bold text-lg mb-4">Enlaces Rápidos</h3>
                    <ul class="space-y-2 text-sm">
                        <li>
                            <a href="<?php echo BASE_URL; ?>/" 
                               class="text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors flex items-center justify-center md:justify-start">
                                <i class="fas fa-home w-5"></i>
                                <span>Inicio</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>/productos" 
                               class="text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors flex items-center justify-center md:justify-start">
                                <i class="fas fa-shopping-bag w-5"></i>
                                <span>Productos</span>
                            </a>
                        </li>
                        <?php if (!isLoggedIn()): ?>
                        <li>
                            <a href="<?php echo BASE_URL; ?>/login" 
                               class="text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors flex items-center justify-center md:justify-start">
                                <i class="fas fa-sign-in-alt w-5"></i>
                                <span>Iniciar Sesión</span>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>

                <!-- Columna 3: Contacto -->
                <div class="text-center md:text-left">
                    <h3 class="font-bold text-lg mb-4">Contacto</h3>
                    <ul class="space-y-3 text-sm">
                        <li class="flex items-center justify-center md:justify-start">
                            <i class="fas fa-envelope text-blue-600 dark:text-blue-400 w-5"></i>
                            <a href="mailto:herasidesweb@gmail.com" 
                               class="text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                                herasidesweb@gmail.com
                            </a>
                        </li>
                        <li class="flex items-center justify-center md:justify-start">
                            <i class="fas fa-map-marker-alt text-blue-600 dark:text-blue-400 w-5"></i>
                            <span class="text-slate-600 dark:text-slate-400">Venezuela</span>
                        </li>
                    </ul>
                    
                    <!-- Redes Sociales -->
                    <div class="flex justify-center md:justify-start space-x-4 mt-4">
                        <a href="#" class="w-10 h-10 bg-slate-200 dark:bg-slate-800 rounded-full flex items-center justify-center hover:bg-blue-600 hover:text-white transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-slate-200 dark:bg-slate-800 rounded-full flex items-center justify-center hover:bg-blue-600 hover:text-white transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-slate-200 dark:bg-slate-800 rounded-full flex items-center justify-center hover:bg-blue-600 hover:text-white transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div class="border-t border-slate-200 dark:border-slate-800 pt-6">
                <div class="text-center space-y-4">
                    <!-- Copyright principal -->
                    <p class="text-sm text-slate-600 dark:text-slate-400">
                        &copy; <?php echo date('Y'); ?> Hersil Shop. Todos los derechos reservados.
                    </p>
                    
                    <!-- Desarrollador -->
                    <div class="flex flex-col items-center space-y-3">
                        <p class="text-sm text-slate-500 dark:text-slate-500">
                            Desarrollado por <a href="https://herasi.dev" target="_blank" rel="noopener" class="font-semibold text-blue-600 dark:text-blue-400 hover:underline">@herasi.dev</a>
                        </p>
                        
                        <!-- Redes sociales del desarrollador -->
                        <div class="flex items-center space-x-4">
                            <a href="https://www.instagram.com/herasi.dev" target="_blank" rel="noopener" 
                               class="group flex items-center space-x-2 text-slate-600 dark:text-slate-400 hover:text-pink-600 dark:hover:text-pink-400 transition-colors">
                                <div class="w-8 h-8 rounded-full bg-slate-200 dark:bg-slate-700 flex items-center justify-center group-hover:bg-pink-600 group-hover:text-white transition-colors">
                                    <i class="fab fa-instagram"></i>
                                </div>
                                <span class="text-xs font-medium">@herasi.dev</span>
                            </a>
                            
                            <a href="https://www.tiktok.com/@herasi.dev" target="_blank" rel="noopener" 
                               class="group flex items-center space-x-2 text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white transition-colors">
                                <div class="w-8 h-8 rounded-full bg-slate-200 dark:bg-slate-700 flex items-center justify-center group-hover:bg-slate-900 group-hover:text-white transition-colors">
                                    <i class="fab fa-tiktok"></i>
                                </div>
                                <span class="text-xs font-medium">@herasi.dev</span>
                            </a>
                            
                            <a href="https://herasi.dev" target="_blank" rel="noopener" 
                               class="group flex items-center space-x-2 text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                                <div class="w-8 h-8 rounded-full bg-slate-200 dark:bg-slate-700 flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition-colors">
                                    <i class="fas fa-globe"></i>
                                </div>
                                <span class="text-xs font-medium">herasi.dev</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </footer>

    <!-- JavaScript para menú móvil y tema -->
    <script src="<?php echo BASE_URL; ?>/public/js/theme.js"></script>
    <script>
        // Toggle menú móvil desde la derecha
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
            const mobileMenuClose = document.getElementById('mobile-menu-close');

            function openMobileMenu() {
                console.log('Abriendo menú móvil');
                mobileMenu.classList.remove('translate-x-full');
                mobileMenuOverlay.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }

            function closeMobileMenu() {
                console.log('Cerrando menú móvil');
                mobileMenu.classList.add('translate-x-full');
                mobileMenuOverlay.classList.add('hidden');
                document.body.style.overflow = '';
            }

            if (mobileMenuButton) {
                mobileMenuButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    openMobileMenu();
                });
            }

            if (mobileMenuClose) {
                mobileMenuClose.addEventListener('click', function(e) {
                    e.preventDefault();
                    closeMobileMenu();
                });
            }

            if (mobileMenuOverlay) {
                mobileMenuOverlay.addEventListener('click', closeMobileMenu);
            }

            // Cerrar menú al hacer clic en un enlace
            const menuLinks = document.querySelectorAll('#mobile-menu a');
            menuLinks.forEach(link => {
                link.addEventListener('click', function() {
                    setTimeout(closeMobileMenu, 100);
                });
            });
        });
    </script>

    <?php if (isset($extra_js)): ?>
        <?php echo $extra_js; ?>
    <?php endif; ?>

</body>
</html>