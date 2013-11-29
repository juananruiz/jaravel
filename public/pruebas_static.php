<?php

class FalsaMoneda
{
	private static $cantidadInstancias = 0;
  private $contador = 0;
 
	public function __construct()
	{
		self::$cantidadInstancias++;
    $this->contador++;
	}
 
	public static function getInstancias()
	{
		return self::$cantidadInstancias;
	}

  public function getContador()
  {
    return $this->contador;
  }
}

$moneda1 = new FalsaMoneda();
$moneda2 = new FalsaMoneda();
$monedaJ = new FalsaMoneda(); 

echo FalsaMoneda::getInstancias();
echo "<br>";
echo $moneda1->getContador();
echo "<br>";
echo $moneda2->getContador();
echo "<br>";

?>
