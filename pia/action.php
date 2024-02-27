<?php 
  header('Access-Control-Allow-Origin: *'); 
  header('Access-Control-Allow-Credentials: true'); 
  header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); 
  header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization'); 
  header('Content-Type: application/json; charset=UTF-8'); 

  include "db_config.php"; 
  $postjson = json_decode(file_get_contents('php://input'), true); 
  $aksi=strip_tags($postjson['aksi']); 
  $data    = array(); 

  switch($aksi) {
    case "add_register": 
      $nama = filter_var($postjson['nama'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW); 
      $usia = filter_var($postjson['usia'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW); 
      $kota = filter_var($postjson['kota'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW); 
      $jenis_kelamin = filter_var($postjson['jenis_kelamin'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW); 
      $nohp = filter_var($postjson['nohp'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
      $jenislomba = filter_var($postjson['jenislomba'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
      $asal = filter_var($postjson['asal'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
      $jenjang = filter_var($postjson['jenjang'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
             
      
      try { 
        $sql = "INSERT INTO peserta (nama,usia,kota,jenis_kelamin,nohp,jenislomba,asal,jenjang)
         VALUES (:nama,:usia,:kota,:jenis_kelamin,:nohp,:jenislomba,:asal,:jenjang)"; 
        $stmt    = $pdo->prepare($sql); 
        $stmt->bindParam(':nama', $nama, PDO::PARAM_STR); 
        $stmt->bindParam(':usia', $usia, PDO::PARAM_STR); 
        $stmt->bindParam(':kota', $kota, PDO::PARAM_STR); 
        $stmt->bindParam(':jenis_kelamin', $jenis_kelamin, PDO::PARAM_STR); 
        $stmt->bindParam(':nohp', $nohp, PDO::PARAM_STR); 
        $stmt->bindParam(':jenislomba', $jenislomba, PDO::PARAM_STR);
        $stmt->bindParam(':asal', $asal, PDO::PARAM_STR);
        $stmt->bindParam(':jenjang', $jenjang, PDO::PARAM_STR);
        $stmt->execute(); 
        if($sql) $result = json_encode(array('success' =>true)); 
        else $result = json_encode(array('success' => false, 'msg'=>'error , please try again')); 
        echo $result; 
      } 
      catch(PDOException $e) { 
        echo $e->getMessage(); 
      }     
      break; 

    case "getdata": 
      $limit = filter_var($postjson['limit'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW); 
      $start = filter_var($postjson['start'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);       
      
      try { 
        $sql = "SELECT * FROM peserta ORDER BY id_peserta DESC LIMIT :start,:limit"; 
        $stmt = $pdo->prepare($sql); 
        $stmt->bindParam(':start', $start, PDO::PARAM_STR); 
        $stmt->bindParam(':limit', $limit, PDO::PARAM_STR);           
        $stmt->execute(); 
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);           
        foreach($rows as $row){             
          $data[] = array( 
            'id_peserta' => $row['id_peserta'], 
            'nama' => $row['nama'], 
            'usia' => $row['usia'], 
            'kota' => $row['kota'], 
            'jenis_kelamin' => $row['jenis_kelamin'],
            'nohp' => $row['nohp'], 
            'jenislomba' => $row['jenislomba'],
            'asal' => $row['asal'],
            'jenjang' => $row['jenjang']
          );            
        } 
        if($stmt) $result = json_encode(array('success'=>true, 'result'=>$data)); 
        else $result = json_encode(array('success'=>false)); 
        echo $result; 
      }  
      catch(PDOException $e) { 
        echo $e->getMessage(); 
      }          
      break; 
  }
?>