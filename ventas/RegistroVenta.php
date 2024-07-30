<?php

class RegistroVenta {
    private $ventas = [];

    public function agregarVenta(Venta $venta) {
        $this->ventas[] = $venta;
    }

    public function calcularTotalVentas() {
        $total = 0;
        foreach ($this->ventas as $venta) {
            $total += $venta->producto->precio * $venta->cantidadVendida;
        }
        return $total;
    }
}

?>
