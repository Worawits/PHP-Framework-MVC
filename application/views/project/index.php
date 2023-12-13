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
            <i class="fa fa-users"></i> จัดการโปรเจค
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
        <?php if ($role == ROLE_SUPERADMIN || $role == ROLE_ADMIN || $role == ROLE_PROJECT_MANAGER || $role == ROLE_EMPLOYEE_DEV || $role == ROLE_EMPLOYEE_TESTER) { ?>
            <div class="row">
                <div class="col-xs-6">
                    <div class="box">
                        <!-- <div class="box-header">
                        </div> -->
                        <div class="box-body table-responsive">
                            <select id="status_" class="form-control">
                                <option value="">ทั้งหมด</option>
                                <option value="รอดำเนินการ">รอดำเนินการ</option>
                                <option value="ดำเนินการโปรเจค">ดำเนินการโปรเจค</option>
                                <option value="โปรเจคเสร็จสิ้น">โปรเจคเสร็จสิ้น</option>
                                <option value="Support">Support</option>
                                <option value="ยกเลิก">ยกเลิก</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="box">
                        <!-- <div class="box-header">
                        </div> -->
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
                        <h3 class="box-title">รายการโปรเจค</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-hover" id="userlist">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ชื่อโปรเจค</th>
                                    <!-- <th>ประเภทโปรเจค</th> -->
                                    <th>งวด</th>
                                    <th>เริ่ม-สิ้นสุด โครงการ</th>
                                    <!-- <th>สิ้นสุดโครงการ</th> -->
                                    <th>จำนวนวัน</th>
                                    <?php if ($role == ROLE_SUPERADMIN || $role == ROLE_ADMIN || $role == ROLE_PROJECT_MANAGER || $role == ROLE_EMPLOYEE_DEV || $role == ROLE_EMPLOYEE_TESTER) { ?>
                                        <th>ลูกค้า</th>
                                        <th>checklist</th>
                                        <th>issues</th>
                                    <?php } ?>
                                    <th id="columnstatus">สถานะ</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($projectRecords)) {
                                    $i = 0;
                                    foreach ($projectRecords as $record) {
                                        $i++;
                                ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $record->name ?><br />(<?php echo $record->type ?>)</td>
                                            <!-- <td><?php echo $record->type ?></td> -->
                                            <td><?php echo $record->ins ?></td>
                                            <td>
                                                <?php
                                                echo date("d/m/Y", strtotime($record->start_date));
                                                ?>
                                                -
                                                <?php
                                                echo date("d/m/Y", strtotime($record->end_date));
                                                ?>
                                            </td>
                                            <!-- <td>
                                                <?php
                                                echo date("d/m/Y", strtotime($record->end_date));
                                                ?>
                                            </td> -->
                                            <td><?php echo $record->date_dev ?></td>
                                            <?php if ($role == ROLE_SUPERADMIN || $role == ROLE_ADMIN || $role == ROLE_PROJECT_MANAGER || $role == ROLE_EMPLOYEE_DEV || $role == ROLE_EMPLOYEE_TESTER) { ?>
                                                <td><?php echo $record->cus_name ?></td>
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
                                            <td>
                                                <?php if ($record->status == 0) { ?>
                                                    <span class="label label-default">รอดำเนินการ</span>
                                                <?php } ?>
                                                <?php if ($record->status == 1) { ?>
                                                    <span class="label label-primary">ดำเนินการโปรเจค</span>
                                                <?php } ?>
                                                <?php if ($record->status == 2) { ?>
                                                    <span class="label label-success">โปรเจคเสร็จสิ้น</span>
                                                <?php } ?>
                                                <?php if ($record->status == 3) { ?>
                                                    <span class="label label-info">Support</span>
                                                <?php } ?>
                                                <?php if ($record->status == 4) { ?>
                                                    <span class="label label-danger">ยกเลิก</span>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <a type="button" class="btn btn-default" href="<?= base_url('ins_project/' . $record->id) ?>">
                                                    <!-- <i class="fa fa-file-text-o"></i> งวด</a>  -->
                                                    <!-- <i class="fa fa-bell" style="color:yellow"></i> งวด</a>  -->
                                                    <?php if ($record->alarm == 0) { ?>
                                                        <i class="fa fa-file-text-o"></i> งวด</a>
                                            <?php } else if ($record->alarm == 1) { ?>
                                                <i class="fa fa-bell" style="color:yellow"></i> งวด
                                            <?php } else if ($record->alarm == 2) { ?>
                                                <i class="fa fa-bell" style="color:red"></i> งวด
                                            <?php } ?>
                                            </a>
                                            <?php if ($role == ROLE_SUPERADMIN || $role == ROLE_ADMIN || $role == ROLE_PROJECT_MANAGER || $role == ROLE_EMPLOYEE_DEV || $role == ROLE_EMPLOYEE_TESTER) { ?>
                                                |
                                                <button class="btn btn-sm btn-info" onclick="editFunc(<?= $record->id ?>)" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></button>
                                                |
                                                <button class="btn btn-sm btn-danger" onclick="removeFunc(<?= $record->id ?>)" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>
                                                |
                                                <?php if ($role == ROLE_SUPERADMIN || $role == ROLE_ADMIN || $role == ROLE_PROJECT_MANAGER) { ?>
                                                    <a type="button" class="btn btn-default" href="<?= base_url('employeeProject/' . $record->id) ?>"><i class="fa fa-file-text-o"></i> Dev/Tester</a>
                                                    |
                                                <?php } ?>
                                                <a type="button" class="btn btn-default" href="<?= base_url('memberProject/' . $record->id) ?>"><i class="fa fa-file-text-o"></i> ลูกค้า</a>
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
<!-- add project modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="addModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">เพิ่มโปรเจค</h4>
            </div>

            <form role="form" action="addNewProject" method="post" id="addForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">ชื่อโปรเจค</label>
                        <input type="text" class="form-control required" id="name" name="name" maxlength="128" autocomplete="off" placeholder="ชื่อโปรเจค">
                    </div>
                    <div class="form-group">
                        <label for="type">ประเภทโปรเจค</label>
                        <input type="text" class="form-control required" id="type" name="type" maxlength="100" autocomplete="off" placeholder="ประเภทโปรเจค">
                    </div>
                    <div class="form-group">
                        <label for="ins">งวด</label>
                        <input type="text" class="form-control required digits" id="ins" name="ins" maxlength="128" autocomplete="off" placeholder="งวด">
                    </div>
                    <div class="form-group">
                        <label for="start_date">เวลาเริ่มโครงการ</label>
                        <input type="text" class="form-control required" id="start_date" name="start_date" autocomplete="off" placeholder="เวลาเริ่มโครงการ">
                    </div>
                    <div class="form-group">
                        <label for="end_date">เวลาสิ้นสุดโครงการ</label>
                        <input type="text" class="form-control required" id="end_date" name="end_date" autocomplete="off" placeholder="เวลาสิ้นสุดโครงการ">
                    </div>
                    <div class="form-group">
                        <label for="cus_id">รหัสลูกค้า</label>
                        <select class="form-select required" id="cus_id" name="cus_id">
                            <option value="">เลือกลูกค้า</option>
                            <?php if ($name) {
                                foreach ($name as $n) { ?>
                                    <option value="<?= $n->id ?>"><?= $n->name ?></option>
                            <?php }
                            } ?>
                        </select>
                        <!-- <input type="text" class="form-control required" id="cus_id" name="cus_id" autocomplete="off" placeholder="รหัสลูกค้า"> -->
                    </div>
                    <div class="form-group">
                        <label for="date_dev">จำนวนวันพัฒนาประมาณการ</label>
                        <input type="text" class="form-control required digits" id="date_dev" name="date_dev" autocomplete="off" placeholder="จำนวนวันพัฒนาประมาณการ">
                    </div>
                    <div class="form-group">
                        <label for="line_token">Line Token</label>
                        <input type="text" class="form-control" id="line_token" name="line_token" autocomplete="off" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="backgroundColor">backgroundColor</label>
                        <input type="text" class="form-control" id="backgroundColor" name="backgroundColor" autocomplete="off" placeholder="default:#d2d6de">
                    </div>
                    <div class="form-group">
                        <label for="borderColor">borderColor</label>
                        <input type="text" class="form-control" id="borderColor" name="borderColor" autocomplete="off" placeholder="default:#000">
                    </div>
                    <div class="form-group">
                        <label for="textColor">textColor</label>
                        <input type="text" class="form-control" id="textColor" name="textColor" autocomplete="off" placeholder="default:#000">
                    </div>
                    <div class="form-group">
                        <label for="detail">รายละเอียด</label>
                        <textarea class="form-control" id="detail" name="detail" rows="4" cols="50"></textarea>
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
<!-- edit project modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">แก้ไขโปรเจค</h4>
            </div>

            <form role="form" action="editOldProject" method="post" id="editForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">ชื่อโปรเจค</label>
                        <input type="text" class="form-control required" id="edit_name" name="edit_name" maxlength="128" autocomplete="off" placeholder="ชื่อโปรเจค">
                    </div>
                    <div class="form-group">
                        <label for="type">ประเภทโปรเจค</label>
                        <input type="text" class="form-control required" id="edit_type" name="edit_type" maxlength="100" autocomplete="off" placeholder="ประเภทโปรเจค">
                    </div>
                    <div class="form-group">
                        <label for="ins">งวด</label>
                        <input type="text" class="form-control required digits" id="edit_ins" name="edit_ins" maxlength="128" autocomplete="off" placeholder="งวด">
                    </div>
                    <div class="form-group">
                        <label for="start_date">เวลาเริ่มโครงการ</label>
                        <input type="text" class="form-control required" id="edit_start_date" name="edit_start_date" autocomplete="off" placeholder="เวลาเริ่มโครงการ">
                    </div>
                    <div class="form-group">
                        <label for="end_date">เวลาสิ้นสุดโครงการ</label>
                        <input type="text" class="form-control required" id="edit_end_date" name="edit_end_date" autocomplete="off" placeholder="เวลาสิ้นสุดโครงการ">
                    </div>
                    <div class="form-group">
                        <label for="cus_id">รหัสลูกค้า</label>
                        <select class="form-select required" id="edit_cus_id" name="edit_cus_id">
                            <option value="">เลือกลูกค้า</option>
                            <?php if ($name) {
                                foreach ($name as $n) { ?>
                                    <option value="<?= $n->id ?>"><?= $n->name ?></option>
                            <?php }
                            } ?>
                        </select>
                        <!-- <input type="text" class="form-control required" id="edit_cus_id" name="edit_cus_id" autocomplete="off" placeholder="รหัสลูกค้า"> -->
                    </div>
                    <div class="form-group">
                        <label for="date_dev">จำนวนวันพัฒนาประมาณการ</label>
                        <input type="text" class="form-control required digits" id="edit_date_dev" name="edit_date_dev" autocomplete="off" placeholder="จำนวนวันพัฒนาประมาณการ">
                    </div>
                    <div class="form-group">
                        <label for="detail">รายละเอียดโปรเจค</label>
                        <textarea class="form-control" id="edit_detail" name="edit_detail" rows="4" cols="50"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="line_token">Line Token</label>
                        <input type="text" class="form-control" id="edit_line_token" name="edit_line_token" autocomplete="off" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="backgroundColor">backgroundColor</label>
                        <input type="text" class="form-control" id="edit_backgroundColor" name="edit_backgroundColor" autocomplete="off" placeholder="default:#d2d6de">
                    </div>
                    <div class="form-group">
                        <label for="borderColor">borderColor</label>
                        <input type="text" class="form-control" id="edit_borderColor" name="edit_borderColor" autocomplete="off" placeholder="default:#000">
                    </div>
                    <div class="form-group">
                        <label for="textColor">textColor</label>
                        <input type="text" class="form-control" id="edit_textColor" name="edit_textColor" autocomplete="off" placeholder="default:#000">
                    </div>
                    <div class="form-group">
                        <input type="hidden" value="" name="edit_id" id="edit_id" />
                        <label for="status">สถานะ</label>
                        <select class="form-control" id="edit_status" name="edit_status">
                            <option value="0">รอดำเนินการ</option>
                            <option value="1">ดำเนินการโปรเจค</option>
                            <option value="2">โปรเจคเสร็จสิ้น</option>
                            <option value="3">Support</option>
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
<!-- remove project modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">ลบโปรเจค</h4>
            </div>

            <form role="form" action="deleteProject" method="post" id="removeForm">
                <div class="modal-body">
                    <p>ยืนยันการลบ ?</p>
                    <input type="hidden" value="" name="id" id="id" />
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script type="text/javascript">
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
    jQuery('#edit_start_date').datetimepicker({
        timepicker: false,
        format: 'd/m/Y',
        lang: 'th'
    });
    jQuery('#edit_end_date').datetimepicker({
        timepicker: false,
        format: 'd/m/Y',
        lang: 'th'
    });
    $(document).ready(function() {
        $("#cus_id").select2({
            width: "100%"
        });
        $("#edit_cus_id").select2({
            width: "100%"
        });
        var addForm = $("#addForm");

        var validator = addForm.validate({

            rules: {
                name: {
                    required: true
                },
                type: {
                    required: true
                },
                start_date: {
                    required: true
                },
                end_date: {
                    required: true
                },
                ins: {
                    required: true,
                    digits: true
                },
                cus_id: {
                    required: true,
                },
                date_dev: {
                    required: true,
                },
            },
            messages: {
                name: {
                    required: "This field is required"
                },
                type: {
                    required: "This field is required"
                },
                start_date: {
                    required: "This field is required"
                },
                end_date: {
                    required: "This field is required"
                },
                ins: {
                    required: "This field is required",
                    digits: "Please enter numbers only"
                },
                cus_id: {
                    required: "This field is required"
                },
                date_dev: {
                    required: "This field is required"
                },
            }
        });
        var editForm = $("#editForm");

        var validator = editForm.validate({

            rules: {
                edit_name: {
                    required: true
                },
                edit_type: {
                    required: true
                },
                edit_start_date: {
                    required: true
                },
                edit_end_date: {
                    required: true
                },
                edit_ins: {
                    required: true,
                    digits: true
                },
                edit_cus_id: {
                    required: true
                },
                edit_date_dev: {
                    required: true
                },
            },
            messages: {
                edit_name: {
                    required: "This field is required"
                },
                edit_type: {
                    required: "This field is required"
                },
                edit_start_date: {
                    required: "This field is required"
                },
                edit_end_date: {
                    required: "This field is required"
                },
                edit_ins: {
                    required: "This field is required",
                    digits: "Please enter numbers only"
                },
                edit_cus_id: {
                    required: "This field is required"
                },
                edit_date_dev: {
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
        $('#status_').click(function() {
            $('#userlist').DataTable().columns( '#columnstatus' ).search( this.value ).draw();
        });
    });

    function editFunc(id) {
        $('#edit_id').val("");
        $('#edit_name').val("");
        $('#edit_type').val("");
        $('#edit_cus_id').val("");
        $('#edit_date_dev').val("");
        $('#edit_start_date').val("");
        $('#edit_end_date').val("");
        $('#edit_detail').val("");
        $('#edit_ins').val("");
        $('#edit_status').val("");
        $('#edit_line_token').val("");
        $('#edit_backgroundColor').val("");
        $('#edit_borderColor').val("");
        $('#edit_textColor').val("");
        $.ajax({
            url: "getProjectById",
            type: "post",
            data: {
                id: id
            }, // /converting the form data into array and sending it to server
            dataType: 'json',
            success: function(response) {
                console.log(response);
                var dstart = new Date(response.start_date),
                    day = dstart.getDate(),
                    month = dstart.getMonth() + 1,
                    year = dstart.getFullYear();
                if (day < 10) {
                    day = "0" + day;
                }
                if (month < 10) {
                    month = "0" + month;
                }
                var dstartformat = [day, month, year].join('/');
                var dend = new Date(response.end_date),
                    day = dend.getDate(),
                    month = dend.getMonth() + 1,
                    year = dend.getFullYear();
                if (day < 10) {
                    day = "0" + day;
                }
                if (month < 10) {
                    month = "0" + month;
                }
                var dendformat = [day, month, year].join('/');
                $('#edit_type').val(response.type);
                $('#edit_id').val(response.id);
                $('#edit_name').val(response.name);
                $('#edit_cus_id').val(response.cus_id).trigger('change');
                $('#edit_date_dev').val(response.date_dev);
                $('#edit_start_date').val(dstartformat);
                $('#edit_end_date').val(dendformat);
                $('#edit_ins').val(response.ins);
                $('#edit_status').val(response.status);
                $('#edit_detail').val(response.detail);
                $('#edit_line_token').val(response.line_token);
                $('#edit_backgroundColor').val(response.backgroundColor);
                $('#edit_borderColor').val(response.borderColor);
                $('#edit_textColor').val(response.textColor);
            }
        });
    }

    function removeFunc(id) {
        if (id) {
            $('#id').val(id);
        }
    }
</script>
<?php
unset($_SESSION['success']);
unset($_SESSION['error']);
?>