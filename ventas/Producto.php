<?php

declare(strict_types=1);

/* class Producto {
    
    public function __construct( 
        private string $nombre,
        private float $precio,
        private int $cantidad ) {
        
        $this->nombre = $nombre;
        $this->precio = max(0, $precio); 
        $this->cantidad = max(0, $cantidad);
    }
    
    public function getNombre() {
        return $this->nombre;
    }
    public function getPrecio() {
        return $this->precio;
    }
    public function getCantidad() {
        return $this->cantidad;
    }
} */

declare(strict_types=1); 

class Producto {

    public function __construct(
        private string $nombre, 
        private float $precio, 
        private int $cantidad) {

        $this->nombre = $nombre;
        $this->precio = max(0, $precio);
        $this->cantidad = max(0, $cantidad);
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getPrecio(): float {
        return $this->precio;
    }

    public function getCantidad(): int {
        return $this->cantidad;
    }

    public function restarCantidad(int $cantidadVendida): void {
        $this->cantidad = max(0, $this->cantidad - $cantidadVendida);
    }
}

?>
