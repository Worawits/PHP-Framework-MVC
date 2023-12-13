<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css" />
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    * {
        box-sizing: border-box
    }

    body {
        font-family: Verdana, sans-serif;
        margin: 0
    }

    .mySlides {
        display: none
    }

    img {
        vertical-align: middle;
    }

    /* Slideshow container */
    .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
    }

    /* Next & previous buttons */
    .previmage,
    .nextimage {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -22px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
    }

    /* Position the "next button" to the right */
    .nextimage {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .previmage:hover,
    .nextimage:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    /* Caption text */
    .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .active,
    .dot:hover {
        background-color: #717171;
    }

    /* Fading animation */
    .fade {
        animation-name: fade;
        animation-duration: 1.5s;
    }

    .middle {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
    }

    .container_image {
        position: relative;
        width: 100%;
    }

    .image {
        opacity: 1;
        display: block;
        width: 100%;
        height: 500px;
        transition: .5s ease;
        backface-visibility: hidden;
    }

    .text_image {
        background-color: #04AA6D;
        color: white;
        font-size: 16px;
        padding: 16px 32px;
    }

    .container_image:hover .image {
        opacity: 0.3;
    }

    .container_image:hover .middle {
        opacity: 1;
    }

    @keyframes fade {
        from {
            opacity: .4
        }

        to {
            opacity: 1
        }
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {

        .previmage,
        .nextimage,
        .text {
            font-size: 11px
        }
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> จัดการสมาชิก
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
                        <h3 class="box-title">รายการโปรเจค</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-hover" id="userlist">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ชื่อ</th>
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
                                            <td><?php echo $record->name ?></td>
                                            <td class="text-center">
                                                <?php if ($role == ROLE_SUPERADMIN || $role == ROLE_ADMIN || $role == ROLE_PROJECT_MANAGER || $role == ROLE_EMPLOYEE_DEV || $role == ROLE_EMPLOYEE_TESTER) { ?>
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
<!-- add project modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="addModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">เพิ่มสมาชิก</h4>
            </div>

            <form role="form" action="<?= base_url('addNewemployeeProject') ?>" method="post" id="addForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">ชื่อ</label>
                        <select class="form-select required" id="name" name="name">
                            <?php if ($name) {
                                foreach ($name as $n) { ?>
                                    <option value="<?= $n->id ?>"><?= $n->name ?></option>
                            <?php }
                            } ?>
                        </select>
                        <input type="hidden" value="<?= $id ?>" name="add_id" id="add_id" />
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
                <h4 class="modal-title">ลบ</h4>
            </div>

            <form role="form" action="deleteemployeeProject" method="post" id="removeForm">
                <div class="modal-body">
                    <p>ยืนยันการลบ ?</p>
                    <input type="hidden" value="" name="id" id="id" />
                    <input type="hidden" value="<?= $id ?>" name="delete_id" id="delete_id" />
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
    $(document).ready(function() {
        $("#name").select2({
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