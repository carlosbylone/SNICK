<?php
	function conectarBD(){
	
		$conexion=new mysqli("localhost","root","Snick27.","snick");

		if ($conexion->connect_errno) {
			echo "Error: Fallo al conectarse a MySQL debido a: \n"; 
			echo "Errno: " . $conexion->connect_errno . "\n";
			echo "Error: " . $conexion->connect_error . "\n";
			exit;
		}			
		$conexion->set_charset("utf8");
		
		return $conexion;
	}

	function desconectarBD($conexion){
		$conexion->close();
	}
	
	

?>