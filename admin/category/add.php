
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $productName = $_POST['catname'];
        $cat = [
            'category_name' => $productName
        ];
        $messenge=$f->checkExist("category","category_name",$productName);
        if($messenge != 1){
            $f->message($messenge);
        }
        else{
            $f->addRecord("category", $cat);
            header("Location: ".PATH_ADMIN. "page=catList"); 
            exit();
        }
        
    }
?>
<div style="width:400px">
    <form method="post" action="<?= PATH_ADMIN ?>page=catAdd">
        <div class="form-group">
            <label for ="name">Tên danh mục</label>
            <input type="text" class="form-control" name="catname" />
        </div>
        <input type="submit" class="btn btn-primary" value="Submit"/>
    </form>
</div>