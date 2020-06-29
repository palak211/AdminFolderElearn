
<?php include '../db.php'; include 'header.php';?>


           <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Students</h4>
              </div>
              <div class="card-body">
               
        
        
                
            
            
           <table class="table table-striped table-bordered table-hover">
<tr>
    <th> First Name</th>
    <th>Last Name</th>
    <th>E-Mail</th>
    <th>Phone Number</th>
    <th>Image</th>
    

    
</tr>    
    <?php
    $sql= "select * from student";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc()){

    echo"<tr>";

    echo"<td>".$row['FirstName']."</td>";
    echo"<td>".$row['LastName']."</td>";
    echo"<td>".$row['Email']."</td>";
        echo"<td>".$row['Pno']."</td>";
        echo"<td><img src='../user/".$row['Img']."' width='70px' height='70px' ></td>";
        echo"</tr>";
    }
    

    ?>
    
</table>
                </div></div></div>
            <?php include 'footer.php'; ?>
            
           