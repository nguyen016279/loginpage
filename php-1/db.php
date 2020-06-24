<?php
try {
    $db = new PDO('pgsql:host=ec2-52-22-216-69.compute-1.amazonaws.com;dbname=d273oh6lamsh3q', 'nhbiifouamyboh', 'fc77fc9fb6f38260f0ed0713f5bb5c927d936a8b1f51cc4ad07861f5935f40df');
    return $db;
}catch (Exception $e){
    echo "Kết nối ko thành công";
}
