

<?php
    require_once '../security/newsource/Config.php';
    $qty = $db->query('SELECT quantity FROM hcms_items WHERE med_name=?', $_GET["thisItem"])->fetchArray();

 ?>



<input type="number" min="1" max="<?php echo $qty["quantity"];?>"
class="form-control" name="prod_quantity" id="prod_quantity" placeholder="Current stocks is <?php echo $qty["quantity"];?>"
  style="text-transform:capitalize;" required onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off>
