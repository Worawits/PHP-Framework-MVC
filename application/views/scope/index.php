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
            <i class="fa fa-users"></i> ขอบเขต
            <small>เพิ่ม, แก้ไข, ลบ</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('project') ?>">โปรเจค</a></li>
            <li><a href="<?= base_url('ins_project/') . $ins_id['id_project'] ?>"><?= $ins_id['name']?></a></li>
            <li class="active"><?= $ins_id['ins_col']?> </li>
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
                        <h3 class="box-title">ขอบเขต</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-hover" id="userlist">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>รูป</th>
                                    <th>หัวข้อ</th>
                                    <th>วันทีเริ่ม</th>
                                    <th>วันที่สิ้นสุด</th>
                                    <?php if ($role == ROLE_SUPERADMIN || $role == ROLE_ADMIN || $role == ROLE_PROJECT_MANAGER || $role == ROLE_EMPLOYEE_DEV || $role == ROLE_EMPLOYEE_TESTER) { ?>
                                        <th>checklist</th>
                                        <th>issues</th>
                                    <?php } ?>
                                    <!-- <th>สถานะ</th> -->
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($scopeRecords)) {
                                    $i = 0;
                                    foreach ($scopeRecords as $record) {
                                        $i++;
                                ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><img src="<?php echo $record->image ?>" alt="image" width="200"></td>
                                            <td><?php echo $record->topic ?></td>
                                            <td><?php echo $record->start_date ?></td>
                                            <td><?php echo $record->end_date ?></td>
                                            <?php if ($role == ROLE_SUPERADMIN || $role == ROLE_ADMIN || $role == ROLE_PROJECT_MANAGER || $role == ROLE_EMPLOYEE_DEV || $role == ROLE_EMPLOYEE_TESTER) { ?>
                                                <td>
                                                    All (<?php echo $record->checklist ?>)<br />
                                                    D (<?php echo $record->checklist_dev ?>)<br />
                                                    T (<?php echo $record->checklist_test ?>)<br />
                                                    C (<?php echo $record->checklist_cus ?>)
                                                </td>
                                                <td>
                                                    All (<?php echo $record->issues ?>)<br />
                                                    D (<?php echo $record->issues_dev ?>)<br />
                                                    T (<?php echo $record->issues_test ?>)<br />
                                                    C (<?php echo $record->issues_cus ?>)
                                                </td>
                                            <?php } ?>
                                            <td class="text-center">
                                                <a type="button" class="btn btn-default" href="<?= base_url('checklist/' . $record->id) ?>"><i class="fa fa-file-text-o"></i> Checklist</a>
                                                <?php if ($role == ROLE_SUPERADMIN || $role == ROLE_ADMIN || $role == ROLE_PROJECT_MANAGER || $role == ROLE_EMPLOYEE_DEV || $role == ROLE_EMPLOYEE_TESTER) { ?>
                                                    |
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
<!-- add Activity modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="addModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">เพิ่ม</h4>
            </div>

            <form role="form" action="<?= base_url("addNewScope") ?>" method="post" id="addForm" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" value="<?= $id ?>" name="id" id="id" />
                    <div class="form-group">
                        <label for="topic">หัวข้อ</label>
                        <input type="text" class="form-control required" id="topic" name="topic" autocomplete="off" placeholder="หัวข้อ">
                    </div>
                    <div class="form-group">
                        <label for="start_date">วันทีเริ่ม</label>
                        <input type="text" class="form-control required" id="start_date" name="start_date" autocomplete="off" placeholder="วันทีเริ่ม">
                    </div>
                    <div class="form-group">
                        <label for="end_date">วันที่สิ้นสุด</label>
                        <input type="text" class="form-control required" id="end_date" name="end_date" autocomplete="off" placeholder="วันที่สิ้นสุด">
                    </div>
                    <div class="form-group">
                        <label for="image">รูป</label>
                        <input type="file" class="form-control" id="image" name="image">
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
<!-- edit Activity modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">แก้ไข</h4>
            </div>

            <form role="form" action="<?= base_url("editOldScope") ?>" method="post" id="editForm" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" value="" name="edit_id" id="edit_id" />
                    <input type="hidden" value="<?= $id ?>" name="edit_id_ins" id="edit_id_ins" />
                    <div class="form-group">
                        <label for="topic">หัวข้อ</label>
                        <input type="text" class="form-control required" id="edit_topic" name="edit_topic" autocomplete="off" placeholder="หัวข้อ">
                    </div>
                    <div class="form-group">
                        <label for="start_date">วันทีเริ่ม</label>
                        <input type="text" class="form-control required" id="edit_start_date" name="edit_start_date" autocomplete="off" placeholder="วันทีเริ่ม">
                    </div>
                    <div class="form-group">
                        <label for="end_date">วันที่สิ้นสุด</label>
                        <input type="text" class="form-control required" id="edit_end_date" name="edit_end_date" autocomplete="off" placeholder="วันที่สิ้นสุด">
                    </div>
                    <div class="form-group">
                        <label for="image">รูป</label>
                        <input type="file" class="form-control" id="edit_image" name="edit_image">
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
<!-- remove Activity modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">ลบ</h4>
            </div>

            <form role="form" action="<?= base_url("deleteScope") ?>" method="post" id="removeForm">
                <div class="modal-body">
                    <p>ยืนยันการลบ ?</p>
                    <input type="hidden" value="" name="delete_id" id="delete_id" />
                    <input type="hidden" value="<?= $id ?>" name="delete_id_ins" id="delete_id_ins" />
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
    jQuery('#start_date').datetimepicker({
        timepicker: false,
        format: 'd/m/Y',
        lang: 'th'
    });
    jQuery('#end_date').datetimepicker({
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
                start_date: {
                    required: true
                },
                end_date: {
                    required: true
                },
            },
            messages: {
                topic: {
                    required: "This field is required"
                },
                start_date: {
                    required: "This field is required"
                },
                end_date: {
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
                edit_start_date: {
                    required: true
                },
                edit_end_date: {
                    required: true
                },
            },
            messages: {
                edit_topic: {
                    required: "This field is required"
                },
                edit_start_date: {
                    required: "This field is required"
                },
                edit_end_date: {
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
        $('#edit_topic').val("");
        $('#edit_id').val("");
        $('#edit_start_date').val("");
        $('#edit_end_date').val("");
        $.ajax({
            url: "<?= base_url('getScopeById'); ?>",
            type: "post",
            data: {
                id: id
            }, // /converting the form data into array and sending it to server
            dataType: 'json',
            success: function(response) {
                //  console.log(response);
                $('#edit_topic').val(response.topic);
                $('#edit_id').val(response.id);
                $('#edit_start_date').val(response.start_date);
                $('#edit_end_date').val(response.end_date);
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