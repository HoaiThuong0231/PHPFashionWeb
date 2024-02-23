<?php
   
    $sql = "SELECT * FROM category"; 
    $result = $f->getAll($sql); 
    
    
?>
<div style="margin-bottom:20px;" >
    <div><a href="<?= PATH_ADMIN ?>page=catAdd"><button type="button" class="btn btn-primary" >Thêm</button></a></div>
</div>

<table class="table table-bordered" >
    <tr>
        <th></th>
        <th><center>Tên danh mục</center></th>
        <th><center>Sửa</center></th>
        <th><center>Xoá</center></th>
    </tr>
    <?php
        $i=1;
        foreach ($result as $value):
    ?>
    <tr>
        <td><center><?= $i ?></center></td>
        <td><?= $value['category_name'] ?></td>
        <td><center><a href="<?= PATH_ADMIN ?>page=catEdit&catId=<?=$value['id']?>"><img src="asset/images/edit.png" alt="sửa"></a></center></td>
        <td><center><a href="<?= PATH_ADMIN ?>page=catDelete&catId=<?=$value['id']?>"><img src="asset/images/del.png" alt="xoá"></a></center></td>
    </tr>


    <?php 
        $i++;
        endforeach; 
    ?>
</table>