<?php
require_once (__DIR__ . '/../../config/database.php');
require_once (__DIR__ . '/../../includes/header.php');


if($_POST){ //validation des fichiers

    $filename = '';

    if(!empty($_FILES['file'])){
        $targetDirectory= "../../uploads/"; //
        $file = $_FILES['file']['name']; 

        $path = pathinfo($file);
        $filename = $path['filename'];
        $ext = $path['extension'];

        $tmpName = $_FILES['file']['tmp_name'];

        $path_filename_ext = $targetDirectory.$filename.'.'.$ext;

        if(move_uploaded_file($tmpName, $path_filename_ext)){
            $filename = $filename.'.'.$ext;
        }    
    }
    $data=[
        'name' => $_POST['name'],
        'file' => $filename,
        'price' => $_POST['price'],
        'category' => $_POST['category'],
        'id' => $_GET['id'],
    ];
    $sql= "UPDATE product SET name=:name, file=:file, price=:price, category_id=:category WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);
}

$stm = $pdo->query("SELECT id, name FROM category");

$categories = $stm->fetchAll(PDO::FETCH_ASSOC);

if($_GET){
    $stm = $pdo->query("SELECT * FROM product WHERE id=".$_GET['id']);

    $product = $stm->fetch(PDO::FETCH_ASSOC);
}


?>

<main role="main">

    <div class="py-5 bg-light">
        <div class="container">
            <div class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content">
                <form method="post" enctype="multipart/form-data" action="">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="<?=$product['name']?>">
                    </div>
                    <div class="form-group">
                        <label for="price"> Prix </label>
                        <input type="text" class="form-control" name="price" id="price" value="<?=$product['price']?>">
                    </div>

                    <div class="form-group">
                        <label for="category">Categories </label>
                        <select name="category" id="category" class="form-control">
                            <?php foreach($categories as $c){?>
                                <option <?=($product['category_id']==$c['id']) ? "selected": ''?> value="<?=$c['id'];?>"> <?=$c['name'];?></option>

                            <?php };?>

                        </select>                        
                    </div>
                    <div class="form-group">
                        <label for="file">File</label>
                        <input type="file" class="form-control-file" name="file" id="file">
                    </div>
                    <button type="submit" class="btn btn-primary"> Modifier </button>
                </form>
            </div>
        </div>
    </div>

</main>
<?php
require_once(__DIR__.'/../../includes/footer.php');


?>