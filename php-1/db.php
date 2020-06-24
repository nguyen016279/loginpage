<?php
try {
    $db = new PDO('pgsql:host=ec2-54-161-208-31.compute-1.amazonaws.com;dbname=d7rkf9790j3egb', 'cejojxfajmmyap', 'a62e673ef0b49b2198fecabd5226a08c40303d834cb8b51c9de1b341580cab13');
    return $db;
}catch (Exception $e){
    echo "Kết nối ko thành công";
}