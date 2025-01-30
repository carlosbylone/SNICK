<?php
include_once('conexion_bd.php');

function conectarproductosHombre() {
    $conexion = conectarBD();

    if (!$conexion) {
        die("Error: No se pudo establecer la conexión con la base de datos.");
    }

    $productos = [
        ["nombre" => "Jeans Azul", "ruta" => "assets/Imagenes/je2.jpg", "precio" => 25.99],
        ["nombre" => "Jeans Negro", "ruta" => "assets/Imagenes/je.jpg", "precio" => 30.50],
        ["nombre" => "Jersey Casual", "ruta" => "assets/Imagenes/jersey.jpg", "precio" => 20.00],
        ["nombre" => "Chaqueta Jeans", "ruta" => "assets/Imagenes/chaqueta_jeans.webp", "precio" => 45.99],
        ["nombre" => "Cucinelli", "ruta" => "assets/Imagenes/cucinelli.webp", "precio" => 120.00],
        ["nombre" => "Camisa Blanca", "ruta" => "assets/Imagenes/Camisa.webp", "precio" => 35.00],
        ["nombre" => "Camisa Azul", "ruta" => "assets/Imagenes/camisa1.webp", "precio" => 32.99],
        ["nombre" => "Camisa Rayada", "ruta" => "assets/Imagenes/camisa2.webp", "precio" => 28.50],
        ["nombre" => "Camiseta Casual", "ruta" => "assets/Imagenes/camiseta.webp", "precio" => 15.75],
        ["nombre" => "Polo Clásico", "ruta" => "assets/Imagenes/polo.jpg", "precio" => 40.00],
        ["nombre" => "Polo Deportivo", "ruta" => "assets/Imagenes/polo1.webp", "precio" => 38.50],
        ["nombre" => "Polo Elegante", "ruta" => "assets/Imagenes/poloo.webp", "precio" => 50.00],
        ["nombre" => "Jersey Deportivo", "ruta" => "assets/Imagenes/1jersey.jpg", "precio" => 22.99]
    ];

    // Verificar si el producto ya existe antes de insertarlo
    $sql = "INSERT INTO productos (Imagen, nombre_productos, Precio) 
            VALUES (?, ?, ?)
            ON DUPLICATE KEY UPDATE 
            Precio = VALUES(Precio), Imagen = VALUES(Imagen)";

    $stmt = $conexion->prepare($sql);

    if (!$stmt) {
        die("Error al preparar la consulta: " . $conexion->error);
    }

    foreach ($productos as $producto) {
        try {
            $stmt->bind_param("ssd", $producto["ruta"], $producto["nombre"], $producto["precio"]);
            $stmt->execute();
        } catch (mysqli_sql_exception $e) {
            error_log("Error al insertar producto: " . $e->getMessage());
        }
    }

    $stmt->close();
    $conexion->close();
}

function conectarproductosMujer() {
    $conexion = conectarBD();

    if (!$conexion) {
        die("Error: No se pudo establecer la conexión con la base de datos.");
    }

    $productos = [
        ["nombre" => "Blusa negra", "ruta" => "assets/Imagenes/blusa.webp", "precio" => 25.99],
        ["nombre" => "Blusa floral", "ruta" => "assets/Imagenes/Blusaingles.webp", "precio" => 30.50],
        ["nombre" => "Conjunto negro", "ruta" => "assets/Imagenes/Con2.jpg", "precio" => 20.00],
        ["nombre" => "Conjunto Rojo", "ruta" => "assets/Imagenes/Conjunto1.webp", "precio" => 45.99],
        ["nombre" => "Conjunto Coral", "ruta" => "assets/Imagenes/coral.webp", "precio" => 120.00],
        ["nombre" => "Conjunto Blanco", "ruta" => "assets/Imagenes/elegantemujer.webp", "precio" => 35.00],
        ["nombre" => "Falda floral", "ruta" => "assets/Imagenes/faldalarga.webp", "precio" => 32.99],
        ["nombre" => "Vestido Gala Verde", "ruta" => "assets/Imagenes/vestidogala.webp", "precio" => 28.50],
        ["nombre" => "Vestido Playa", "ruta" => "assets/Imagenes/vestidoplaya.webp", "precio" => 15.75],
        ["nombre" => "Conjunto Beige Clásico", "ruta" => "assets/Imagenes/women2.jpg", "precio" => 40.00],
        ["nombre" => "AmericanaNegra", "ruta" => "assets/Imagenes/womenn.jpg", "precio" => 38.50]
    ];

    $sql = "INSERT INTO productos_mujer (Imagen, nombre_productos, Precio) 
            VALUES (?, ?, ?)
            ON DUPLICATE KEY UPDATE 
            Precio = VALUES(Precio), Imagen = VALUES(Imagen)";

    $stmt = $conexion->prepare($sql);

    if (!$stmt) {
        die("Error al preparar la consulta: " . $conexion->error);
    }

    foreach ($productos as $producto) {
        try {
            $stmt->bind_param("ssd", $producto["ruta"], $producto["nombre"], $producto["precio"]);
            $stmt->execute();
        } catch (mysqli_sql_exception $e) {
            error_log("Error al insertar producto: " . $e->getMessage());
        }
    }

    $stmt->close();
    $conexion->close();
}
