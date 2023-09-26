<?php 
require_once 'setting.php';

class conexion{
   private $conector = null;

   public function getConexion()
   {

         try{
            $this->conector = new PDO("sqlsrv:server=".SERVIDOR.";database=".DATABASE, USUARIO, PASSWORD);

            return $this->conector;
         }
         catch(PDOException $e){
               echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
         exit;
         }

         
   }
}

   $con = new conexion();

   if($con->getConexion() != null){
      echo "conexion meloskiiii";
   }else{
      echo "paila al conectarse a la base mi perro";
}

?>