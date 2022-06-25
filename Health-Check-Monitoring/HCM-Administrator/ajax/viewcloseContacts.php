<div class="offcanvas-header"><strong><?php echo $_GET['dateCheck'] ?></strong>
  <h5 id="offcanvasRightLabel"></h5>

</div>
<div class="offcanvas-body">
  <h5><strong>BCpians</strong></h5>
  <div class="table-responsive">
    <table class="display table table-bordered table-hover" cellspacing="0">
      <thead>
        <tr>
          <th><small>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              </div>
            </small></th>
          <th><small>Full Name</small></th>
        </tr>
      </thead>
      <?php require_once "../security/newsource.php";
      require_once "../timezone.php";
      $sql = $db->query("SELECT hcms_ctracing.*, hcms_profile.cont_name, hcms_profile.cont_contact FROM hcms_ctracing LEFT JOIN hcms_profile ON hcms_ctracing.qrcode = hcms_profile.qr_code")->fetchAll();
      foreach ($sql as $data) {
        if ($_GET['dateCheck'] == $data['created_at']) {
          echo '<tbody>
        <tr>
          <td>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            </div>
          </td>
          <td><small>' . $data['cont_name'] . '</small></td>
        </tr>
      </tbody>';
        }
      } ?>
    </table>
    <div class="col float-end">
      <a href="#" class="btn btn-primary">Send</a>
    </div>
  </div>
  <h5><strong>Visitors</strong></h5>
</div>