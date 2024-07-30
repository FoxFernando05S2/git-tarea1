<?php

/* class Inventario {
    private $productos = [];

    public function agregarProducto(Producto $producto) {
        $this->productos[] = $producto;
    }

    public function listarProductos() {
        foreach ($this->productos as $producto) {
            echo "{$producto->nombre} ({$producto->cantidad} unidades) - Precio: {$producto->precio} USD\n";
        }
    }

    public function productoExiste($nombreProducto) {
        foreach ($this->productos as $producto) {
            if ($producto->nombre === $nombreProducto) {
                return true;
            }
        }
        return false;
    }
} */

class Inventario {
    private array $productos = [];

    public function agregarProducto(Producto $producto): void {
        $this->productos[] = $producto;
    }

    public function listarProductos(): void {
        foreach ($this->productos as $producto) {
            echo "\n {$producto->getNombre()} ({$producto->getCantidad()} unidades) 
                  \n Precio: s/{$producto->getPrecio()}.00 \n ";
        }
    }

    public function productoExiste(string $nombreProducto): bool {
        foreach ($this->productos as $producto) {
            if ($producto->getNombre() === $nombreProducto) {
                return true;
            }
        }
        return false;
    }

    public function getProductoPorNombre(string $nombreProducto): ?Producto {
        foreach ($this->productos as $producto) {
            if ($producto->getNombre() === $nombreProducto) {
                return $producto;
            }
        }
        return null;
    }
}

?>
