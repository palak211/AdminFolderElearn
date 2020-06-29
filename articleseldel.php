
<?php include '../db.php';include 'header.php';?>

<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> +Added Articles </h4>
              </div>
              <div class="card-body">

             
                        
            
           <table class="table table-striped table-bordered table-hover">
<tr>
    <th>Title</th>
    <th>Content</th>
    <th>Category</th>
    <th>Image</th>
    <th>Edit</th>
<th>Delete</th>

    
</tr>    
    <?php
    $sql= "select * from article";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc()){
$aid=$row['Post_id'];
    
    echo"<tr>";
    echo"<td>".$row['Title']."</td>";
         echo"<td>".substr(strip_tags($row['Content']),0,250)."</td>";
         echo"<td>".$row['Category']."</td>";
    echo"<td><img src='".$row['Image']."' width='50px' height='50px'></td>";
        
    echo "<td> <a href='editarticle.php?id=$aid'> <i class='icofont icofont-edit'> </i></a> </td>";
        
    echo "<td> <a href='articleseldel.php?dl=$aid'> <i class='icofont icofont-delete'> </i></a> </td>";
    echo"</tr>";
    }

    ?>
    
</table>
                
            <?php 
    if(isset($_GET['dl'])){
        
    $sql="DELETE FROM article WHERE Post_id='$_GET[dl]'";
    if($conn->query($sql)===TRUE)
        echo"<script> window.location='articleseldel.php'; </script>";
       else 
           
           echo "<br/><div class='alert alert-danger'> <i class='iconfont iconfont-delete'> </i> &nbsp;
     Error:</div>".$conn->error;
        
    }?>
                
                
                
            

                                     
                <div  class="col-md-1"></div>


                 
                 
        
        
                 
                 
                 
                 </div></div></div>
            <?php include 'footer.php'; ?>