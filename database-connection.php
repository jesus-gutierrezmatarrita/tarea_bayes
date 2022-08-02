
<?php
class base
{
   public static function connection()
   {
      //Carga las credenciales
      //$servername = "163.178.107.10";
      $servername = "remotemysql.com";
      //$username = "Laboratorios";
      $username = "RDAJAPdvt9";
      //$password = "Uy&)&nfC7QqQau.%278UQ24/=%";
      $password = "HpL4hbqNGi";
      //$db = "if7103_tarea2_b65412";
      $db = "RDAJAPdvt9";
      // Create connection
      $conn = mysqli_connect($servername, $username, $password, $db);
      // Check connection
      if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
      } else {
         echo "Connected succesfully";
      }

      return $conn;
   }
}

?>