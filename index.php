<?php
/* require_once 'ventas/Venta.php';
require_once 'ventas/Producto.php';
require_once 'ventas/Cliente.php';
require_once 'ventas/Inventario.php';
require_once 'ventas/RegistroVenta.php';

$producto1 = new Producto('Camiseta', 20, 50);
$producto2 = new Producto('Zapatos', 80, 30);
$cliente1 = new Cliente('Juan Pérez', 'Av. Principal 123', '987654321');

$inventario = new Inventario();
$inventario->agregarProducto($producto1);
$inventario->agregarProducto($producto2);

$ventaCliente1 = new Venta($producto1, 5, $cliente1);

$registroVentas = new RegistroVenta();
$registroVentas->agregarVenta($ventaCliente1);

echo "Productos en inventario:\n";
$inventario->listarProductos();

$totalVentas = $registroVentas->calcularTotalVentas();
echo "\nTotal de ventas realizadas: $totalVentas USD\n"; */

require_once 'ventas/Venta.php';
require_once 'ventas/Producto.php';
require_once 'ventas/Cliente.php';
require_once 'ventas/Inventario.php';
require_once 'ventas/RegistroVenta.php';

$inventario = new Inventario();

echo "\n========================================================\n";
echo "Ingrese productos al inventario\n";
echo "========================================================\n";

while (true) {
    echo "\nNombre del producto (o 'fin' para finalizar): ";
    $nombre = trim(fgets(STDIN));

    if ($nombre === 'fin') {
        break;
    }

    echo "Precio del producto: " ;
    $precio = (float) trim(fgets(STDIN));

    echo "Cantidad disponible: ";
    $cantidad = (int) trim(fgets(STDIN));

    $producto = new Producto($nombre, $precio, $cantidad);
    $inventario->agregarProducto($producto);
}

echo "\n========================================================\n";
echo "Ingrese el nombre del cliente:";

$nombreCliente = trim(fgets(STDIN));
$cliente = new Cliente($nombreCliente);
echo "========================================================\n";

$venta = new Venta($cliente);
while (true) {
    echo "\n Productos disponibles en inventario:\n";
    $inventario->listarProductos();

    echo "\n Ingrese el nombre del producto a comprar (o 'fin' para finalizar):  ";
    $nombreProducto = trim(fgets(STDIN));

    if ($nombreProducto === 'fin') {
        break;
    }

    if (!$inventario->productoExiste($nombreProducto)) {
        echo "Producto no encontrado en el inventario.\n";
        continue;
    }

    $productoCompra = $inventario->getProductoPorNombre($nombreProducto);

    while (true) {
        echo "Cantidad a comprar: ";
        $cantidadCompra = (int) trim(fgets(STDIN));

        if ($cantidadCompra > $productoCompra->getCantidad()) {
            echo "Cantidad a comprar excede la cantidad disponible. Intente de nuevo.\n";
        } else {
            break; 
        }
    }

    if ($productoCompra !== null) {
        $venta->agregarProductoVendido($productoCompra, $cantidadCompra);
        $productoCompra->restarCantidad($cantidadCompra);
    }
}

echo "\n========================================================\n";

echo "\n{$venta->generarFactura()}\n";

echo "========================================================\n";
?>