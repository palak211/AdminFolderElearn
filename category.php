<?php include '../db.php';include 'header.php';?>
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> +Add  New Category</h4>
              </div>
              <div class="card-body">
       
        <div class="row">
                  
                  <div  class="col-md-4">
    
            
            <hr>
             <form action="" method="post"  enctype="multipart/form-data">
            <label>Category Title</label>
            <input type="text" class="form-control" name="ttl" required><br>
            <label>Select Image</label>
            <input type="file" class="form-control" name="fl" required>
            accept(".jpg,.png,.jpeg")files are allowed<br><br>
            
    <button type="submit" class="btn btn-primary" name="sb">Save</button>
            </form>
                
                
                
                
            <?php 
    if(isset($_POST['sb'])){
        
         $dirname="data/";
    $flname=$dirname.$_FILES['fl']['name'];
    $fl_tname=$_FILES['fl']['tmp_name'];
        $type=strtolower(pathinfo($flname,PATHINFO_EXTENSION));
        if($type!='jpg'&&$type!='jpeg'&&$type!='png')
            echo "Only.jpg, .jpeg,.png Files are Allowed";
        else{
   if(move_uploaded_file($fl_tname,$flname)){
                
        

    $sql="INSERT INTO course_category(Category,Image) VALUES('$_POST[ttl]',' $flname ')";
    if($conn->query($sql)===TRUE)
        echo"<br/><div class='alert alert-success'> <i class='iconfont iconfont-tick-mark'> </i> &nbsp;
    Category Saved</div>";
       else 
           echo "<br/><div class='alert alert-danger'> <i class='iconfont iconfont-delete'> </i> &nbsp;
     Error:</div>".$conn->error;
    }
       else
    echo "<br/><div class='alert alert-danger'> <i class='iconfont iconfont-delete'> </i> &nbsp;
     Error:Error in Uploading Image File</div>";
    }}
?>  
            </div>
           <div  class="col-md-1"></div>
                         
           <div  class="col-md-5">
                <table class="table table-striped table-bordered table-hover">

                    <tr>

    <th>Category</th>
    <th>Image</th>
<th>Delete</th>
    
</tr> 
                    
    <?php
    $sql= "select * from course_category";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc()){
$cid=$row['Category'];
    echo"<tr>";
    echo"<tr>";
    echo"<td>".$row['Category']."</td>";
    echo"<td><img src='".$row['Image']."' width='50px' height='50px'></td>";
    echo "<td> <a href='category.php?dl=$cid'> <i class='icofont icofont-delete'> </i></a> </td>";
    echo"</tr>";
    }

    ?>
    
</table>   
                
            
            <?php 
    if(isset($_GET['dl'])){
        
    $sql="DELETE FROM course_category WHERE Category='$_GET[dl]'";
    if($conn->query($sql)===TRUE)
        echo"<script> window.alert('DEL '); window.location='category.php'; </script>";
       else 
           echo "<br/><div class='alert alert-danger'> <i class='iconfont iconfont-delete'> </i> &nbsp;
     Error:</div>".$conn->error;
        
    }?>
            </div></div></div></div></div></div>
                
               <?php include 'footer.php'; ?>  

    