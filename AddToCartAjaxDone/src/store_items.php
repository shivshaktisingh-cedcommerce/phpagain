<?php

session_start();

if(!isset($_SESSION['product_name'])){
    $_SESSION['product_name']=array(); 
}

if(isset($_POST['product_name'])){ 
    $pn=$_POST['product_name'];
    $pi=$_POST['product_id'];
    $pp=$_POST['product_price'];
    $s=1;
    $t=1;
    foreach($_SESSION['product_name'] as $key => $val){   
        if($val['product_name']==$pn){
            $_SESSION['product_name'][$key]['product_quantity']++;
            $t=0;
          }
    }
    if($t==1){
        $item=array("product_name"=>$pn,"product_id"=>$pi,"product_price"=>$pp,"product_quantity"=>1);
        array_push($_SESSION['product_name'],$item);
     } 
     show_cart(); 
}
if(isset($_POST['rowToDelete'])){
    $delete=$_POST['rowToDelete'];
    $count=0;
    foreach($_SESSION['product_name'] as $key => $value){
        if($key==$delete)
        break;
        else $count++;
    }
    array_splice($_SESSION['product_name'],$count,1);
    show_cart();
}
if(isset($_POST['empty'])){
 // echo "shiv";
$_SESSION['product_name']=array();
//echo "shiv";
session_destroy();

show_cart();
}     


   

     function show_cart(){
      {  $counter=0;
        $txt ="<table><tr><th>Product Id</th><th>Product Name</th><th>Product Price</th><th>Product Quantity</th><th>Action</th></tr>";    
         foreach($_SESSION['product_name'] as $key=> $val){
           $counter++;
           
           $txt.="<tr>";      
           $txt.="<td>".$val['product_id']."</td>";
           $txt.= "<td>".$val['product_name']."</td>";
           $txt.="<td>$".$val['product_price']."</td>";
           $txt.="<td>".$val['product_quantity']."</td>";
           $txt.="<td><input type='submit' id='Delete' name=".$val['product_name']." value='Remove'></td>";
           $txt.="</tr>";
          }
        $txt.="</table>";
        echo $txt;
      }
}
?>