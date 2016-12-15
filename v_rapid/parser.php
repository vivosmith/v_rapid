<?php
$search=$_POST["search"];
include('lib\parsecsv.lib.php');
$csv= new parseCSV($_POST["file_name"],";;;;;;;;;");
$writer= array();
$writer=$csv->data;
$exo= array();
$counter=0;
foreach($writer as $s){$exo[$counter]=implode(",",$writer[$counter]);$counter=$counter+1;}
$complete=array ();
$counted=0;
foreach($exo as $x){$complete[$counted]=str_replace(";"," ",$exo[$counted]);$counted=$counted+1;}
$criteria=array();
$c=0;
$size=sizeof($complete);
$search_size=sizeof($search);
$search_string= array();
$search_string=array_keys($complete,$search);
if(!isset($_POST["group1"])){for($i=0; $i<$size; $i++){if (strpos($complete[$i], $search) !==false){echo $complete[$i]."<br>";}}}
if(isset($_POST["group1"])){if($_POST["group1"] == "Street"){ for($i_=0; $i_<$size; $i_++){if((strpos($complete[$i_], $search." "."Rd")) !==false || (strpos($complete[$i_], $search." "."St")) !==false || (strpos($complete[$i_], $search." "."Hwy")) !==false ||(strpos($complete[$i_], $search." "."Ave"))!==false || (strpos($complete[$i_], $search." "."Ln"))!==false){ echo $complete[$i_];}}}}
 if($_POST["group1"] == "City"){for($i_=0; $i_<$size; $i_++){if (strpos($complete[$i_], $search." ".$_POST["state"]) !=false){echo $complete[$i_]."<br>";}}}
?>