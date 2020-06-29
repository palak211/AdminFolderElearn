
<?php include '../db.php'; include 'header.php';?>


           <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Students</h4>
              </div>
              <div class="card-body">
               
        
     <form action="" method="get"> 
                <div class="row">
         
                    <div class="col-md-4 text-right pt-4"> Select Course Name</div>
             <div class="col-md-4 pt-2">
                    <select class="form-control" name="cr">
                 
                         <?php
                    
    $sql= "select * from course";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc()){
echo "<option value='".$row['Course_id']."'>".$row['Title']."</option>";
    }
    ?>
                    </select>
                    </div>  
        <div class="col-md-4">
            <button type='submit'class="btn btn-success" name="srch"> Search </button></div>
              
         </div> <br/>
                  </form>   
                
            
            
           <table class="table table-striped table-bordered table-hover">
<tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Enroll Date</th>
    
    

    
</tr>    
    <?php
    if(isset($_GET['srch'])){
    $sql= "select * from student,cart,course where cart.userid=student.Sid and cart.course_id=course.Course_id and cart.status='enroll' and cart.course_id='$_GET[cr]' order by edate DESC";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc()){

    echo"<tr>";

    echo"<td>".$row['FirstName']."</td>";
    echo"<td>".$row['LastName']."</td>";
    echo"<td>".$row['Email']."</td>";
    echo"<td>".$row['edate']."</td>";
           }
    }

    ?>
    
</table>
                </div></div></div>
            <?php include 'footer.php'; ?>
            
           