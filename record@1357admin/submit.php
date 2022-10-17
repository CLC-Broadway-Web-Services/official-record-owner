<?php
include 'globals/header.php';
$data = new record();
$table = "submit";
$dataList = $data->getAllItems($table);

if (isset($_REQUEST['delete']) && $_REQUEST['delete'] == 'y') {
    // $db = new adminUpdate();
    $id = $_REQUEST['id'];

    $sqlDelete = $db->execute("DELETE FROM `$table` WHERE `id` = '$id'");
    if ($sqlDelete == true) :
        $msg = 'Record Successfully Deleted ..!!';
    else :
        $msg = 'Sorry !! Some Error Accurd .. Try Again';
    endif;
    echo "<script>alert('" . $msg . "');
        location.href = '$table.php';
        </script>";
}
?>
<style>
    ul {
        list-style-type: none;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1> <?= ucwords($table) ?> </h1>
        <ol class="breadcrumb">
            <li><a href="/record@1357admin/home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?= ucwords($table) ?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All <?= ucwords($table) ?> Queries</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">


                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>View</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($dataList as $row) :
                                    ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['mobile']; ?></td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?= $row['id'] ?>">
                                                    <i class="fa fa-expand"></i>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Submit Detail</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <ul>
                                                                    <li>
                                                                        <p><strong>Name : </strong> <?= $row['name'] ?></p>
                                                                    </li>
                                                                    <li>
                                                                        <p><strong>Mobile : </strong> <?= $row['mobile'] ?></p>
                                                                    </li>
                                                                    <li>
                                                                        <p><strong>Email : </strong> <?= $row['email'] ?></p>
                                                                    </li>
                                                                    <li>
                                                                        <p><strong>Movie : </strong> <?= $row['movie'] ?></p>
                                                                    </li>
                                                                    <li>
                                                                        <p><strong>Duration : </strong> <?= $row['duration'] ?></p>
                                                                    </li>
                                                                    <li>
                                                                        <p><strong>Language : </strong> <?= $row['language'] ?></p>
                                                                    </li>
                                                                    <li>
                                                                        <p><strong>Country : </strong> <?= $row['country'] ?></p>
                                                                    </li>
                                                                    <li>
                                                                        <p><strong>Preview_Link : </strong> <?= $row['preview_link'] ?></p>
                                                                    </li>
                                                                    <li>
                                                                        <p><strong>Password : </strong> <?= $row['password'] ?></p>
                                                                    </li>
                                                                    <li>
                                                                        <p><strong>Director : </strong> <?= $row['director'] ?></p>
                                                                    </li>
                                                                    <li>
                                                                        <p><strong>Producer : </strong> <?= $row['producer'] ?></p>
                                                                    </li>
                                                                    <li>
                                                                        <p><strong>Production_Company : </strong> <?= $row['production_company'] ?></p>
                                                                    </li>
                                                                    <li>
                                                                        <p><strong>Synopsis : </strong> <?= $row['synopsis'] ?></p>
                                                                    </li>
                                                                  
                                                                </ul>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo date('d-m-Y', strtotime($row['created_at'])); ?></td>
                                            <td>
                                                <a href="/record@1357admin/submit.php?id=<?php echo $row['id']; ?>&delete=y" onClick="return confirm('Are you sure !! Record will be delete parmanently ..!!')"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include 'globals/footer.php'; ?>
<div class="control-sidebar-bg"></div>
</div>
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"></script>
<script>
    $(document).ready(function() {
        $("img.lazy").lazyload();
        $('#example1').DataTable({
            drawCallback: function() {
                $("img.lazy").lazyload();
                $(window).trigger("scroll")
            }
        });
    });
</script>
</body>

</html>