
<?php
require '../include/conn.php';
$lister = $conn->query("SELECT * FROM datms_program ORDER BY date DESC") or die("Error selecting!"); 
if ($lister->num_rows>0) {
    $results = $lister->fetch_all(MYSQLI_ASSOC);
    echo "<div style='' class-'curr_val'>".$lister->num_rows."</div>";
    echo '<table class="table table-hover datatable" id="ProgramTable">';
    echo '
    <thead>
      <tr>
        <th style="display:none"></th>
        <th style="display:none"></th>
        <th scope="col">Code</th>                    
        <th scope="col">Program</th>
        <th >Date Created</th>
        <th scope="col" WIDTH="10%">Action</th>      
      </tr>
    </thead>
    <tbody>
    ';
    foreach ($results as $result) {
        echo '<tr><td style="display:none" >'.$result['id']. '</td><td>' .$result['p_code'].'
            </td><td>'.$result['p_name'].'</td><td>'.$result['date'].'</td>
            <td data-label="">
              <div class="btn-group" role="group" aria-label="Basic mixed styles example">                     
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ViewModal<?php echo $progid;?>"><i class="bi bi-eye"></i></button> 
                <!-- <button class="btn btn-primary viewbtn"><i class="bi bi-eye"></i></button> -->
                <button class="btn btn-success editbtn"><i class="bi bi-pencil-square"></i></button>
                <button class="btn btn-danger deletebtn" ><i class="bi bi-trash" ></i></button>
                <!-- <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteModal<?php echo $progid;?>"><i class="bi bi-trash"></i></button>  -->
              </div>
            </td>
            </tr>
            
            ';
            
    }
    include '../modals/program_view.php';
    echo '</table>';
}
 ?>
