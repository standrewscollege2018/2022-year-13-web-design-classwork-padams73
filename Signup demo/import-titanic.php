<?php


if (isset($_POST["import"])) {

    $fileName = $_FILES["file"]["tmp_name"];

    if ($_FILES["file"]["size"] > 0) {

        $file = fopen($fileName, "r");

        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {

            $id = "";
            if (isset($column[0])) {
                $id = mysqli_real_escape_string($dbconnect, $column[0]);
            }
            $survived = "";
            if (isset($column[1])) {
                $survived = mysqli_real_escape_string($dbconnect, $column[1]);
            }
            $class = "";
            if (isset($column[2])) {
                $class = mysqli_real_escape_string($dbconnect, $column[2]);
            }
            $name = "";
            if (isset($column[3])) {
                $name = mysqli_real_escape_string($dbconnect, $column[3]);
            }
            $gender = "";
            if (isset($column[4])) {
                $gender = mysqli_real_escape_string($dbconnect, $column[4]);
            }
            $age = "";
            if (isset($column[5])) {
                $age = mysqli_real_escape_string($dbconnect, $column[5]);
            }
            $sibling_spouse = "";
            if (isset($column[6])) {
                $sibling_spouse = mysqli_real_escape_string($dbconnect, $column[6]);
            }
            $parent_children = "";
            if (isset($column[7])) {
                $parent_children = mysqli_real_escape_string($dbconnect, $column[7]);
            }
            $fare = "";
            if (isset($column[8])) {
                $fare = mysqli_real_escape_string($dbconnect, $column[8]);
            }

            $sqlInsert = "INSERT into titanic (id,survived,class,name,gender,age,sibling_spouse,parent_children,fare)
                   values ($id, $survived, $class, '$name', '$gender', $age, $sibling_spouse, $parent_children, $fare)";
            $insert_qry = mysqli_query($dbconnect, $sqlInsert);

        }
    }
}
?>
<h2>Import CSV file into Mysql using PHP</h2>

    <div id="response"
        class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>">
        <?php if(!empty($message)) { echo $message; } ?>
        </div>
    <div class="outer-scontainer">
        <div class="row">

            <form class="form-horizontal" action="" method="post"
                name="frmCSVImport" id="frmCSVImport"
                enctype="multipart/form-data">
                <div class="input-row">
                    <label class="col-md-4 control-label">Choose CSV
                        File</label> <input type="file" name="file"
                        id="file" accept=".csv">
                    <button type="submit" id="submit" name="import"
                        class="btn-submit">Import</button>
                    <br />

                </div>

            </form>

        </div>
               <?php
            $sqlSelect = "SELECT * FROM titanic";
            $result = mysqli_query($dbconnect, $sqlSelect);

            if (! empty($result)) {
                ?>
            <table id='userTable'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Survived</th>
                    <th>Class</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Sibling/spouse</th>
                    <th>Parent/children</th>
                    <th>Fare</th>

                </tr>
            </thead>
<?php

                foreach ($result as $row) {
                    ?>

                <tbody>
                <tr>
                    <td><?php  echo $row['id']; ?></td>
                    <td><?php  echo $row['survived']; ?></td>
                    <td><?php  echo $row['class']; ?></td>
                    <td><?php  echo $row['name']; ?></td>
                    <td><?php  echo $row['gender']; ?></td>
                    <td><?php  echo $row['age']; ?></td>
                    <td><?php  echo $row['sibling_spouse']; ?></td>
                    <td><?php  echo $row['parent_children']; ?></td>
                    <td><?php  echo $row['fare']; ?></td>
                </tr>
                    <?php
                }
                ?>
                </tbody>
        </table>
        <?php } ?>
    </div>
