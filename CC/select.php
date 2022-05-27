<div class="field_wrapper">
  <?php
  include 'dbconnect.php';
  $class_sql = "SELECT * FROM class";
  $class_qry = mysqli_query($dbconnect, $class_sql);
  $class_aa = mysqli_fetch_assoc($class_qry);

   ?>
   <select class="" name="classIDs[]">
     <?php
     do {
       $classID = $class_aa['classID'];
       $class = $class_aa['class'];

       echo "<option value='$classID'>$class</option>";
     } while ($class_aa = mysqli_fetch_assoc($class_qry));


      ?>

   </select>
   <a href="javascript:void(0);" class="remove_button" title="Remove field"><i class="bi bi-dash-circle"></i></a>
</div>
