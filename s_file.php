<?php include 'header.php';?>
      <?php
    $sql= "select * from study_material where Course_id='$_GET[id]'";
    $result1=$conn->query($sql);
    $row1=$result1->fetch_assoc();
    $fd=$row1['M_id'];
$crid=$row1['Course_id'];
    $title=$result1->num_rows>0?$row1['Title']:'';       
    ?>      
 <div class="bg pt-5 pb-4">
  <h4 class="text-center">  Study Material   </h4>     
     
    <p class="text-center">  <?php echo $title;?> </p>
     <p class="text-right"><?php echo  
"<a href='s_file.php?dl=$fd'> Remove File <i class='icofont icofont-delete'> </i></a>";?>  </p>
  </div>
        
        <div class="container pt-4 pb-5">

                
            <div class="row">
                
        <div  class="col-md-12">
<?php if($result1->num_rows>0){ ?>
        
<iframe src='../admin/<?php echo $row1['File']?>' height="800" width="100%" > 
    </iframe>           
            
<?php }
else 
echo "<div class='alert alert-info p-4 m-5'>No File Found . </div> ";
?>
            
        </div>
                        <?php 
    if(isset($_GET['dl'])){
        $i=$_GET['dl'];
    $sql="DELETE FROM study_material WHERE M_id='$_GET[dl]'";
    if($conn->query($sql)===TRUE)
        echo"<script> window.location='s_file.php?id=$i'; </script>";
       else 
           
           echo "<br/><div class='alert alert-danger'> <i class='iconfont iconfont-delete'> </i> &nbsp;
     Error:</div>".$conn->error;
        
    }?>

            
            </div></div>
        <?php include 'footer.php'; ?>