<script src="../editor/ckeditor.js"> </script>
<?php include '../db.php'; include 'header.php';?>


           <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> +Add New Article</h4>
              </div>
              <div class="card-body">
               
              



                
                <hr>
                <form action="" method="post"  enctype="multipart/form-data">
            <div class="row">
                
                <div class="col-md-8">
                <label>Title</label>
                <input type="text" class="form-control" name="tl" required><br>
                <label>Content</label>
                <textarea type="text" class="form-control" maxlength="1000" name="con"  id="con"placeholder="type here.."required></textarea><br>
                </div>
                
                <div class="col-md-4">
                    <label>Select category</label>
                    <select class="form-control" name="ct" required>
                        <option value="">......</option>
                    <?php
    $sql= "select * from course_category";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc()){
echo "<option>".$row['Category']."</option>";
    }
    ?>
                    </select>
                    <br>
                    
                    <label>Image</label>
                    <input type="file" class="form-control" name="fl" required>
                    Accept (".jpg/.png/.jpeg") Files are allowed <br><br>
                    <button type="submit" class="btn btn-primary" name="snd">Send</button>
                    <button type="submit" class="btn btn-primary" name="cncl">Cancel</button>
                </div>
                    </div></form>
                      <?php 
    if(isset($_POST['snd'])){
        
        $txt=addslashes($_POST['con']);
         $dirname="data/";
    $flname=$dirname.$_FILES['fl']['name'];
    $fl_tname=$_FILES['fl']['tmp_name'];
        $type=strtolower(pathinfo($flname,PATHINFO_EXTENSION));
        if($type!='jpg'&&$type!='jpeg'&&$type!='png')
            echo "Only.jpg, .jpeg,.png Files are Allowed";
        else{
   if(move_uploaded_file($fl_tname,$flname)){
                
        

    $sql="INSERT INTO article(Title,Content,Image,Category) VALUES('$_POST[tl]','$txt','$flname','$_POST[ct]')";
    if($conn->query($sql)===TRUE)
        echo"<br/><div class='alert alert-success'> <i class='iconfont iconfont-tick-mark'> </i> &nbsp;
    Article Added</div>";
       else 
           echo "<br/><div class='alert alert-danger'> <i class='iconfont iconfont-delete'> </i> &nbsp;
     Error:.$conn->error</div>";
    }
       else
    echo "<br/><div class='alert alert-danger'> <i class='iconfont iconfont-delete'> </i> &nbsp;
     Error:Error in Uploading Image File</div>";
    }}
?>  
            
            </div>
            </div>
          </div>
              </div>
               <script> CKEDITOR.replace('con'); </script>
                         <?php include 'footer.php'; ?>

