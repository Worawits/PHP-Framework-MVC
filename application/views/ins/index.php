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
            <i class="fa fa-users"></i> งวด
            <small>เพิ่ม, แก้ไข, ลบ</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('project')?>">โปรเจค</a></li>
            <li class="active"><?= $name['name'] ?></li>
        </ol>
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
                        <h3 class="box-title">งวด <?= $name['name'] ?></h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-hover" id="userlist">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>เลขงวด</th>
                                    <th>กำหนดเก็บงวด</th>
                                    <th>สถานะการชำระ</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($insRecords)) {
                                    $i = 0;
                                    foreach ($insRecords as $record) {
                                        $i++;
                                ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $record->ins_num ?></td>
                                            <td><?php echo $record->ins_col ?></td>
                                            <td>
                                                <?php if ($record->payment_status == 0) { ?>
                                                    <span class="label label-default">ยังไม่ชำระ</span>
                                                <?php } else if($record->payment_status == 1) { ?>
                                                    <span class="label label-success">ชำระแล้ว</span>
                                                    <?php } else if($record->payment_status == 2) { ?>
                                                    <span class="label label-warning">ค้างชำระ</span>
                                                    <?php } ?>
                                            </td>
                                            <td class="text-center">
                                            <a type="button" class="btn btn-default" href="<?= base_url('scope_project/' . $record->id) ?>"><i class="fa fa-file-text-o"></i> ขอบเขต</a> 
                                            <?php if($role == ROLE_SUPERADMIN || $role == ROLE_ADMIN || $role == ROLE_PROJECT_MANAGER || $role == ROLE_EMPLOYEE_DEV || $role == ROLE_EMPLOYEE_TESTER){?>
                                                |
                                                <button class="btn btn-sm btn-info" onclick="editFunc(<?= $record->id ?>)" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></button>
                                                |
                                                <button class="btn btn-sm btn-danger" onclick="removeFunc(<?= $record->id ?>)" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>
                                            <?php }?>
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
<!-- add Checklist modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="addModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">เพิ่ม</h4>
            </div>

            <form role="form" action="<?= base_url('addNewIns')?>" method="post" id="addForm">
                <div class="modal-body">
                    <input type="hidden" value="<?= $id ?>" name="id" id="id" />
                    <div class="form-group">
                        <label for="ins_num">เลขที่งวด</label>
                        <input type="text" class="form-control required" id="ins_num" name="ins_num"  autocomplete="off" placeholder="เลขที่งวด">
                    </div>
                    <div class="form-group">
                        <label for="ins_col">กำหนดเก็บงวด</label>
                        <input type="text" class="form-control required" id="ins_col" name="ins_col" autocomplete="off" placeholder="กำหนดเก็บงวด">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-primary">ยืนยัน</button>
                </div>
            </form>


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- edit Checklist modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">แก้ไข</h4>
            </div>

            <form role="form" action="<?= base_url('editOldIns')?>" method="post" id="editForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">เลขที่งวด</label>
                        <input type="text" class="form-control required" id="edit_ins_num" name="edit_ins_num" autocomplete="off" placeholder="เลขที่งวด">
                        <input type="hidden" value="" name="edit_id" id="edit_id" />
                        <input type="hidden" value="<?= $id ?>" name="id_project" id="id_project" />
                    </div>
                    <div class="form-group">
                        <label for="edit_ins_col">กำหนดเก็บงวด</label>
                        <input type="text" class="form-control required" id="edit_ins_col" name="edit_ins_col" autocomplete="off" placeholder="กำหนดเก็บงวด">
                    </div>
                    <div class="form-group">
                        <label for="payment_status">ความสำคัญ</label>
                        <select class="form-control required" id="edit_payment_status" name="edit_payment_status">
                            <option value="0">ยังไม่ชำระ</option>
                            <option value="1">ชำระแล้ว</option>
                            <option value="2">ค้างชำระ</option>
                        </select>

                    </div>
                    <!-- <div class="form-group">
                        <label for="active">สถานะ</label>
                        <select class="form-control required" id="edit_active" name="edit_active">
                            <option value="0">Active</option>
                            <option value="1">Unactive</option>
                        </select>

                    </div> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-primary">ยืนยัน</button>
                </div>
            </form>


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- remove Checklist modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">ลบ</h4>
            </div>

            <form role="form" action="<?= base_url('deleteIns')?>" method="post" id="removeForm">
                <div class="modal-body">
                    <p>ยืนยันการลบ ?</p>
                    <input type="hidden" value="" name="delete_id" id="delete_id" />
                    <input type="hidden" value="<?= $id ?>" name="delete_id_project" id="delete_id_project" />
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
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/js/jquery.datetimepicker.css">
<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.datetimepicker.js"></script>
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
    jQuery('#ins_col').datetimepicker({
        timepicker: false,
        format: 'd/m/Y',
        lang: 'th'
    });
    jQuery('#edit_ins_col').datetimepicker({
        timepicker: false,
        format: 'd/m/Y',
        lang: 'th'
    });
    $(document).ready(function() {
        var addForm = $("#addForm");

        var validator = addForm.validate({

            rules: {
                ins_num: {
                    required: true
                },
                ins_col: {
                    required: true
                },
            },
            messages: {
                ins_num: {
                    required: "This field is required"
                },
                ins_col: {
                    required: "This field is required"
                },
            }
        });
        var editForm = $("#editForm");

        var validator = editForm.validate({

            rules: {
                edit_ins_num: {
                    required: true
                },
                edit_ins_col: {
                    required: true
                },
            },
            messages: {
                edit_ins_num: {
                    required: "This field is required"
                },
                edit_ins_col: {
                    required: "This field is required"
                },
            }
        });
        <?php if($role == ROLE_SUPERADMIN || $role == ROLE_ADMIN || $role == ROLE_PROJECT_MANAGER || $role == ROLE_EMPLOYEE_DEV || $role == ROLE_EMPLOYEE_TESTER){?>
    $('#userlist').DataTable({
        dom: 'Bfrtip',
        buttons: {
            buttons: [{
                className: 'btn-primary',
                text: 'เพิ่ม',
                action: function() {
                    $("#addModal").modal("toggle")
                    // window.location.href = 'addNewCategory';
                }
            }],
            dom: {
                button: {
                    className: 'btn'
                }
            },
        },
        pageLength: 25
    });
    <?php }else{ ?>
        $('#userlist').DataTable({pageLength: 25});
    <?php } ?>
});

    function editFunc(id) {
        $('#edit_id').val("");
        $('#edit_ins_num').val("");
        $('#edit_ins_col').val("");
        $.ajax({
            url: "<?= base_url('getInsById')?>",
            type: "post",
            data: {
                id: id
            }, // /converting the form data into array and sending it to server
            dataType: 'json',
            success: function(response) {
                 console.log(response);
                $('#edit_id').val(response.id);
                $('#edit_ins_num').val(response.ins_num);
                $('#edit_ins_col').val(response.ins_col);
                $('#edit_payment_status').val(response.payment_status);
            }
        });
    }

    function removeFunc(id) {
        if (id) {
            $('#delete_id').val(id);
        }
    }
</script>
<?php
unset($_SESSION['success']);
unset($_SESSION['error']);
?>