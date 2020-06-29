<?php include '../db.php'; include 'header.php';?>


           <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Reviews</h4>
              </div>
              <div class="card-body">
               
        
        
            
            
           <table class="table table-striped table-bordered table-hover">
<tr>
    <th>Name</th>
    <th>E-Mail</th>
    <th>Review</th>

    <th>Meessage_Date</th>
    

    
</tr>    
    <?php
    $sql= "select * from review,student where review.review_by=student.sid";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc()){

    echo"<tr>";

    echo"<td>".$row['FirstName']." ".$row['LastName']."</td>";
    echo"<td>".$row['Email']."</td>";
    echo"<td>".$row['review']."</td>";
 echo"<td>".$row['review_date']."</td>";
        echo"</tr>";
    }
    

    ?>
    
</table>
                </div></div></div>
            <?php include 'footer.php'; ?>