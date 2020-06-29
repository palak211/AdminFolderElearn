
<?php include '../db.php';include 'header.php';?>

<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> View Quiz Info</h4>
              </div>
              <div class="card-body">

             
                        
            
           <table class="table table-striped table-bordered table-hover">
<tr>
    <th>Question</th>
   
    <th>Answer</th>
   
<th>Delete</th>

    
</tr>    
    <?php
    $sql= "select * from questions where Course_id='$_GET[id]' ";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc()){
$aid=$row['ques_id'];
$ans=$row['answer'];
$crsid=$_GET['id'];

    
    echo"<tr>";
    echo"<td>".$row['question']."</td>";
    echo"<td>".$row[$ans]."</td>";
    
   
        
    echo "<td> <a href='viewquestion.php?dl=$aid&id=$crsid'> <i class='icofont icofont-delete'> </i></a> </td>";
    echo"</tr>";
    }

    ?>
    
</table>
                
            <?php 
    if(isset($_GET['dl'])){
        $crsid=$_GET['id'];
    $sql="DELETE FROM questions WHERE ques_id='$_GET[dl]'";
    if($conn->query($sql)===TRUE)
        echo"<script> window.location='viewquestion.php?id=$crsid'; </script>";
       else 
           
           echo "<br/><div class='alert alert-danger'> <i class='iconfont iconfont-delete'> </i> &nbsp;
     Error:</div>".$conn->error;
        
    }?>
                
                
                
            

                                     
                <div  class="col-md-1"></div>


                 
                 
        
        
                 
                 
                 
                 </div></div></div>
            <?php include 'footer.php'; ?>