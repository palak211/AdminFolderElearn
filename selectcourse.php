<?php include '../db.php';include 'header.php';?>

<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Added Courses</h4>
              </div>
              <div class="card-body">

             
            
            
            <table class="table table-striped table-bordered table-hover">
<tr>
    <th>Title</th>
    <th>Category</th>
    
    
    <th>Image</th>
    
    <th> + Video</th>
    
    <th> View Videos </th>
    <th> + Files </th>
    
    <th> View Files </th>
    
</tr>    
    <?php
    $sql= "select * from course";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc()){
$cid=$row['Course_id'];
    echo"<tr>";
    echo"<td>".$row['Title']."</td>";
         echo"<td>".$row['Category']."</td>";
        
        
    echo"<td><img src='".$row['Image']."' width='50px' height='50px'></td>";
         
        echo "<td> <a href='video.php?id=$cid'> <i class='icofont icofont-video'> </i></a> </td>";
    echo "<td> <a href='v_file.php?id=$cid'> <i class='icofont icofont-list'> </i></a> </td>";
    
    echo "<td> <a href='studymaterial.php?id=$cid'> <i class='icofont icofont-file-pdf'> </i></a> </td>";
    
    echo "<td> <a href='s_file.php?id=$cid'> <i class='icofont icofont-files'> </i></a> </td>";
    echo"</tr>";
    }

    ?>
            </table>
               
         
                </div></div></div>
            
            <?php include 'footer.php'; ?>