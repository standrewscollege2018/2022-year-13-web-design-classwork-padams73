<?php


if (isset($_POST["import"])) {

    $fileName = $_FILES["file"]["tmp_name"];

    if ($_FILES["file"]["size"] > 0) {

        $file = fopen($fileName, "r");

        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {


            $username = "";
            if (isset($column[0])) {
                $username = mysqli_real_escape_string($dbconnect, $column[0]);
            }
            $email = "";
            if (isset($column[1])) {
                $email = mysqli_real_escape_string($dbconnect, $column[1]);
            }
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $temp = substr( str_shuffle( $chars ), 0, 8 );



            $sqlInsert = "INSERT into user2 (username, email, temp)
                   values ('$username', '$email', '$temp')";
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
if (isset($_POST["import"])) {

            $sqlSelect = "SELECT * FROM user2";
            $result = mysqli_query($dbconnect, $sqlSelect);

            if (! empty($result)) {
                ?>
                <h3>The following records have been imported</h3>
            <table id='userTable'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Temp Scramble</th>
                    <th>Link to set password</th>
                </tr>
            </thead>
<?php

                foreach ($result as $row) {
                  $username = $row['username'];
                  $temp = $row['temp'];
                    ?>

                <tbody>
                <tr>
                    <td><?php  echo $row['userID']; ?></td>
                    <td><?php  echo $row['username']; ?></td>
                    <td><?php  echo $row['email']; ?></td>
                    <td><?php  echo $row['temp']; ?></td>
                    <?php
                    $userhash = password_hash("$username", PASSWORD_DEFAULT);
                    $u = substr("$userhash", 7);
                     ?>
                    <td><a href="index.php?page=enterpassword&u=<?php echo $u; ?>&temp=<?php echo $temp;?>">&lt;href="index.php?page=enterpassword&u=<?php echo $u; ?>&temp=<?php echo $temp;?>"&gt;</a></td>
                </tr>
                    <?php
                }
                ?>
                </tbody>
        </table>

        <?php }
      }
       ?>
    </div>
