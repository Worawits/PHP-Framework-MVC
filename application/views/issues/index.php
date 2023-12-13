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
            <i class="fa fa-users"></i> Issues
            <small>เพิ่ม, แก้ไข, ลบ</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('project')?>">โปรเจค</a></li>
            <li><a href="<?= base_url('ins_project/').$ins_id['id_project']?>"><?=$ins_id['name']?></a></li>
            <li><a href="<?= base_url('scope_project/').$scope_id['id_ins']?>"><?=$ins_id['ins_col']?></a></li>
            <li><a href="<?= base_url('checklist/').$checklist_id['id_scope']?>"><?=$scope_id['topic']?></a></li>
            <li class="active"><?=$checklist_id['topic']?> </li>
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
                        <h3 class="box-title">Issues </h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-hover" id="userlist">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>หัวข้อ</th>
                                    <th>วันที่ลง</th>
                                    <th>สถานะ dev </th>
                                    <th>Tester ตรวจ</th>
                                    <th>วันที่แก้ไขเสร็จ</th>
                                    <th>สถานะลูกค้าตรวจ</th>
                                    <th>วันที่ลูกค้าตรวจ</th>
                                    <th>ความสำคัญ</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($issuesRecords)) {
                                    $i = 0;
                                    foreach ($issuesRecords as $record) {
                                        $i++;
                                ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $record->topic ?></td>
                                            <td><?php echo $record->date ?></td>
                                            <td>
                                                <?php if ($record->status_dev == 0) { ?>
                                                    <span class="label label-default">ยังไม่ทำ</span>
                                                <?php } else { ?>
                                                    <span class="label label-success">ทำแล้ว</span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($record->status_test == 0) { ?>
                                                    <span class="label label-default">ยังไม่ตรวจ</span>
                                                <?php } else { ?>
                                                    <span class="label label-success">ตรวจแล้ว</span>
                                                <?php } ?>
                                            </td>
                                            <td><?php echo $record->date_success ?></td>
                                            <td>
                                                <?php if ($record->status_cus == 0) { ?>
                                                    <span class="label label-default">ยังไม่ตรวจ</span>
                                                <?php } else if($record->status_cus == 1) { ?>
                                                    <span class="label label-success">ตรวจแล้ว</span>
                                                <?php }else{?>
                                                    <span class="label label-warning">ไม่ผ่าน</span>
                                                    <?php } ?>
                                            </td>
                                            <td><?php echo $record->date_cus ?></td>
                                            <td><?php echo $record->important ?></td>
                                            <td class="text-center">
                                                <?php if ($role == ROLE_CUSTOMER) { ?>
                                                    <button type="button" class="btn btn-default" onclick="summitcusFunc(<?= $record->id ?>)"><i class="fa fa-file-text-o"></i> ตรวจแล้ว</button>
                                                <?php } ?>
                                                <?php if ($role == ROLE_SUPERADMIN || $role == ROLE_ADMIN || $role == ROLE_PROJECT_MANAGER || $role == ROLE_EMPLOYEE_DEV || $role == ROLE_EMPLOYEE_TESTER) { ?>
                                                    <?php if ($role == ROLE_SUPERADMIN || $role == ROLE_ADMIN || $role == ROLE_PROJECT_MANAGER || $role == ROLE_EMPLOYEE_DEV ) { ?>
                                                    <button type="button" class="btn btn-default" onclick="summitdevFunc(<?= $record->id ?>)"><i class="fa fa-file-text-o"></i> ทำเสร็จแล้ว</button>
                                                    |
                                                    <?php } ?>
                                                    <?php if ($role == ROLE_SUPERADMIN || $role == ROLE_ADMIN || $role == ROLE_PROJECT_MANAGER || $role == ROLE_EMPLOYEE_TESTER ) { ?>
                                                    <button type="button" class="btn btn-default" onclick="summittestFunc(<?= $record->id ?>)"><i class="fa fa-file-text-o"></i> ตรวจแล้ว</button>
                                                    |
                                                    <?php } ?>
                                                    <button class="btn btn-sm btn-info" onclick="editFunc(<?= $record->id ?>)" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></button>
                                                    |
                                                    <button class="btn btn-sm btn-danger" onclick="removeFunc(<?= $record->id ?>)" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>
                                                <?php } ?>
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

            <form role="form" action="<?= base_url('addNewIssues') ?>" method="post" id="addForm">
                <div class="modal-body">
                    <input type="hidden" value="<?= $id ?>" name="id" id="id" />
                    <div class="form-group">
                        <label for="topic">หัวข้อ</label>
                        <input type="text" class="form-control required" id="topic" name="topic" autocomplete="off" placeholder="ชื่อ">
                    </div>
                    <!-- <div class="form-group">
                        <label for="date">วันที่ลง</label>
                        <input type="text" class="form-control required" id="date" name="date" autocomplete="off" placeholder="วันที่ลง">
                    </div> -->
                    <!-- <div class="form-group">
                        <label for="status_dev">สถานะ dev </label>
                        <input type="text" class="form-control required" id="status_dev" name="status_dev" autocomplete="off" placeholder="สถานะ dev ">
                    </div>
                    <div class="form-group">
                        <label for="status">สถานะ</label>
                        <input type="text" class="form-control required" id="status" name="status" autocomplete="off" placeholder="สถานะ">
                    </div>
                    <div class="form-group">
                        <label for="status_cus">สถานะลูกค้าตรวจ</label>
                        <input type="text" class="form-control required" id="status_cus" name="status_cus" autocomplete="off" placeholder="สถานะลูกค้าตรวจ">
                    </div> -->
                    <!-- <div class="form-group">
                        <label for="date_success">วันที่แก้ไขเสร้จ</label>
                        <input type="text" class="form-control required" id="date_success" name="date_success" autocomplete="off" placeholder="วันที่แก้ไขเสร้จ">
                    </div>
                    <div class="form-group">
                        <label for="date_cus">วันที่ลูกค้าตรวจ</label>
                        <input type="text" class="form-control required" id="date_cus" name="date_cus" autocomplete="off" placeholder="วันที่ลูกค้าตรวจ">
                    </div> -->
                    <!-- <div class="form-group">
                        <label for="important">ความสำคัญ</label>
                        <input type="text" class="form-control required" id="important" name="important" autocomplete="off" placeholder="ความสำคัญ">
                    </div> -->
                    <div class="form-group">
                        <label for="important">ความสำคัญ</label>
                        <select class="form-control required" id="important" name="important">
                            <option value="low">low</option>
                            <option value="medium">medium</option>
                            <option value="high">high</option>
                            <option value="critical">critical</option>
                        </select>

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

            <form role="form" action="<?= base_url('editOldIssues') ?>" method="post" id="editForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="topic">ชื่อ</label>
                        <input type="text" class="form-control required" id="edit_topic" name="edit_topic" autocomplete="off" placeholder="ชื่อ">
                        <input type="hidden" value="" name="edit_id" id="edit_id" />
                        <input type="hidden" value="<?= $id ?>" name="id_Issues" id="id_Issues" />
                    </div>
                    <div class="form-group">
                        <label for="date">วันที่ลง</label>
                        <input type="text" class="form-control required" id="edit_date" name="edit_date" autocomplete="off" placeholder="วันที่ลง">
                    </div>
                    <div class="form-group">
                        <label for="status_dev">สถานะ dev </label>
                        <!-- <input type="text" class="form-control required" id="edit_status_dev" name="edit_status_dev" autocomplete="off" placeholder="สถานะ dev "> -->
                        <select class="form-control required" id="edit_status_dev" name="edit_status_dev">
                            <option value="0">ยังไม่ทำ</option>
                            <option value="1">ทำแล้ว</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">สถานะ</label>
                        <!-- <input type="text" class="form-control required" id="edit_status" name="edit_status" autocomplete="off" placeholder="สถานะ"> -->
                        <select class="form-control required" id="edit_status" name="edit_status">
                            <option value="0">ยังไม่ทำ</option>
                            <option value="1">ทำแล้ว</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status_cus">สถานะลูกค้าตรวจ</label>
                        <!-- <input type="text" class="form-control required" id="edit_status_cus" name="edit_status_cus" autocomplete="off" placeholder="สถานะลูกค้าตรวจ"> -->
                        <select class="form-control required" id="edit_status_cus" name="edit_status_cus">
                            <option value="0">ยังไม่ทำ</option>
                            <option value="1">ทำแล้ว</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date_success">วันที่แก้ไขเสร้จ</label>
                        <input type="text" class="form-control required" id="edit_date_success" name="edit_date_success" autocomplete="off" placeholder="วันที่แก้ไขเสร้จ">
                    </div>
                    <div class="form-group">
                        <label for="date_cus">วันที่ลูกค้าตรวจ</label>
                        <input type="text" class="form-control required" id="edit_date_cus" name="edit_date_cus" autocomplete="off" placeholder="วันที่ลูกค้าตรวจ">
                    </div>
                    <div class="form-group">
                        <label for="important">ความสำคัญ</label>
                        <select class="form-control required" id="edit_important" name="edit_important">
                            <option value="low">low</option>
                            <option value="medium">medium</option>
                            <option value="high">high</option>
                            <option value="critical">critical</option>
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

            <form role="form" action="<?= base_url('deleteIssues') ?>" method="post" id="removeForm">
                <div class="modal-body">
                    <p>ยืนยันการลบ ?</p>
                    <input type="hidden" value="" name="delete_id" id="delete_id" />
                    <input type="hidden" value="<?= $id ?>" name="delete_id_issues" id="delete_id_issues" />
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
    jQuery('#edit_date').datetimepicker({
        timepicker: false,
        format: 'd/m/Y',
        lang: 'th'
    });
    jQuery('#edit_date_success').datetimepicker({
        timepicker: false,
        format: 'd/m/Y',
        lang: 'th'
    });
    jQuery('#edit_date_cus').datetimepicker({
        timepicker: false,
        format: 'd/m/Y',
        lang: 'th'
    });
    $(document).ready(function() {
        var addForm = $("#addForm");

        var validator = addForm.validate({

            rules: {
                topic: {
                    required: true
                },
                important: {
                    required: true
                },
            },
            messages: {
                topic: {
                    required: "This field is required"
                },
                important: {
                    required: "This field is required"
                },
            }
        });
        var editForm = $("#editForm");

        var validator = editForm.validate({

            rules: {
                edit_topic: {
                    required: true
                },
                edit_date: {
                    required: true
                },
                edit_status_dev: {
                    required: true
                },
                edit_status: {
                    required: true
                },
                edit_status_cus: {
                    required: true
                },
                edit_date_success: {
                    required: true
                },
                edit_date_cus: {
                    required: true
                },
                edit_important: {
                    required: true
                },
            },
            messages: {
                edit_topic: {
                    required: "This field is required"
                },
                edit_date: {
                    required: "This field is required"
                },
                edit_status_dev: {
                    required: "This field is required"
                },
                edit_status: {
                    required: "This field is required"
                },
                edit_status_cus: {
                    required: "This field is required"
                },
                edit_date_success: {
                    required: "This field is required"
                },
                edit_date_cus: {
                    required: "This field is required"
                },
                edit_important: {
                    required: "This field is required"
                },
            }
        });
        <?php if ($role == ROLE_SUPERADMIN || $role == ROLE_ADMIN || $role == ROLE_PROJECT_MANAGER || $role == ROLE_EMPLOYEE_DEV || $role == ROLE_EMPLOYEE_TESTER) { ?>
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
        <?php } else { ?>
            $('#userlist').DataTable({
                pageLength: 25
            });
        <?php } ?>
    });

    function editFunc(id) {
        $('#edit_id').val("");
        $('#edit_topic').val("");
        $('#edit_date').val("");
        $('#edit_status_dev').val("");
        $('#edit_status').val("");
        $('#edit_status_cus').val("");
        $('#edit_date_success').val("");
        $('#edit_date_cus').val("");
        $('#edit_important').val("");
        $.ajax({
            url: "<?= base_url('getIssuesById') ?>",
            type: "post",
            data: {
                id: id
            }, // /converting the form data into array and sending it to server
            dataType: 'json',
            success: function(response) {
                console.log(response);
                $('#edit_id').val(response.id);
                $('#edit_topic').val(response.topic);
                $('#edit_date').val(response.date);
                $('#edit_status_dev').val(response.status_dev);
                $('#edit_status').val(response.status);
                $('#edit_status_cus').val(response.status_cus);
                $('#edit_date_success').val(response.date_success);
                $('#edit_date_cus').val(response.date_cus);
                $('#edit_important').val(response.important);
            }
        });
    }

    function removeFunc(id) {
        if (id) {
            $('#delete_id').val(id);
        }
    }

    function summitdevFunc(id) {
        $.ajax({
            url: "<?= base_url('summitdevissues') ?>",
            type: "post",
            data: {
                id: id
            }, // /converting the form data into array and sending it to server
            dataType: 'json',
            success: function(response) {
                window.location.reload();
            }
        });
    }
    function summittestFunc(id) {
        $.ajax({
            url: "<?= base_url('summittestissues') ?>",
            type: "post",
            data: {
                id: id
            }, // /converting the form data into array and sending it to server
            dataType: 'json',
            success: function(response) {
                window.location.reload();
            }
        });
    }

    function summitcusFunc(id) {
        $.ajax({
            url: "<?= base_url('summitcusissues') ?>",
            type: "post",
            data: {
                id: id
            }, // /converting the form data into array and sending it to server
            dataType: 'json',
            success: function(response) {
                window.location.reload();
            }
        });
    }
</script>
<?php
unset($_SESSION['success']);
unset($_SESSION['error']);
?>