<?php
  $sql = "SELECT * from users";
  $result = mysqli_query($db, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)){
        echo '<div class="row">
                <div class="project">
                  <div class="box">
                    <span class="name">Username: '.$row['username'].'</span>
                  </div>
                  <div class="">
                  <button type="button" class="btn btn-dark toggle" data-toggle="modal" data-target="#modal'.$row['id'].'">Edit</button>
                </div>

                <div class="modal fade" id="modal'.$row['id'].'" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                  <div class="modal-dialog  modal-dialog-centered" role="document">
                    <form class="modal-content" action="includes/edit-users.php" method="post">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modal'.$row['id'].'">Edit User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <div class="form-group">
                            <label for="username">Usename: '.$row['username'].'</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter New Username" value="'.$row['username'].'">

                            <input type text class="hide" id="id" name="id" value="'.$row['id'].'">

                            <label for="email">Email: '.$row['email'].'</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter New Email" value="'.$row['email'].'">

                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <label class="input-group-text" for="userlvl">User Level</label>
                              </div>
                              <select class="custom-select" id="userlvl" name="userlvl" >
                                <option value="1">Admin</option>
                              </select>
                            </div>
                          </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" name="delete" value="delete">Delete</button>
                        <button type="submit" class="btn btn-success" name="save" value="save">Save</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
          </div>';
    }
} else {
    echo '<div class="row">
            <div class="project">
              <div class="box">
                <span class="name">Username: No User Found</span>
              </div>
          </div>
      </div>';
}
?>
