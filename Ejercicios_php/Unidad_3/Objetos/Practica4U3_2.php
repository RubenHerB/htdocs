<?php
abstract class Vehiculo{
    protected $peso;
    protected $color;
    protected static $numero_cambio_color=0;
    const SDL ='<br/>';

    public function __construct($peso,$color){
        if($peso<=2100){
        $this->peso = $peso;
        }else{
        $this->peso = 2100;
        }
        $this->color = $color;
    }
    public static function ver_atributo($obj){
        foreach($obj as $n=>$v){
            echo $n.": ".$v,self::SDL;        
     }
     echo "Numero de cambios de color: ",self::$numero_cambio_color,self::SDL;
    }
 
    public function getPeso(){
        return $this->peso;
    }
    public function setPeso($peso){
        
        if($peso>2100){
            $this->peso=2100;
        }else{
            $this->peso = $peso;
        }
    }
    public function getColor(){
        return $this->color;
    }
    public function setColor($color){
        $this->color = $color;
        self::$numero_cambio_color++;   
    }
     public function circula(){
        echo "El vehiculo circula";
    }
    abstract protected function añadir_persona($peso_persona);
    public function __toString()
    {
        return "Peso: $this->peso  Color: $this->color";
    }
}

abstract class Cuatro_ruedas extends Vehiculo{
    protected $numero_puertas=4;
    public function __construct($peso,$color,$numero_puertas){
        parent::__construct($peso,$color);
        $this->numero_puertas = $numero_puertas;
    }
    public function repintar($color){
        parent::setColor($color);
        echo "El colores es: $color";
    }
    abstract protected function añadir_persona($peso_persona);
    public function getNumero_puertas(){
        return $this->numero_puertas;
    }
    public function setNumero_puertas($numero_puertas){
        $this->numero_puertas = $numero_puertas;
    }

    public function __toString()
    {
        return parent::__toString()."  Numero de puertas: $this->numero_puertas";
    }
    
}

class Coche extends Cuatro_ruedas{
    protected $numero_cadenas_nieve=0;
    public function añadir_cadenas_nieve($n){
        $this->numero_cadenas_nieve+= $n;
    }
    public function quitar_cadenas_nieve($n){
        if($this->numero_cadenas_nieve<$n){
            $this->numero_cadenas_nieve=0;
        }else{
        $this->numero_cadenas_nieve-= $n;}
    }
    public function getNumero_cadenas_nieve(){
        return $this->numero_cadenas_nieve;
    }
    public function setNumero_cadenas_nieve($numero_cadenas_nieve){
        $this->numero_cadenas_nieve = $numero_cadenas_nieve;
    }
    public function __toString()
    {
        return parent::__toString(). " Numero de cadenas nieve: $this->numero_cadenas_nieve";
    }
    public function añadir_persona($peso_persona){
        
        if($this->peso>=1500&&$this->numero_cadenas_nieve<=2){
            echo "Atención, ponga 4 cadenas para la nieve.<br>";
        }
    }

}

class Camion extends Cuatro_ruedas{
    protected $longitud;
    public function añadir_longitud($l){
        $this->longitud+= $l;
    }
    public function getLongitud(){
        return $this->longitud;
    }
    public function setLongitud($longitud){
        $this->longitud = $longitud;
    }
    public function añadir_remolque($longitud_remolque){
        $this->longitud+= $longitud_remolque;
    }
    public function añadir_persona($peso_persona){
        $this->peso+= $peso_persona;
    }
    public function __toString()
    {
        return parent::__toString(). " Longitud: $this->longitud";}
       
}

class Dos_ruedas extends Vehiculo{
    protected $cilindrada=125;
    public function añadir_persona($peso_persona){
        parent::setPeso(parent::getPeso() + $peso_persona+2);
    }
    public function poner_gasolina($l){
        parent::setPeso(parent::getPeso() + $l);
    }   
    public function getCilindrada(){
        return $this->cilindrada;
    }
    public function setCilindrada($cilindrada){
        $this->cilindrada = $cilindrada;
    }
    public function __toString()
    {
        return parent::__toString(). " Cilindrada: $this->cilindrada";
    }
     
    }
?>