<?php

class Escuela_model  extends CI_Model  {
	
	public function get_escuela($id)
    {
        return $this->db->get_where('escuela',array('id'=>$id))->row_array();
    }

	public function aclararColor($color, $cant)
	{
		 //voy a extraer las tres partes del color
		 $rojo = substr($color,1,2);
		 $verd = substr($color,3,2);
		 $azul = substr($color,5,2);
		 
		 //voy a convertir a enteros los string, que tengo en hexadecimal
		 $introjo = hexdec($rojo);
		 $intverd = hexdec($verd);
		 $intazul = hexdec($azul);
		 
		 //ahora verifico que no quede como negativo y resto
		 if($introjo+$cant<=256) $introjo = $introjo+$cant;
		 if($intverd+$cant<=256) $intverd = $intverd+$cant;
		 if($intazul+$cant<=256) $intazul = $intazul+$cant;
		 
		 //voy a convertir a hexadecimal, lo que tengo en enteros
		 $rojo = dechex($introjo);
		 $verd = dechex($intverd);
		 $azul = dechex($intazul);
		 
		 //voy a validar que los string hexadecimales tengan dos caracteres
		 if(strlen($rojo)<2) $rojo = "0".$rojo;
		 if(strlen($verd)<2) $verd = "0".$verd;
		 if(strlen($azul)<2) $azul = "0".$azul;
		 
		 //voy a construir el color hexadecimal
		 $claro = "#".$rojo.$verd.$azul;
		 
		 //la función devuelve el valor del color hexadecimal resultante
		 return $claro;
	}

}

?>
