
<?php include '../db.php'; include 'header.php';?>
<?php $vid=34; $crs=0 ; $art=0;  $stu=0; 
//stats 
    $nr=$conn->query("select * from course");
    $crs=$nr->num_rows;
    
    $nr=$conn->query("select * from student");
    $stu=$nr->num_rows;

    $nr=$conn->query("select * from article");
    $art=$nr->num_rows;

    $nr=$conn->query("select * from video");
    $vid=$nr->num_rows;


?>
           <div class="content">
<div class="row text-white text-center">
<div class="col-md-3">
    <div class="row">
<div class="col-md-4 pt-3" style="background:#3AAFA9;"> 
    <i class='icofont icofont-3x icofont-user-alt-2'> </i></div> 
        <div class="col-md-7 pt-3 text-right" style="background:#2B7A78"> <h6> Students </h6><h5> <?php echo $stu;?></h5> </div>
    </div></div>
               
<div class="col-md-3">
    <div class="row">
<div class="col-md-4 pt-3" style="background:#8860D0;"> 
    <i class='icofont icofont-3x icofont-book'> </i></div> 
        <div class="col-md-7 pt-3 text-right" style="background:#44318D;"> <h6> Courses  </h6><h5> <?php echo $crs;?></h5> </div>
    </div></div>

<div class="col-md-3">
    <div class="row">
<div class="col-md-4 pt-3" style="background:#9A1750;"> 
    <i class='icofont icofont-3x icofont-video'> </i></div> 
        <div class="col-md-7 pt-3 text-right" style="background:#EE4C7C;"> <h6> Course Video </h6><h5> <?php echo $vid;?></h5> </div>
    </div></div>

<div class="col-md-3">
    <div class="row">
<div class="col-md-4 pt-3" style="background:#4056A1;"> 
    <i class='icofont icofont-3x icofont-page'> </i></div> 
        <div class="col-md-7 pt-3 text-right" style="background:#C5CBE3;"> <h6> Articles </h6><h5> <?php echo $art;?></h5> </div>
    </div></div>

        
               
               
               </div> <br/>
        
               
               
               <div class="row">
          <div class="col-md-6">
             
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Recent Enrollments</h5>
              </div>
              <div class="card-body">
               
        
                
            
            
           <table class="table table-striped table-sm table-bordered table-hover">
<tr>
    <th>Student Name</th>
    <th>Course</th>
    <th>Enroll Date</th>
    
    

    
</tr>    
    <?php
    $sql= "select * from student,cart,course where cart.userid=student.Sid and cart.course_id=course.Course_id and cart.status='enroll' order by edate DESC limit 4";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc()){

    echo"<tr>";

    echo"<td class='text-capitalize'>".$row['FirstName']." ";
    echo"".$row['LastName']."</td>";
    echo"<td>".$row['Title']."</td>";
    echo"<td>".$row['edate']."</td>";
           }
    

    ?>
    
</table>
                </div></div></div>
                      
      <div class="col-md-6">
             
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Course Reviews </h5>
              </div>
              <div class="card-body">
                  
                  <?php
    $sql= "select * from course_review,student,course where course_review.userid=student.sid and courseid=Course_id limit 2";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc()){ 
     echo "<div class='alert alert-light text-dark border'>";
    echo "<p>".$row['review']."( ";
    echo" Course :".$row['Title'].") </p>";
    echo "<span class='text-right'><i class='icofont icofont-user'></i> &nbsp;  ".$row['FirstName']." ".$row['LastName']."&nbsp; &nbsp;";
    echo"<i class='icofont icofont-calendar'></i> &nbsp; ".$row['reviewdate']."</span> </div>";
    } ?>
                  
                
                  
                </div></div></div>         
              
              
              
              </div>
            <?php include 'footer.php'; ?>
            
           