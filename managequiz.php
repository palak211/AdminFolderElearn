<?php include '../db.php';include 'header.php';?>

<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Manage Quiz</h4>
              </div>
              <div class="card-body">

             
            
            
            <table class="table table-striped table-bordered table-hover">
<tr>
    <th>Title</th>
    
    
    <th>Image</th>
    
    <th> + Question</th>
    <th> View Que </th>
    
</tr>    
    <?php
    $sql= "select * from course";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc()){
$cid=$row['Course_id'];
    echo"<tr>";
    echo"<td>".$row['Title']."</td>";
        
        
    echo"<td><img src='".$row['Image']."' width='50px' height='50px'></td>";
         
        echo "<td> <a href='addquestion.php?id=$cid'> <i class='icofont icofont-plus'> </i></a> </td>";
    echo "<td> <a href='viewquestion.php?id=$cid'> <i class='icofont icofont-list'> </i></a> </td>";
    echo"</tr>";
    }

    ?>
            </table>
               
         
                </div></div></div>
            
            <?php include 'footer.php'; ?>