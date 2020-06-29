<?php include '../db.php';include 'header.php';?>

<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Added Courses</h4>
              </div>
              <div class="card-body">

             
            
            
            <table class="table table-striped table-bordered table-hover">
<tr>
    <th>Title</th>
    <th>Overview</th>
    
    
    <th>Image</th>
    
    <th>Fee</th>
  
    <th colspan="3">Action</th>
    
    
</tr>    
    <?php
    $sql= "select * from course";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc()){
$cid=$row['Course_id'];
    echo"<tr>";
    echo"<td>".$row['Title']."</td>";
         echo"<td>".substr(strip_tags($row['Overview']),0,150)."</td>";
        
        
    echo"<td><img src='".$row['Image']."' width='50px' height='50px'></td>";
         
         echo"<td>".$row['fee']."</td>";
        echo "<td> <a href='courseedit.php?id=$cid'> <i class='icofont icofont-edit'> </i></a> </td>";
    echo "<td> <a href='courseseldel.php?dl=$cid'> <i class='icofont icofont-delete'> </i></a> </td>";
        if($row['Status']=='Active'){
      echo "<td> <a href='courseseldel.php?inc=$cid' title='Hide'> <i class='icofont icofont-ban'> </i></a> </td>";}
        else{
          echo "<td> <a href='courseseldel.php?ac=$cid'> <i class='icofont icofont-tick-mark' title='Publish'> </i></a> </td>";  
        }
    echo"</tr>";
    }

    ?>
            </table>
               
            <?php 
    if(isset($_GET['dl'])){
        
    $sql="DELETE FROM course WHERE Course_id ='$_GET[dl]'";
    if($conn->query($sql)===TRUE)
        echo"<script> window.alert('DEL '); window.location='courseseldel.php'; </script>";
       else 
        
        
           echo "<br/><div class='alert alert-danger'> <i class='iconfont iconfont-delete'> </i> &nbsp;
     Error:</div>".$conn->error;
        
    }?>
                       <?php 
    if(isset($_GET['ac'])){
        
    $sql="UPDATE course set status='Active' WHERE Course_id ='$_GET[ac]'";
    if($conn->query($sql)===TRUE)
        echo"<script> window.alert('Course Published'); window.location='courseseldel.php'; </script>";
       else 
        
        
           echo "<br/><div class='alert alert-danger'> <i class='iconfont iconfont-delete'> </i> &nbsp;
     Error:</div>".$conn->error;
        
    }?>
    
    
                       <?php 
    if(isset($_GET['inc'])){
        
    $sql="UPDATE course set status='Inactive' WHERE Course_id ='$_GET[inc]'";
    if($conn->query($sql)===TRUE)
        echo"<script> window.alert('Course Hide'); window.location='courseseldel.php'; </script>";
       else 
        
        
           echo "<br/><div class='alert alert-danger'> <i class='iconfont iconfont-delete'> </i> &nbsp;
     Error:</div>".$conn->error;
        
    }?>
                </div></div></div>
            
            <?php include 'footer.php'; ?>