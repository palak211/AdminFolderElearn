<?php include '../db.php'; include 'header.php';?>


           <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Talk To us</h4>
              </div>
              <div class="card-body">
               
        
        
            
            
           <table class="table table-striped table-bordered table-hover">
<tr>
    <th>Name</th>
    <th>E-Mail</th>
    <th>Subject</th>
    <th>Message</th>
    <th>Meessage_Date</th>
    

    
</tr>    
    <?php
    $sql= "select * from Contact_msg";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc()){

    echo"<tr>";

    echo"<td>".$row['name']."</td>";
    echo"<td>".$row['email']."</td>";
    echo"<td>".$row['subject']."</td>";
        echo"<td>".$row['msg']."</td>";
        echo"<td>".$row['msg_date']."</td>";
        echo"</tr>";
    }
    

    ?>
    
</table>
                </div></div></div>
            <?php include 'footer.php'; ?>