<?php 
   header('Access-Control-Allow-Origin: *'); 
   
   $hostname      = 'localhost'; 
   $username      = 'rplmedan_lomba'; 
   $password      = 'kGL6Ug0.j.^J'; //isikan password database (jika ada) 
   $database      = 'rplmedan_lomba'; 
   $charset       = 'utf8'; 

   $dsn  = "mysql:host=" . $hostname . ";port=3306;dbname=" . $database . ";charset=" . $charset; 
   
   $opt  = array( 
     PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, 
     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, 
     PDO::ATTR_EMULATE_PREPARES   => false, 
   ); 
   
   $pdo  = new PDO($dsn, $username, $password, $opt); 
   
   $data = array(); 
?>