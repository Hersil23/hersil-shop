<?php
$page_title = "Gestión de Categorías";
require_once __DIR__ . '/../layouts/header.php';

if (!isLoggedIn() || !isAdmin()) {
    $_SESSION['error'] = "No tienes permiso para acceder a esta página";
    redirect('/public/');
    exit;
}

require_once __DIR__ . '/../../models/category.php';
$categoryModel = new Category();

$busqueda = isset($_GET['busqueda']) ? sanitize($_GET['busqueda']) : '';

if ($busqueda) {
    $categories = $categoryModel->search($busqueda);
} else {
    $categories = $categoryModel->getAll();
}
?>

<div class="bg-slate-50 dark:bg-slate-900/50 min-h-screen py-8">
    <div class="container mx-auto px-4">
        
        <div class="mb-8">
            <h1 class="text-3xl md:text-4xl font-bold mb-2 flex items-center">
                <i class="fas fa-tags mr-3 text-blue-600 dark:text-blue-400"></i>
                Gestión de Categorías
            </h1>
            <p class="text-slate-600 dark:text-slate-400">Administra las categorías de productos</p>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg p-6 mb-6 border border-slate-200 dark:border-slate-700">
            <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
                
                <form method="GET" class="flex-1 w-full md:w-auto">
                    <div class="relative">
                        <input 
                            type="text" 
                            name="busqueda" 
                            placeholder="Buscar categorías..."
                            value="<?php echo htmlspecialchars($busqueda); ?>"
                            class="w-full px-4 py-3 pl-10 bg-slate-50 dark:bg-slate-900 border border-slate-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-slate-900 dark:text-slate-100"
                        >
                        <i class="fas fa-search absolute left-3 top-4 text-slate-400"></i>
                    </div>
                </form>

                <div class="flex gap-3 w-full md:w-auto">
                    <button onclick="addCategory()" 
                            class="flex-1 md:flex-none px-6 py-3 bg-blue-800 hover:bg-blue-900 text-white rounded-lg transition-colors font-semibold">
                        <i class="fas fa-plus mr-2"></i>Nueva Categoría
                    </button>
                    
                    <?php if ($busqueda): ?>
                    <a href="<?php echo BASE_URL; ?>/public/admin/categorias" 
                       class="px-4 py-3 bg-slate-200 dark:bg-slate-700 rounded-lg hover:bg-slate-300 dark:hover:bg-slate-600 transition-colors">
                        <i class="fas fa-times"></i>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php if (empty($categories)): ?>
                <div class="col-span-full bg-white dark:bg-slate-800 rounded-xl shadow-lg p-12 text-center border border-slate-200 dark:border-slate-700">
                    <i class="fas fa-folder-open text-6xl text-slate-300 dark:text-slate-600 mb-4"></i>
                    <h3 class="text-xl font-bold mb-2">No se encontraron categorías</h3>
                    <p class="text-slate-600 dark:text-slate-400 mb-4">
                        <?php echo $busqueda ? 'Intenta con otros términos de búsqueda' : 'Comienza creando una nueva categoría'; ?>
                    </p>
                </div>
            <?php else: ?>
                <?php foreach ($categories as $category): ?>
                    <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg overflow-hidden border border-slate-200 dark:border-slate-700 hover:shadow-2xl transition-all">
                        <div class="p-6">
                            <div class="flex items-start justify-between mb-4">
                                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-700 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-folder text-3xl text-white"></i>
                                </div>
                                <span class="px-3 py-1 rounded-full text-xs font-semibold <?php echo $category['activo'] ? 'bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400' : 'bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-400'; ?>">
                                    <?php echo $category['activo'] ? 'Activa' : 'Inactiva'; ?>
                                </span>
                            </div>

                            <h3 class="text-xl font-bold mb-2">
                                <?php echo htmlspecialchars($category['nombre']); ?>
                            </h3>

                            <p class="text-sm text-slate-600 dark:text-slate-400 mb-4 line-clamp-2 min-h-[2.5rem]">
                                <?php echo htmlspecialchars($category['descripcion'] ?? 'Sin descripción'); ?>
                            </p>

                            <div class="flex items-center gap-4 text-sm text-slate-500 dark:text-slate-400 mb-4 pb-4 border-b border-slate-200 dark:border-slate-700">
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-box"></i>
                                    <span><?php echo $category['total_productos'] ?? 0; ?> productos</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-hashtag"></i>
                                    <span>ID: <?php echo $category['id']; ?></span>
                                </div>
                            </div>

                            <div class="flex gap-2">
                                <button onclick="viewCategory(<?php echo $category['id']; ?>)" 
                                        class="flex-1 px-4 py-2 bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-lg hover:bg-blue-200 dark:hover:bg-blue-900/50 transition-colors text-sm font-semibold">
                                    <i class="fas fa-eye mr-2"></i>Ver
                                </button>
                                <button onclick="editCategory(<?php echo $category['id']; ?>, '<?php echo htmlspecialchars($category['nombre']); ?>')" 
                                        class="flex-1 px-4 py-2 bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400 rounded-lg hover:bg-green-200 dark:hover:bg-green-900/50 transition-colors text-sm font-semibold">
                                    <i class="fas fa-edit mr-2"></i>Editar
                                </button>
                                <button onclick="toggleCategory(<?php echo $category['id']; ?>, <?php echo $category['activo'] ? 'false' : 'true'; ?>)" 
                                        class="px-4 py-2 bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-400 rounded-lg hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors text-sm"
                                        title="<?php echo $category['activo'] ? 'Desactivar' : 'Activar'; ?>">
                                    <i class="fas fa-<?php echo $category['activo'] ? 'toggle-on' : 'toggle-off'; ?>"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <?php if (!empty($categories)): ?>
        <div class="mt-6 bg-white dark:bg-slate-800 rounded-xl shadow-lg p-4 border border-slate-200 dark:border-slate-700">
            <p class="text-sm text-slate-600 dark:text-slate-400">
                Total de categorías: <strong><?php echo count($categories); ?></strong>
            </p>
        </div>
        <?php endif; ?>
    </div>
</div>

<script>
function addCategory() {
    alert('Crear nueva categoría\n(Funcionalidad pendiente)');
}

function viewCategory(id) {
    window.location.href = '<?php echo BASE_URL; ?>/public/productos?categoria=' + id;
}

function editCategory(id, nombre) {
    alert('Editar categoría "' + nombre + '" (ID: ' + id + ')\n(Funcionalidad pendiente)');
}

function toggleCategory(id, activate) {
    const action = activate ? 'activar' : 'desactivar';
    if (confirm('¿Estás seguro de ' + action + ' esta categoría?')) {
        alert('Cambiar estado de categoría #' + id + '\n(Funcionalidad pendiente)');
    }
}
</script>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>