<?php 

//Conecta o usuari ao servidor
$servername="localhost";
$username="root";
$password="";
$db="livraria";



$conn = new mysqli($servername,$username, $password,$db);

if ($conn->connect_error) 
  { die ("Error: " . $sql . "<br>" . $conn->error
  );
  }
  

?>
</body>
</html>