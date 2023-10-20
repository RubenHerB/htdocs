<?php
class Operaciones{
    private $n1;
    private $n2;

   public function __construct($n1,$n2) {  
    $this->n1 = $n1;
    $this->n2 = $n2;
   }

   public function setN1($n1) { 
    $this->n1 = $n1;
    }
    public function setN2($n2) { 
    $this->n2 = $n2;
    }
    public function getN1() { 
    return $this->n1;
    }
    public function getN2() { 
    return $this->n2;
    }

    public function sumar(){
        return "Suma: ".$this->n1 + $this->n2;
    }
    public function restar(){
        return "Resta: ".$this->n1 - $this->n2;
    }
    public function multiplicar(){
        return "Multiplicar: ".$this->n1 * $this->n2;
    }
    public function dividir(){
        return "Division: ".$this->n1 / $this->n2;
    }
    public function __toString()
    {
        return "Numeros: $this->n1  $this->n2";
    }
}

$operar = new Operaciones(50,20);
echo $operar . "<br>";
echo $operar -> sumar(). "<br>";
echo $operar -> restar(). "<br>";
echo $operar -> multiplicar(). "<br>";
echo $operar -> dividir(). "<br>";
echo $operar -> __toString() . "<br>";
?>