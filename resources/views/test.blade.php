<?php 



$conn = odbc_connect("Driver={Microsoft Access Driver (*.mdb)};Dbq=C:/mdb/fliv.mdb", '', '');

if (!$conn){
   exit("Connection Failed: " . $conn);
}
if($conn){
	echo "connection okay";
}

odbc_close($conn); 

?>{{-- echo phpinfo();  --}}