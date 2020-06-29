<?php include '../db.php';include 'header.php';?>

<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Question</h4>
              </div>
              <div class="card-body">

             



<div class="row">
<div class="col-md-12">
    
            
            
           <table class="table table-striped table-bordered table-hover">

    <?php
    $sql= "select * from user_que q,video v,student s where q.topicid=v.Video_id and q.queid='$_GET[qid]' and q.userid=s.Sid";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
$qid=$row['queid'];
    echo"<tr>";
    echo"<th> Course Title </th> <td>".$row['Title']."</td></tr>";
    echo"<tr><th> Question </th> <td>".$row['question']."</td></tr>";
    echo"<tr><th> Date </th> <td>".$row['ask_date']."</td></tr>";
    echo"<tr><th> Asked By </th> <td class='text-capitalize '>".$row['FirstName']." ".$row['LastName']." (".$row['Email'].") "."</td></tr>";
    ?>
    
</table>
    
    <h5> Your Reply </h5>
    <form action="" method="post">
    

<textarea name="reply" placeholder="Type Here......." rows="5" maxlength="3000" class="form-control"></textarea><br/>
        <hr/>
        <button type="submit" name="sb" class='btn bgs'>  Reply </button>
            </form>
    <?php 
    if(isset($_POST['sb'])){
    $sql="update user_que set reply='$_POST[reply]' where queid='$_GET[qid]'";
    if($conn->query($sql)===TRUE)
    echo "Reply Updated Successfully";
    else
    echo "Error :".$conn->error;
    }
?>   

    
    
                </div></div></div>
            <?php include 'footer.php'; ?>