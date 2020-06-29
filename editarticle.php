<script src="../editor/ckeditor.js"> </script>

<?php include '../db.php';include 'header.php';?>
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Edit Article</h4>
              </div>
              <div class="card-body">
        <?php
    $sql="select * from article  where Post_id='$_GET[id]'";
  $result=$conn->query($sql);
$row=$result->fetch_assoc();
$aid=$_GET['id'];
?>

        
        
                
                <hr>
                <form action="" method="post"  enctype="multipart/form-data">
    
            <div class="row">
                
                <div class="col-md-8">
                <label>Title</label>
                <input type="text" class="form-control" name="tl" required value="<?php echo $row['Title'];?>"><br>
                <label>Content</label>
                <textarea type="text" class="form-control" maxlength="1000" name="con" placeholder="type here.."required><?php echo $row['Content'];?>
                    </textarea><br>
                </div>
                
                <div class="col-md-4">
                    
                    <img src='<?php echo $row['Image'] ;?>' height="150px" width="80%" >
                    <br/>
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
                 
                    <br>
                    
                    <label>Select Image <br/><smal>(only .jpg/.png/.jpeg Files are allowed) </smal> </label>
                    <input type="file" class="form-control" name="fl" >
                   <br><br>
                    <button type="submit" class="btn btn-primary" name="snd">Send</button>
                    <button type="submit" class="btn btn-primary" name="cncl">Cancel</button>
                </div>
                        </div></form>
                      <?php 
    if(isset($_POST['snd'])){
$txt=addslashes($_POST['con']);
 if(!is_uploaded_file($_FILES['fl']['tmp_name']))
 {
   $sql="UPDATE article set Title='$_POST[tl]',Content='$txt',Category='$_POST[ct]'
    where Post_id='$_GET[id]'";
    if($conn->query($sql)===TRUE)
        echo"<script>window.alert('Article Updated');window.location='editarticle.php?id=$aid';</script>";
       else 
           echo "<br/><div class='alert alert-danger'> <i class='iconfont iconfont-delete'> </i> &nbsp;
     Error:.$conn->error</div>";
   
 }else{
         $dirname="data/";
    $flname=$dirname.$_FILES['fl']['name'];
    $fl_tname=$_FILES['fl']['tmp_name'];
        $type=strtolower(pathinfo($flname,PATHINFO_EXTENSION));
        if($type!='jpg'&&$type!='jpeg'&&$type!='png')
            echo "Only.jpg, .jpeg,.png Files are Allowed";
        else{
   if(move_uploaded_file($fl_tname,$flname)){
                
        

    $sql="UPDATE article set Title='$_POST[tl]',Content='$txt',Image='$flname',Category='$_POST[ct]'
    where Post_id='$_GET[id]'";
    if($conn->query($sql)===TRUE)
        echo"<script>window.alert('Article Updated');window.location='editarticle.php?id=$aid';</script>";
       else 
           echo "<br/><div class='alert alert-danger'> <i class='iconfont iconfont-delete'> </i> &nbsp;
     Error:.$conn->error</div>";
    }
       else
    echo "<br/><div class='alert alert-danger'> <i class='iconfont iconfont-delete'> </i> &nbsp;
     Error:Error in Uploading Image File</div>";
    }} }
?>  
            
            </div>
            </div>
    
               <script> CKEDITOR.replace('con'); </script>
              <?php include 'footer.php'; ?>
    
        
        