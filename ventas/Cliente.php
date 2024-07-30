<?php

declare(strict_types=1); 

/* class Cliente {
    
    public function __construct(      
        private $nombre, 
        private $direccion, 
        private $telefono
        ) {     
    }

    public function getNombre() {
        return $this->nombre;
    }
    public function getDireccion() {
        return $this->direccion;
    }
    public function getTelefono() {
        return $this->telefono;
    }
} */

class Cliente {

    public function __construct(
        private string $nombre, 
        private string $direccion = '', 
        private string $telefono = '') {
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getDireccion(): string {
        return $this->direccion;
    }

    public function getTelefono(): string {
        return $this->telefono;
    }
}

?>
