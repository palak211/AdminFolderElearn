<?php include '../db.php'; include 'header.php';?>


           <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Course Review </h4>
              </div>
              <div class="card-body">
               
        
        
            
            
           <table class="table table-striped table-bordered table-hover">
<tr>
    <th>Review By</th>
    <th>Review</th>
    <th>Course Name</th>
    <th>Review Date</th>
    

    
</tr>    
    <?php
    $sql= "select * from course_review,student,course where course_review.userid=student.sid and courseid=Course_id";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc()){

    echo"<tr>";
    echo"<td>".$row['FirstName']." ".$row['LastName']."</td>";
    echo"<td>".$row['Title']."</td>";
    echo"<td>".$row['review']."</td>";
    echo"<td>".$row['reviewdate']."</td>";
    echo"</tr>";
    }
    

    ?>
    
</table>
                </div></div></div>
            <?php include 'footer.php'; ?>