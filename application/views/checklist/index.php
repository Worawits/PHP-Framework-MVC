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
            <i class="fa fa-users"></i> Checklist
            <small>เพิ่ม, แก้ไข, ลบ</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('project') ?>">โปรเจค</a></li>
            <li><a href="<?= base_url('ins_project/') . $ins_id['id_project'] ?>"><?= $ins_id['name']?></a></li>
            <li><a href="<?= base_url('scope_project/') . $scope_id['id_ins'] ?>"><?= $ins_id['ins_col']?></a></li>
            <li class="active"><?= $scope_id['topic']?></li>
            <!-- <li class="active">Checklist </li> -->
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
        <?php if ($role == ROLE_SUPERADMIN || $role == ROLE_ADMIN || $role == ROLE_PROJECT_MANAGER || $role == ROLE_EMPLOYEE_DEV || $role == ROLE_EMPLOYEE_TESTER) { ?>
            <div class="row">
                <div class="col-xs-6"></div>
                <div class="col-xs-6">
                    <div class="box">
                        <div class="box-header">
                        </div>
                        <div class="box-body table-responsive">
                            <table class="table table-hover">
                                <thead>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>All</td>
                                        <td>ทั้งหมด</td>
                                        <td>D</td>
                                        <td>Developer</td>
                                        <td>T</td>
                                        <td>Tester</td>
                                        <td>C</td>
                                        <td>Customer</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Checklist</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-hover" id="userlist">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>หัวข้อ</th>
                                    <th>สถานะ</th>
                                    <th>Tester ตรวจ</th>
                                    <th>วันที่ตรวจ</th>
                                    <th>ผู้ตรวจ</th>
                                    <th>ลูกค้าตรวจ</th>
                                    <th>วันที่ลูกค้าตรวจ</th>
                                    <?php if ($role == ROLE_SUPERADMIN ||$role == ROLE_ADMIN || $role == ROLE_PROJECT_MANAGER || $role == ROLE_EMPLOYEE_DEV || $role == ROLE_EMPLOYEE_TESTER) { ?>
                                        <th>issues</th>
                                    <?php } ?>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($checklistRecords)) {
                                    $i = 0;
                                    foreach ($checklistRecords as $record) {
                                        $i++;
                                ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $record->topic ?></td>
                                            <td>
                                                <?php if ($record->status == 0) { ?>
                                                    <span class="label label-default">ยังไม่เสร็จ</span>
                                                <?php } elseif ($record->status == 1) { ?>
                                                    <span class="label label-success">เสร็จแล้ว</span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($record->status_test == 0) { ?>
                                                    <span class="label label-default">ยังไม่ตรวจ</span>
                                                <?php } elseif ($record->status_test == 1) { ?>
                                                    <span class="label label-success">ตรวจแล้ว</span>
                                                <?php } ?>
                                            </td>
                                            <td><?php echo $record->date_check ?></td>
                                            <td><?php echo $record->name ?></td>
                                            <td>
                                                <?php if ($record->cus_check == 0) { ?>
                                                    <span class="label label-default">ยังไม่ตรวจ</span>
                                                <?php } elseif ($record->cus_check == 1) { ?>
                                                    <span class="label label-success">ตรวจแล้ว</span>
                                                <?php } ?>
                                            </td>
                                            <td><?php echo $record->date_cus_check ?></td>
                                            <?php if ($role == ROLE_SUPERADMIN || $role == ROLE_ADMIN || $role == ROLE_PROJECT_MANAGER || $role == ROLE_EMPLOYEE_DEV || $role == ROLE_EMPLOYEE_TESTER) { ?>
                                                <td>
                                                    All (<?php echo $record->issues ?>)<br />
                                                    D (<?php echo $record->issues_dev ?>)<br />
                                                    T (<?php echo $record->issues_test ?>)<br />
                                                    C (<?php echo $record->issues_cus ?>)
                                                </td>
                                            <?php } ?>
                                            <td class="text-center">
                                                <?php if ($role == ROLE_SUPERADMIN || $role == ROLE_ADMIN || $role == ROLE_PROJECT_MANAGER || $role == ROLE_EMPLOYEE_DEV || $role == ROLE_EMPLOYEE_TESTER) { ?>
                                                    <?php if ($role == ROLE_SUPERADMIN || $role == ROLE_ADMIN || $role == ROLE_PROJECT_MANAGER || $role == ROLE_EMPLOYEE_DEV) { ?>
                                                        <button class="btn btn-sm " onclick="checkFunc(<?= $record->id ?>)">เสร็จ</button>
                                                        |
                                                    <?php } ?>
                                                    <?php if ($role == ROLE_SUPERADMIN || $role == ROLE_ADMIN || $role == ROLE_PROJECT_MANAGER || $role == ROLE_EMPLOYEE_TESTER) { ?>
                                                        <button class="btn btn-sm " onclick="checktestFunc(<?= $record->id ?>)">ตรวจแล้ว</button>
                                                        |
                                                    <?php } ?>
                                                    <button class="btn btn-sm btn-info" onclick="editFunc(<?= $record->id ?>)" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></button>
                                                    |
                                                    <button class="btn btn-sm btn-danger" onclick="removeFunc(<?= $record->id ?>)" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>
                                                    |
                                                    <a type="button" class="btn btn-default" href="<?= base_url('issues/' . $record->id) ?>"><i class="fa fa-file-text-o"></i> issues</a>
                                                <?php } ?>
                                                <?php if ($role == ROLE_CUSTOMER) { ?>
                                                    <button class="btn btn-sm " onclick="checkcusFunc(<?= $record->id ?>)">ตรวจแล้ว</button>
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

            <form role="form" action="<?= base_url('addNewChecklist') ?>" method="post" id="addForm">
                <div class="modal-body">
                    <input type="hidden" value="<?= $id ?>" name="id" id="id" />
                    <div class="form-group">
                        <label for="topic">รายละเอียด</label>
                        <textarea class="form-control required" id="topic" name="topic" rows="6"></textarea>
                        <!-- <input type="text" class="form-control required" id="topic" name="topic" 
                            autocomplete="off" placeholder="หัวข้อ"> -->
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

            <form role="form" action="<?= base_url('editOldChecklist') ?>" method="post" id="editForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="topic">รายละเอียด</label>
                        <textarea class="form-control required" id="edit_topic" name="edit_topic" rows="6"></textarea>
                        <!-- <input type="text" class="form-control required" id="edit_topic" name="edit_topic"
                            autocomplete="off" placeholder="หัวข้อ"> -->
                        <input type="hidden" value="" name="edit_id" id="edit_id" />
                        <input type="hidden" value="<?= $id ?>" name="edit_scope_id" id="edit_scope_id" />
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

            <form role="form" action="<?= base_url('deleteChecklist') ?>" method="post" id="removeForm">
                <div class="modal-body">
                    <p>ยืนยันการลบ ?</p>
                    <input type="hidden" value="" name="delete_id" id="delete_id" />
                    <input type="hidden" value="<?= $id ?>" name="scope_id" id="scope_id" />
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
        var addForm = $("#addForm");

        var validator = addForm.validate({

            rules: {
                topic: {
                    required: true
                },
            },
            messages: {
                topic: {
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
            },
            messages: {
                edit_topic: {
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
        $.ajax({
            url: "<?= base_url('getChecklistById') ?>",
            type: "post",
            data: {
                id: id
            }, // /converting the form data into array and sending it to server
            dataType: 'json',
            success: function(response) {
                //  console.log(response);
                $('#edit_id').val(response.id);
                $('#edit_topic').val(response.topic);
            }
        });
    }

    function removeFunc(id) {
        if (id) {
            $('#delete_id').val(id);
        }
    }

    function checkFunc(id) {
        $.ajax({
            url: "<?= base_url('Checklistdev') ?>",
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

    function checktestFunc(id) {
        $.ajax({
            url: "<?= base_url('ChecklistEm') ?>",
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

    function checkcusFunc(id) {
        $.ajax({
            url: "<?= base_url('ChecklistCus') ?>",
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