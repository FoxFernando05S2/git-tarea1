<?php

/* class Venta {

    private Producto $producto;
    private int $cantidadVendida;
    private Cliente $cliente;

    public function __construct(Producto $producto, int $cantidadVendida, Cliente $cliente) {
        $this->producto = $producto;
        $this->cantidadVendida = max(0, min($cantidadVendida, $producto->getCantidad()));
        $this->cliente = $cliente;
    }

    public function getProducto(): Producto {
        return $this->producto;
    }

    public function getCantidadVendida(): int {
        return $this->cantidadVendida;
    }

    public function getCliente(): Cliente {
        return $this->cliente;
    }
} */
declare(strict_types=1); 

class Venta {

    private array $productosVendidos = [];
    private float $total = 0;

    public function __construct(private Cliente $cliente) {     
    }

    public function agregarProductoVendido(Producto $producto, int $cantidadVendida): bool {
        if ($cantidadVendida > $producto->getCantidad()) {
            return false; 
        }
        $this->productosVendidos[] = ['producto' => $producto, 'cantidad' => $cantidadVendida];
        $this->total += $producto->getPrecio() * $cantidadVendida;
        return true;
    }

    public function generarFactura(): string {
        $factura = "Factura:\n";
        foreach ($this->productosVendidos as $item) {
            $producto = $item['producto'];
            $cantidad = $item['cantidad'];
            $subtotal = $producto->getPrecio() * $cantidad;
            $factura .= "{$producto->getNombre()} ({$cantidad} unidades) - Subtotal: {$subtotal} USD\n";
        }
        $factura .= "Total: {$this->total} USD\n";
        return $factura;
    }
}

?>
