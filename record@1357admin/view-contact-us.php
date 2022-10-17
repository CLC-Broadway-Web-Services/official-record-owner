<?php
include 'globals/header.php';

// visibility record query
if(isset($_REQUEST['action'])){

$id = $_REQUEST['id'];
$item = $_REQUEST['item'];
$view = $_REQUEST['action'];


	$sqlStatus = $db->execute("UPDATE `hfacSettings` SET `$item` = '$view' WHERE `id` = '$id'");
}


$ContactUs = new ContactUs();
 $hfacSettings = new hfacSettings();
  $hfacSettingsQuery = $hfacSettings->gethfacVisibility();
?>
  
  <div class="content-wrapper">
    <section class="content-header">
      <h1> Manage Contact Us <small>View Contact Us</small> </h1>
      <ol class="breadcrumb">
        <li><a href="/record@1357admin/home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> View Contact Us</li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">View Contact Us</h3>
            </div>
            <div class="box-body">
              <?php if(isset($msg)){ ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> <?php echo $msg; ?></h4>
                </div>
                <?php } if(isset($errmsg)){ ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> <?php echo $errmsg; ?></h4>
                </div>
              <?php } ?>
              <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Items</th>
                    <th>Value</th>
                    <th>View</th>
                    <th>Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php 
				  
				  
					$ContactUsQuery = $ContactUs->allContactUs();
						foreach($ContactUsQuery as $row):
				  
				  ?>
                  <tr>
                      <td>1</td>
                      <td>address</td>
                    <td><?php echo $row['address']; ?></td>
                    <td>
                        <?php
                        if($hfacSettingsQuery['contactaddressView'] == 1){ ?>
                             <a href="/record@1357admin/view-contact-us.php?item=contactaddressView&&action=0&&id=1"> <i class="fa fa-toggle-on"></i></a>
                        <?php }else{ ?>
                             <a href="/record@1357admin/view-contact-us.php?item=contactaddressView&&action=1&&id=1"> <i class="fa fa-toggle-off"></i></a>
                       <?php } ?>
                        
                    </td>
                     <td><a href="/record@1357admin/update-contact-us?id=1"><i class="fa fa-edit"></i>Edit</a></td>
                    
                  </tr>
                  
                  
                  <tr>
                      <td>2</td>
                      <td>Sale Queries</td>
                    <td><?php echo $row['phone']; ?></td>
                    <td>
                        <?php
                        if($hfacSettingsQuery['contactphoneView'] == 1){ ?>
                            <a href="/record@1357admin/view-contact-us.php?item=contactphoneView&&action=0&&id=1"> <i class="fa fa-toggle-on"></i></a>
                        <?php }else{ ?>
                             <a href="/record@1357admin/view-contact-us.php?item=contactphoneView&&action=1&&id=1"> <i class="fa fa-toggle-off"></i></a>
                       <?php } ?>
                        
                    </td>
                     <td><a href="/record@1357admin/update-contact-us?id=1"><i class="fa fa-edit"></i>Edit</a></td>
                    
                  </tr>
                  
                   <tr>
                      <td>2</td>
                      <td>Product Design</td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <?php
                        if($hfacSettingsQuery['contactemailView'] == 1){ ?>
                            <a href="/record@1357admin/view-contact-us.php?item=contactemailView&&action=0&&id=1"> <i class="fa fa-toggle-on"></i></a>
                        <?php }else{ ?>
                             <a href="/record@1357admin/view-contact-us.php?item=contactemailView&&action=1&&id=1"> <i class="fa fa-toggle-off"></i></a>
                       <?php } ?>
                        
                    </td>
                     <td><a href="/record@1357admin/update-contact-us?id=1"><i class="fa fa-edit"></i>Edit</a></td>
                    
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
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>

</body>
</html>
