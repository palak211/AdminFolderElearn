<script src="../editor/ckeditor.js"> </script>
<?php include '../db.php';include 'header.php';?>
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Edit Course</h4>
              </div>
              <div class="card-body">
               
        <?php
    $sql="select * from course where Course_id='$_GET[id]'";
  $result=$conn->query($sql);
$row=$result->fetch_assoc();
?>
        
        
            <form action="" method="post" enctype="multipart/form-data">
                <hr>
            <div class="row">
            <div class="col-md-8">
                <label> Course Title</label>
                <input type="text" class="form-control" name="cte" value="<?php echo $row['Title'];?>"required><br>
                <label>Course Overview</label>
                <textarea type="text" class="form-control" maxlength="1000" name="co" placeholder="type here.." required> <?php echo $row['Overview'];?>
                </textarea>
            

                </div>
                
                <div class="col-md-4">
        <img src='<?php echo $row['Image'] ;?>' height="120px" width="80%" >
                
                 <label>Select category</label>
                    <select class="form-control" name="ct">
                      <option><?php echo $row['Category'] ;?></option>
                    <?php
    $sql= "select * from course_category";
    $result1=$conn->query($sql);
    while($row1=$result1->fetch_assoc()){
echo "<option>".$row1['Category']."</option>";
    }
    ?>
                    </select>
                    
                    <label>Image</label>
                    <input type="file" class="form-control" name="fl"><br/>
                    <div class="row"><div class="col-md-6">
                    <label>Language</label>
                    <select class="form-control" name="lan">
                        <option><?php echo $row['Language'];?></option>
                    <option>English</option><option>Hindi</option></select>
                        </div><div class="col-md-6">
                    <label>Levels</label>
                    <select class="form-control" name="lvl">
                        <option><?php echo $row['Level'];?></option>
                    <option>Beginner</option>
                    <option>Intermediater</option>
                        <option>Advanced</option>
                        
                        ></select></div></div>
                    
                  <br>
                     <label>Course Fee</label>
                    <input type="num" class="form-control" min=100 max=1000 value="<?php echo $row['fee'];?>"name="cff">
                    <div class="row">
                        <div class="col-md-6">
        <button type="submit" class="btn  btn-block btn-success" name="sb">Save</button>
                        </div>
                        
            
                        <div class="col-md-6">
                    <button type="submit" class="btn btn-block  btn-primary">Cancel</button>
                        </div>
                                                

                    </div>
                </div>
                
            </div>
                </form>
                
                      
            <?php 
    if(isset($_POST['sb'])){
        $txt=addslashes($_POST['co']);
 if(!is_uploaded_file($_FILES['fl']['tmp_name']))
 {
  $sql="Update course set Title='$_POST[cte]',Overview='$txt',Category='$_POST[ct]',Language='$_POST[lan]',Level='$_POST[lvl]',fee='$_POST[cff]' where Course_id='$_GET[id]'";
      if($conn->query($sql)===TRUE)
       {
        $crid=$_GET['id'];
        echo "<script>window.location='course1.php?id=$crid'</script>";
      } 
     else 
           echo "<br/><div class='alert alert-danger'> <i class='iconfont iconfont-delete'> </i> &nbsp;
     Error:.$conn->error</div>";
  
 }
        else{
            $dirname="data/";
    $flname=$dirname.$_FILES['fl']['name'];
    $fl_tname=$_FILES['fl']['tmp_name'];
        $type=strtolower(pathinfo($flname,PATHINFO_EXTENSION));
        if($type!='jpg'&&$type!='jpeg'&&$type!='png')
            echo "Only.jpg, .jpeg,.png Files are Allowed";
        else{
   if(move_uploaded_file($fl_tname,$flname)){
      
  $sql="Update course set Title='$_POST[cte]',Overview='$txt',Category='$_POST[ct]',Language='$_POST[lan]',Level='$_POST[lvl]',fee='$_POST[cff]',
  Image='$flname' where Course_id='$_GET[id]'";
      if($conn->query($sql)===TRUE){
        
        $crid=$_GET['id'];
        echo "<script>window.location='course1.php?id=$crid' </script>";
      }
       else 
        echo "<br/><div class='alert alert-danger'> <i class='iconfont iconfont-delete'> </i> &nbsp;
     Error:.$conn->error</div>";          
        
      }
       else
    echo "<br/><div class='alert alert-danger'> <i class='iconfont iconfont-delete'> </i> &nbsp;
     Error:Error in Uploading Image File</div>";
    }        
        }
    }
         

    
?>  
            </div>
            </div> <script> CKEDITOR.replace('co');</script>
            <?php include 'footer.php'; ?>
        
        
                
                