<?php include '../db.php';include 'header.php';?>
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Upload Video</h4>
              </div>
              <div class="card-body">
       

<form action="" method="post"  enctype="multipart/form-data">


<hr>
<label>Video Title</label>
<input type="text" class="form-control" required name="vt"><br>
<label>Select Video</label>
<input type="file" class="form-control" name="fl" required accept=".mp4">
only(mp4)files are allowed<br><br>
<button type="submit" class="btn btn-primary" name="sb">Upload Video</button>

      </form>

<?php 
    if(isset($_POST['sb'])){
         $dirname="videos/";
    $flname=$dirname.$_FILES['fl']['name'];
    $fl_tname=$_FILES['fl']['tmp_name'];
        $type=strtolower(pathinfo($flname,PATHINFO_EXTENSION));
        if($type!='mp4')
            echo "Only .mp4 Files are Allowed";
        else{
   if(move_uploaded_file($fl_tname,$flname)){
                
require_once('../getID3-master/getid3/getid3.php');
$getID3 = new getID3;
$file = $getID3->analyze($flname);
$duration=$file['playtime_string'];
echo $duration;
       

    $sql="INSERT INTO video(Title,Video,Course_id,Duration) VALUES('$_POST[vt]','$flname','$_GET[id]','$duration')";
    if($conn->query($sql)===TRUE)
    { 
       echo"<br/><div class='alert alert-success'> <i class='iconfont iconfont-tick-mark'> </i> &nbsp;
    Video Uploaded </div>";
     
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
            
                   <?php include 'footer.php'; ?>
        
            
            
            
            
        
        