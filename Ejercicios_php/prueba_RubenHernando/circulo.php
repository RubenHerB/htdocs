<?php
abstract class objeto{
    private $numero;
    private $color;
    private $ancho;
    public function __construct($numero,$color){
        $this->numero=$numero;
        $this->color=$color;
        $this->ancho=(2000/$numero);   
        if($this->ancho>=20){
            $this->ancho=(100/$numero);
    }
}
    public function getNumero(){
        return $this->numero;
    }
    public function getColor(){
        return $this->color;
    }
    public function setNumero($numero){
        $this->numero=$numero;
    }
    public function setColor($color){
        $this->color=$color;
    }
    public function getAncho(){
        return $this->ancho;
    }
    public function setAncho($ancho){
        $this->ancho=$ancho;
    }
    abstract function pintar();
}
class circulo extends objeto{
    public function pintar()     {
        echo "<span class=\"dot\" style=\"  width:".parent::getAncho()."%;aspect-ratio: 1/1;
        border-radius: 50%;background-color:".parent::getColor()."\"></span>";
      
    } 
}

class rectangulo extends objeto{
    public function pintar()     {

        echo "<span class=\"dot\" style=\"width:".parent::getAncho()."%;aspect-ratio: 2/1;
        background-color:".parent::getColor()."\"></span>";
    
}
}
class ovalo extends objeto{
    public function pintar(){

        echo "<span class=\"dot\" style=\"width:".parent::getAncho()."%;aspect-ratio: 2/1;
        border-radius: 50%;background-color:".parent::getColor()."\"></span>";
    
}
}
?>