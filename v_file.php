<?php include '../db.php';include 'header.php';?>

<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Course Videos</h4>
              </div>
              <div class="card-body">

             
            
            
            <table class="table table-striped table-bordered table-hover">
<tr>
    <th>Title</th>
    <th>Video</th>
    
  
    
    
</tr>    
    <?php
    $sql= "select * from video where Course_id='$_GET[id]'";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc()){
$vid=$row['Video_id'];$cid=$row['Course_id'];
    echo"<tr>";
    echo"<td>".$row['Title']."";
    echo"<br/> Duration".$row['Duration']."";
    echo "<br/><a href='v_file.php?dl=$vid&id=$cid'> Remove <i class='icofont icofont-delete'> </i></a> </td>";    
        
    echo"<td><video src='".$row['Video']."' width='100' height='100' controls></video></td>";
         
        
    echo"</tr>";
    }

    ?>
            </table>
               
            <?php 
    if(isset($_GET['dl'])){
        $id=$_GET['id'];
        
    $sql="DELETE FROM video WHERE Video_id ='$_GET[dl]'";
    if($conn->query($sql)===TRUE)
        echo"<script>window.alert('Video Removed'); window.location='v_file.php?id=$id'; </script>";
       else 
        
        
           echo "<br/><div class='alert alert-danger'> <i class='iconfont iconfont-delete'> </i> &nbsp;
     Error:</div>".$conn->error;
        
    }?>
                    
                </div></div></div>
            
            <?php include 'footer.php'; ?>