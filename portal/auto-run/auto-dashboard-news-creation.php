<?php  

// echo "Hello";

// for ($i=0; $i <=100; $i++) { 
//     echo "This is:$i <br>";
// }
 require_once '../database/db-con.php';

 $FisrtName = array('Joe' ,'Smith','JAMES','JOHN','ROBERT','MATTHEW','Annie ','Rhona ','Derren ','Sheena ','Leah ',
'Nylah ','Emilee ','Keiron ','Skylah ','Lexi-May ','Scott ','Zahra ','Fariha ','Kimberley ',
'Alyssa ','Kush ','Kymani ','Daniela ');

 $Lastname  = array('Biden','Johnson','Lopez','Williams','Jones','Mcphee','Delgado','Ritter','Rush','Briggs','Roach','Buckner','Huff','Mccartney',
 'Forbes','Gilmore','Hines','Luna','Sherman','Parks','Peterson','Morris','Daughert','winget');

//  echo"Size Of FirstName: ";
//  echo sizeof($FisrtName);
//  echo "<br>";
//  echo"Size Of FirstName: ";
//  echo   sizeof($Lastname);
//  echo "<br>";
 $randomnumber_1= (rand(0,23));
//  echo "<br>";
 $randomnumber_2=(rand(0,23));
 //echo $randomnumber_1 ,"<br>",$randomnumber_2;
 echo "<br>";

 echo $FisrtName[$randomnumber_1],"<br>",$Lastname[$randomnumber_2];
 echo "<br>";echo "<br>";
 $FullName = $FisrtName[$randomnumber_1]." ".$Lastname[$randomnumber_2];
 echo $FullName ;
 echo "<br>";

 echo "<br>";

 for ($i=0; $i <=100 ; $i++) 
    { 
     # code...
     $randomnumber_1=(rand(0,23));
     $randomnumber_2=(rand(0,23));
     $FullName=$FisrtName[$randomnumber_1]." ".$Lastname[$randomnumber_2]." "."has Join Community";
     echo $FullName;
     echo "<br>";
     echo "<br>";
     
     $title=$FullName;
     $timestamp=time();
     $query="INSERT INTO `dashboard_news`(`id`, `title`, `added_by`, `is_deleted`, `timestamp`) VALUES (Null,'$title',0,0, $timestamp)";
     $con->query($query);

    
    }

?>