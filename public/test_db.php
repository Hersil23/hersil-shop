<?php
echo "<h1>Test de Conexión a MySQL</h1>";

echo "<h3>Probando puerto 3307...</h3>";
try {
    $conn = new PDO("mysql:host=localhost;port=3307;dbname=hersil_php", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p style='color: green;'>✅ Conexión exitosa a la base de datos hersil_php en puerto 3307</p>";
    
    $stmt = $conn->query("SELECT COUNT(*) as total FROM usuarios");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "<p style='color: green;'>✅ Usuarios en la BD: " . $result['total'] . "</p>";
    
    $stmt = $conn->query("SELECT COUNT(*) as total FROM productos");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "<p style='color: green;'>✅ Productos en la BD: " . $result['total'] . "</p>";
    
    $stmt = $conn->query("SELECT COUNT(*) as total FROM categorias");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "<p style='color: green;'>✅ Categorías en la BD: " . $result['total'] . "</p>";
    
} catch(PDOException $e) {
    echo "<p style='color: red;'>❌ Error con puerto 3307: " . $e->getMessage() . "</p>";
}
?>
```

**Copia TODO este código, pégalo en `public/test_db.php` y guarda (Ctrl + S)**

---

**Después de guardar ambos archivos, recarga:**
```
http://localhost/hersil_php/public/test_db.php