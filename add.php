<?php
  if(isset($_POST['submit'])&& $_POST['submit']!==''){
  //require the db connection
  require_once 'includes/db.php';
  $firstname = (!empty($_POST['firstname']))?($_POST['firstname']):'';
  $lastname = (!empty($_POST['lastname']))?($_POST['lastname']):'';
  $gender = (!empty($_POST['gender']))?($_POST['gender']):'';
  $email = (!empty($_POST['email']))?($_POST['email']):'';
  $course = (!empty($_POST['course']))?($_POST['course']):'';
  $id = (!empty($_POST['st_id']))?($_POST['st_id']):'';

  if(!empty($id)){
  //update record
  $query="UPDATE  `student` 
          SET firstname='".$firstname."',
          lastname='".$lastname."',
           gender='".$gender."', 
           email='".$email."', 
           course='".$course."' WHERE id='".$id."'";
  $msg="update";

}else{
  //insert the new record
   $query = "INSERT INTO `student`(firstname,lastname,gender,email,course) VALUES ('".$firstname."','".$lastname."','".$gender."','".$email."','".$course."')";
   $msg="add";
}

 

  $res=mysqli_query($conn,$query);
  if($res){

 header('location:/StudentInformation/index.php?msg='.$msg);
}
}

if(isset($_GET['id']) && $_GET['id']!=' '){
  //require the db connection
  require_once 'includes/db.php';
  $st_id=$_GET['id'];
  $sql="SELECT * FROM `student` WHERE id='".$st_id."' ";
  $st_res= mysqli_query($conn , $sql);
  $results= mysqli_fetch_row($st_res);
  $firstname=$results[1];
  $lastname=$results[2];
  $gender=$results[3];
  $email=$results[4];
  $course=$results[5];


}else{
  $firstname="" ;
  $lastname="";
  $gender="";
  $email="";
  $course="";
  $st_id="";

  
}
?>


<!DOCTYPE html>
<html>

  <?php
  include'partials/head.php';
  ?>
  <body>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

    -->
    <?php
    include 'partials/nav.php'
    ?>

    <div class="container">
      
          <div class="col-sm-7">
                  <div><h1><center>Register Form</center></h1></div>
                  <div class="formdiv">
                       <form method="POST" action="">
                            <label for="firstname" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $firstname ?>">
 
                             <label for="lastname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname ?>">
                              <div class="form-group">
                               <label for="gender">Gender</label>
                                <select class="form-control" id="gender" name="gender" >
                                   <option><?php if($gender=='Male') ?>Male</option>
                                    <option><?php if($gender=='Female'){echo "selected";} ?>Female</option>
                                 </select>
                              </div>
 
                              <label for="email" class="form-label">Email address</label>
                              <input type="email" class="form-control" id="email" name="email" value="<?php echo $email?>"aria-describedby="emailHelp">
  

                               <label for="course" class="form-label">Course</label>
                              <input type="text" class="form-control" id="course" name="course" value="<?php echo $course?>">
                   </div>
                   <div class="mb-2">

                    <input type="hidden" name="student_id" value="<?php echo $st_id?>">
                      <input  type="submit" value="submit" name="submit" class="btn btn-primary">
                  </div>
                        </form>





          </div>

    </div>

  </body>
  </html>



