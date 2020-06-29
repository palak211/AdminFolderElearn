<script src="../editor/ckeditor.js"> </script>
<?php include '../db.php';include 'header.php';?>
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
               
              
  <?php
    $sql="select * from course where Course_id='$_GET[id]'";
  $result=$conn->query($sql);
$row=$result->fetch_assoc();
?>
               
                <form action="" method="post" >
              
            
            <div class="row">
                
                <div class="col-md-12">
                    <label>Course Outline</label>
        
                <textarea type="text" class="form-control"  id="col"maxlength="1000" name="col" required><?php echo $row['Outline']?></textarea>
                            <br/>
                <textarea type="text" class="form-control"  id="cr"maxlength="1000" name="cr" rows="5" placeholder=" Course Requirments (if any)"><?php echo $row['Requirements']?></textarea>
                
                        
        <button type="submit" class="btn  btn-success" name="sb">Save</button>
                        
                        
            
                        </div>
                                                

                    </div>
                
                
                </form>
                
                      
            <?php 
    if(isset($_POST['sb'])){
        
        $col=addslashes($_POST['col']);
        $cr=addslashes($_POST['cr']);

    $sql="Update course set Outline='$col',Requirements='$cr' where Course_id='$_GET[id]'";
    if($conn->query($sql)===TRUE)
        echo"<br/><div class='alert alert-success'> <i class='iconfont iconfont-tick-mark'> </i> &nbsp;
    Course Added</div>";
       else 
    echo "<br/><div class='alert alert-danger'> <i class='iconfont iconfont-delete'> </i> &nbsp;
     Error:</div>".$conn->error;
    }
   
?>  
            
                </div></div></div>
            
    <script> CKEDITOR.replace('col');</script>
            <?php include 'footer.php'; ?>
        
        
                
                