<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css" />
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> จัดการผู้ใช้งาน
            <small>เพิ่ม, แก้ไข, ลบ</small>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php elseif ($this->session->flashdata('error')) : ?>
                <div class="alert alert-error alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
                <?php endif; ?>
                    <!-- <a class="btn btn-primary" href="<?php echo base_url(); ?>addNew"><i class="fa fa-plus"></i> Add
                        New</a> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">รายชื่อผู้ใช้</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-hover" id="userlist">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>รหัสสมาชิก</th>
                                    <th>ชื่อ</th>
                                    <th>E-mail</th>
                                    <th>เบอร์โทร</th>
                                    <th>ตำแหน่ง</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                    if(!empty($userRecords))
                    {
                        $i = 0;
                        foreach($userRecords as $record)
                        {
                            $i++;
                    ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $record->code ?></td>
                                    <td><?php echo $record->name ?></td>
                                    <td><?php echo $record->email ?></td>
                                    <td><?php echo $record->mobile ?></td>
                                    <td><?php echo $record->role ?></td>
                                    <td class="text-center">

                                        <a class="btn btn-sm btn-info"
                                            href="<?php echo base_url().'editOld/'.$record->userId; ?>"><i
                                                class="fa fa-pencil"></i></a>
                                        |
                                        <button class="btn btn-sm btn-danger" onclick="removeFunc(<?= $record->userId?>)" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                <?php
                        }
                    }
                    ?>
                            </tbody>
                        </table>

                    </div><!-- /.box-body -->

                </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
 <!-- remove user modal -->
 <div class="modal fade" tabindex="-1" role="dialog" id="removeModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">ลบผู้ใช้งานแอพ</h4>
        </div>

        <form role="form" action="deleteUser" method="post" id="removeForm">
          <div class="modal-body">
            <p>ยืนยันการลบ ?</p>
            <input type="hidden" value="" name="userId" id="userId" />
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
            <button type="submit" class="btn btn-primary">ยืนยัน</button>
          </div>
        </form>


      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
// jQuery(document).ready(function() {
//     jQuery('ul.pagination li a').click(function(e) {
//         e.preventDefault();
//         var link = jQuery(this).get(0).href;
//         var value = link.substring(link.lastIndexOf('/') + 1);
//         jQuery("#searchList").attr("action", baseURL + "userListing/" + value);
//         jQuery("#searchList").submit();
//     });
// });
$(document).ready(function() {
    $('#userlist').DataTable({
        dom: 'Bfrtip',
        buttons: {
        //     'copyHtml5',
        //     'excelHtml5',
        //     'csvHtml5',
            buttons:[
                {
                    className: 'btn-primary',
                    text:'เพิ่ม',
                    action: function(){
                        window.location.href = 'addNew';
                    }
                }
            ],
            dom: {
                button:{
                    className:'btn'
                }
            },
        },
        pageLength: 50
    });
});
function removeFunc(id) {
    if (id) {
        $('#userId').val(id);
    }
    }
</script>
<?php
    unset($_SESSION['success']);
    unset($_SESSION['error']);
?>