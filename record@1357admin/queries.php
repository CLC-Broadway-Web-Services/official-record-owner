<?php
include 'globals/header.php';
$data = new record();
$emailList = $data->getAllItems("queries");
// echo "<pre>";
// print_r($emailList);
// echo "</pre>";
// die();
// delete record query
if(isset($_REQUEST['delete']) && $_REQUEST['delete']=='y'){
    // $db = new adminUpdate();
    $id = $_REQUEST['id'];
    
        $sqlDelete = $db->execute("DELETE FROM `queries` WHERE `id` = '$id'");
        if($sqlDelete==true):
            $msg = 'Record Successfully Deleted ..!!';
        else:
            $msg = 'Sorry !! Some Error Accurd .. Try Again';
        endif;
        echo "<script>alert('".$msg."');
        location.href = 'queries.php';
        </script>";
    }
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1> Queries </h1>
        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Queries</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Queries</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th width="50%">Message</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($emailList as $row) :
                                    ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['mobile']; ?></td>
                                            <td><?php echo $row['message']; ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($row['created_at'])); ?></td>
                                            <td>
                                                <a href="?id=<?php echo $row['id']; ?>&delete=y" onClick="return confirm('Are you sure !! Record will be delete parmanently ..!!')"><i class="fa fa-trash-o"></i></a>
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