<?php include '../db.php';include 'header.php';?>
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Upload Study Material</h4>
              </div>
              <div class="card-body">
       
            <form action="" method="post"  enctype="multipart/form-data">

        
            <hr>
            <label>File Title</label>
<input type="text" class="form-control" required name="vt"><br>

            <label>Select File </label>
            <input type="file" class="form-control" required  name='fl' accept=".pdf">
            <label> Accept (Pdf only ) files are allowed</label> <br/><br>
            <button type="submit" name="sb" class="btn btn-primary">Upload</button>
            
                
                <div  class="col-md-1"></div>
                
                <?php include 'footer.php'; ?>  
                
                  </form> 
                <?php 
    if(isset($_POST['sb'])){
         $dirname="PDF/";
    $flname=$dirname.$_FILES['fl']['name'];
    $fl_tname=$_FILES['fl']['tmp_name'];
        $type=strtolower(pathinfo($flname,PATHINFO_EXTENSION));
        if($type!='pdf')
            echo "Only .pdf Files are Allowed";
        else{
   if(move_uploaded_file($fl_tname,$flname)){
                

       

    $sql="INSERT INTO study_material(File,Course_id,Title) VALUES('$flname','$_GET[id]','$_POST[vt]')";
    if($conn->query($sql)===TRUE)
    { 
       echo"<br/><div class='alert alert-success'> <i class='iconfont iconfont-tick-mark'> </i> &nbsp;
    File Uploaded </div>";
     
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

                
        </div>  
        
                </div></div></div></div>
            
            
            
            
        
        