<?php
// panggil fungsi validasi xss dan injection
require_once('fungsi_validasi.php');

// definisikan koneksi ke database

// $server = 'localhost';
// $username = 'root';
// $password = '';
// $database = 'db_rcp';


// DDEV: host=db, user=db, password=db, database=db
$server = getenv('DDEV_PROJECT') ? 'db' : 'localhost';
$username = getenv('DDEV_PROJECT') ? 'db' : 'rentcarp_neo';
$password = getenv('DDEV_PROJECT') ? 'db' : 'e22DSucRYCSuRGG';
$database = getenv('DDEV_PROJECT') ? 'db' : 'rentcarp_db';

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
 


$val = new Lokovalidasi;
?>
