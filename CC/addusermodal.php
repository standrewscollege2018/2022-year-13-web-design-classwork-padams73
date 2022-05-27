

  <script type="text/javascript">
$(document).ready(function(){
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    fieldHTML = this.responseText;
  }
};
xmlhttp.open("GET", "select.php", true);
xmlhttp.send();
  var maxField = 10; //Input fields increment limitation
  var addButton = $('.add_button'); //Add button selector
  var wrapper = $('.field_wrapper'); //Input field wrapper
  // var fieldHTML = '<div><input type="text" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button"><img src="remove-icon.png"/></a></div>'; //New input field html
  var x = 1; //Initial field counter is 1

  //Once add button is clicked
  $(addButton).click(function(){
      //Check maximum number of input fields
      if(x < maxField){
          x++; //Increment field counter
          $(wrapper).append(fieldHTML); //Add field html
      }
  });

  //Once remove button is clicked
  $(wrapper).on('click', '.remove_button', function(e){
      e.preventDefault();
      $(this).parent('div').remove(); //Remove field html
      x--; //Decrement field counter
  });
});
</script>

  <?php

  $id=1;
  $classid=1;
  $a=0;
  ?>



          <h1 class="" id="adduser">Add Student</h1>


        <div class="">
          <form class="" action="adduser.php" method="get">
            <div class="mb-3">
              <label for="firstname" class="form-label">First Name</label>
              <input type="text" required class="form-control" id="firstname" name="firstname">
            </div>
            <div class="mb-3">
              <label for="lastname" class="form-label">Last Name</label>
              <input type="text" required class="form-control" id="lastname" name="lastname">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" required class="form-control" id="email" name="email">
            </div>

            <div class="field_wrapper">

               <select class="" name='classIDs[]'>
                 <?php
                 $class_stmt = $dbconnect->prepare("SELECT * FROM class");
                 $class_stmt -> execute();
                 $class_result = $class_stmt->get_result();
                 $class_data = $class_result->fetch_all(MYSQLI_ASSOC);


                 if ($class_result->num_rows > 0) {
                   foreach ($class_data as $row) {
                     $classID = $row['classID'];
                     $class = $row['class'];

                     echo "<option value='$classID'>$class</option>";
                   }
                 }else {
                   echo "<option value='$classID'>Error: No class found</option>";
                 }



                  ?>

               </select>
               <a href="javascript:void(0);" class="add_button" title="Add field"><i class="bi bi-plus-circle-fill"></i></a>
            </div>
            <select class="" name="waka">
              <?php
              $waka_stmt = $dbconnect->prepare("SELECT * FROM house");
              $waka_stmt -> execute();
              $waka_result = $waka_stmt->get_result();
              $waka_data = $waka_result->fetch_all(MYSQLI_ASSOC);


              if ($waka_result->num_rows > 0) {
                foreach ($waka_data as $row) {
                  $wakaID = $row['houseID'];
                  $waka = $row['housename'];

                  echo "<option value='$wakaID'>$waka</option>";
                }
              }else {
                echo "<option value='0'>Error: No class found</option>";
              }

              ?>

            </select>
            <select class="" name="wa_whanau">
              <?php
              $wa_whanau_stmt = $dbconnect->prepare("SELECT * FROM tutor");
              $wa_whanau_stmt -> execute();
              $wa_whanau_result = $wa_whanau_stmt->get_result();
              $wa_whanau_data = $wa_whanau_result->fetch_all(MYSQLI_ASSOC);


              if ($wa_whanau_result->num_rows > 0) {
                foreach ($wa_whanau_data as $row) {
                  $wa_whanauID = $row['tutorID'];
                  $wa_whanau = $row['tutorname'];

                  echo "<option value='$wa_whanauID'>$wa_whanau</option>";
                }
              }else {
                echo "<option value='0'>Error: No tutors found</option>";
              }

              ?>
            </select>
            <select class="" name="yeargroup">
              <?php
              $yeargroup_stmt = $dbconnect->prepare("SELECT * FROM yeargroup");
              $yeargroup_stmt -> execute();
              $yeargroup_result = $yeargroup_stmt->get_result();
              $yeargroup_data = $yeargroup_result->fetch_all(MYSQLI_ASSOC);


              if ($yeargroup_result->num_rows > 0) {
                foreach ($yeargroup_data as $row) {
                  $yeargroupID = $row['yeargroupID'];
                  $yeargroup = $row['yeargroupname'];

                  echo "<option value='$yeargroupID'>$yeargroup</option>";
                }
              }else {
                echo "<option value='0'>Error: No year group found</option>";
              }

              ?>

            </select>


        </div>
        <div class="">

          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      
