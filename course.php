<script src="../editor/ckeditor.js"> </script>
<?php include '../db.php';include 'header.php';?>
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Add Course</h4>
              </div>
              <div class="card-body">
               
              

               
                <form action="" method="post" enctype="multipart/form-data">
                <hr>
            
            <div class="row">
                
                <div class="col-md-8">
                <label> Course Title</label>
                <input type="text" class="form-control" name="cte"required><br>
                <label>Course Overview</label>
                <textarea class="form-control" id="co" maxlength="1000" name="co" placeholder="type here.."required></textarea>
            

                </div>
                
                <div class="col-md-4">
                    <label>Select category</label>
                    <select class="form-control" name="ct">
                 
                         <?php
                    
    $sql= "select * from course_category";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc()){
echo "<option>".$row['Category']."</option>";
    }
    ?>
                    </select><br>
                    
                    <label>Image</label>
                    <input type="file" class="form-control" name="fl"required><br>
                    
                    <label>Select language</label>
                    <select class="form-control" name="lan">
                        <option>Hindi</option>
                    <option>English</option>
                    </select>
                    
                     <label>Course Level</label>
                    <select class="form-control" name="lvl">
                        <option>Beginner</option>
                    <option>Intermediater</option>
                        <option>Advanced</option>
                ></select>
                    
                  
                     <label>Course Fee</label>
                    <input type="number" class="form-control" min=500 value="500" max=3000 name="cff" required><br>
                    <div class="row">
                        <div class="col-md-6">
        <button type="submit" class="btn  btn-block btn-success" name="sb">Save</button>
                        </div>
                        
            
                        <div class="col-md-6">
                              <button type="submit" class="btn btn-block  btn-primary">Next</button>
                        </div>
                                                

                    </div>
                </div>
                
            </div>
                </form>
                
                      
            <?php 
    if(isset($_POST['sb'])){
       $co=addslashes($_POST['co']); 
         $dirname="data/";
    $flname=$dirname.$_FILES['fl']['name'];
    $fl_tname=$_FILES['fl']['tmp_name'];
        $type=strtolower(pathinfo($flname,PATHINFO_EXTENSION));
        if($type!='jpg'&&$type!='jpeg'&&$type!='png')
            echo "Only.jpg, .jpeg,.png Files are Allowed";
        else{
   if(move_uploaded_file($fl_tname,$flname)){
                
        

    $sql="INSERT INTO course(Title,Overview,Category,Image,Language,Level,fee) VALUES('$_POST[cte]','$co','$_POST[ct]','$flname','$_POST[lan]','$_POST[lvl]','$_POST[cff]')";
    if($conn->query($sql)===TRUE)
    { 
        $crid=$conn->insert_id;
        echo "<script>window.location='course1.php?id=$crid' </script>";
    }
       else 
           echo "<br/><div class='alert alert-danger'> <i class='iconfont iconfont-delete'> </i> &nbsp;
     Error:</div>".$conn->error;
    }
       else
    echo "<br/><div class='alert alert-danger'> <i class='iconfont iconfont-delete'> </i> &nbsp;
     Error:Error in Uploading Image File</div>";
    }}
?>  
            
                </div></div></div>
            
    <script> CKEDITOR.replace('co');</script>
            <?php include 'footer.php'; ?>
        
        
                
                