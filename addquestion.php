<?php include '../db.php';include 'header.php';?>
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> +Add  New Question</h4>
              </div>
              <div class="card-body">



                <br>
                 <form action="" method="post">
            
                <label>Questions</label>
                <textarea type="text" class="form-control" maxlength="1000"required name="qes"></textarea><br>
            <label>Type Options here </label>
            <div class="row">
                
                <div class="col-md-9">

                <textarea type="text" class="form-control" maxlength="1000"  placeholder="Option1" name="op1"required></textarea><br>
                <textarea type="text" class="form-control" maxlength="1000"  placeholder="Option2" name="op2"required></textarea><br>
                <textarea type="text" class="form-control" maxlength="1000"  placeholder="Option3" name="op3"required></textarea><br>
                <textarea type="text" class="form-control" maxlength="1000"  placeholder="Option4" name="op4"required></textarea><br>    
                </div>
                
                <div class="col-md-2">
                    <label>Select Correct Option</label>
                    <select class="form-control" name="ct">
                        <option value="option1">Option 1</option>
                        <option value="option2">Option 2</option>
                        <option value="option3">Option 3</option>
                        <option value="option4">Option 4</option>
                    </select><br><br><br><br>
                    
                
                    <button type="submit" class="btn btn-primary btn-block" name="sb">Save Question </button><br>
                  
                    <button type="submit" class="btn btn-primary btn-block" name="re">Reset Form</button>
                
                </div>
                
                     </div></form>
                
                      
            <?php 
    if(isset($_POST['sb'])){
        
                
        

    $sql="INSERT INTO questions(question,option1,option2,option3,option4,answer,Course_id) VALUES('$_POST[qes]','$_POST[op1]','$_POST[op2]','$_POST[op3]','$_POST[op4]','$_POST[ct]','$_GET[id]')";
    
    if($conn->query($sql)===TRUE)
        echo"<br/><div class='alert alert-success'> <i class='iconfont iconfont-tick-mark'> </i> &nbsp;
    Answer Saved</div>";
       else 
           echo "<br/><div class='alert alert-danger'> <i class='iconfont iconfont-delete'> </i> &nbsp;
     Error:</div>".$conn->error;
    }
     
?>  
            
            </div>
              </div></div></div>
<?php include 'footer.php'; ?>  
        
        