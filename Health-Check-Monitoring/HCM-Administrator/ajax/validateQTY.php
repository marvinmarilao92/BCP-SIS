<?php
require_once '../security/newsource/Config.php';
$qty = $db->query('SELECT available FROM hcms_stock WHERE brand_name=?', $_GET["thisItem"])->fetchArray();

?>



<input type="number" min="1" max="<?php echo $qty["available"]; ?>" class="form-control" name="prod_quantity"
  id="prod_quantity" placeholder="Current stocks is <?php echo $qty["available"]; ?>" style="text-transform:capitalize;"
  required onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false"
  onDrag="return false" onDrop="return false" autocomplete=off>