<?php
  $sql = "SELECT * FROM products ORDER BY product_brand, product_name";
  $result = mysqli_query($db, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)){
        echo '<div class="row">
                <div class="project">
                  <div class="box">
                    <span class="name">'.$row['product_brand'].'</span>
                    <span class="name">'.$row['product_name'].'</span>
                  </div>
                  <div class="">
                  <button type="button" class="btn btn-dark toggle" data-toggle="modal" data-target="#modal'.$row['product_id'].'">Edit</button>
                </div>

                <div class="modal fade" id="modal'.$row['product_id'].'" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                  <div class="modal-dialog  modal-dialog-centered" role="document">
                    <form class="modal-content" action="includes/edit-products-submit.php" method="post">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modal'.$row['product_id'].'">Edit Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <div class="form-group">
                            <label for="product-brand">Brand: '.$row['product_brand'].'</label>
                            <input type="text" class="form-control" name="product-brand" placeholder="Enter New Product Brand" value="'.$row['product_brand'].'">

                            <input type text class="hide" id="product-id" name="product-id" value="'.$row['product_id'].'">

                            <label for="product-name">Name: '.$row['product_name'].'</label>
                            <input type="text" class="form-control" name="product-name" placeholder="Enter New Product Name" value="'.$row['product_name'].'">

                            <label for="product-description">Product Description</label>
                            <textarea type="text" class="form-control" name="product-description" placeholder="'.$row['product_description'].'"></textarea>

                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <label class="input-group-text" for="product-category">Product Category</label>
                              </div>
                              <select class="custom-select" id="product-category" name="product-category" >
                                <option>Juices</option>
                                <option>Mods</option>
                              </select>
                            </div>
                          </div>

                          <label for="product-price">Product Price £</label>
                          <input type="number" min="0.00" max="10000.00" step="0.01" class="form-control" name="product-price" placeholder="'.$row['product_price'].'" value="'.$row['product_price'].'">

                          <label for="product-stock">Product Stock Level</label>
                          <input type="number" min="0.00" max="10000.00" step="0.01" class="form-control" name="product-stock" placeholder="'.$row['product_stock'].'" value="'.$row['product_stock'].'">

                        <!--  <div class="input-group is-invalid">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" name="product-image">
                              <label class="custom-file-label" for="product-image">Choose Product Image...</label>
                            </div>
                          </div> -->

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
