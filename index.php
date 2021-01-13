<?php
//mysql connection
require_once 'includes/db.php';

  $sql = "SELECT * FROM `student`";

  $res=mysqli_query($conn,$sql);

  $record=mysqli_num_rows($res);
  $msg ="";
  if(!empty($_GET['msg'])){
  $msg = $_GET['msg'];
  $alert_msg = ($msg== "add") ? "New record has been added successfully!" : (($msg=="del") ? "New record has been deleted successfully!" :"Record Updated successfully!");

}else{
  $alert_msg="";
}



?>
<!doctype html>
<html lang="en">
 <?php 
 include 'partials/head.php';
 ?>

  <body>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <?php
    include 'partials/nav.php'
    ?>
<div class="container">
    <?php if(!empty($alert_msg)){ ?>
    

      <div class="alert alert-success"><?php echo $alert_msg; ?></div>
  <?php } ?>
</div>
  <div class="info"></div>
  <!-- Content here -->
<table class="table table-striped table-hover">
  
    <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Email</th>
      <th scope="col">Course</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if(!empty($res)){
    while($row= mysqli_fetch_assoc($res))
    {

      ?>
        <tr>
        <th scope="row"><?php echo $row['id']?></th>
        <th scope="row"><?php echo $row['firstname'].'  ' .$row['lastname']?></th>
        <th scope="row"><?php echo $row['gender']?></th>
        <th scope="row"><?php echo $row['email']?></th>
        <th scope="row"><?php echo $row['course']?></th>
        <td>
        <a href="/StudentInformation/add.php?id=<?php echo $row['id'];?>" class="btn btn-primary">EDIT</a>
        <a href="/StudentInformation/delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger" onClick="JavaScript:return confirm('Do you really want to delete');">DELETE</a>

      </td>
     </tr>
     <?php
   }
 }
 ?>
 
 
   
  </tbody>
  </table>
</div>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>