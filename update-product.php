<?php
include "header.php";
include "dbconn.php";
session_start();

if (isset($_POST['save'])) {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $content = $_POST['content'];
    $key = $_POST['key'];
    $data = [
        "title" => $title,
        "price" => $price,
        "content" => $content
    ];

    $result = $database->getReference('products/' . $key)->update($data);
    if ($result) {
        $_SESSION['message'] = "Product update Successfully";
        header("Location:index.php");
    }
}

if (isset($_GET['key'])) {
    $products = $database->getReference('products')->getChild($_GET['key'])->getValue();
?>
    <div class="container my-4">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-12">

                <div class="card">
                    <div class="card-header">
                        <h2>Update Product</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                            <div class="mb-3">
                                <label for="" class="form-label">Product Title</label>
                                <input type="text" class="form-control" id="" value="<?php echo $products["title"] ?>" name="title">
                                <input type="hidden" class="form-control" id="" value="<?php echo $_GET['key'] ?>" name="key">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Product Price</label>
                                <input type="number" class="form-control" id="" value="<?php echo $products['price'] ?>" name="price">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Product Content</label>
                                <input type="text" class="form-control" id="" value="<?php echo $products['content'] ?>" name="content">
                            </div>
                            <button type="submit" name="save" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
include "footer.php";
?>