<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> จัดการผู้ใช้งาน
            <small>เพิ่ม</small>
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->



                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">เพิ่มผู้ใช้งาน</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->

                    <form role="form" id="addUser" action="<?php echo base_url() ?>addNewUser" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="code">รหัสสมาชิก</label>
                                        <input type="text" class="form-control required" id="code" name="code" autocomplete="off" placeholder="Code">
                                    </div>
                                </div>
                                <div class="col-md-6" id="taxid_group" style="display:none">
                                    <div class="form-group">
                                        <label for="code">taxid</label>
                                        <input type="text" class="form-control required" id="taxid" name="taxid" autocomplete="off" placeholder="taxid">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">ชื่อ</label>
                                        <input type="text" class="form-control required" id="fname" name="fname" maxlength="128" autocomplete="off" placeholder="Full Name">
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control required email" id="email" name="email" maxlength="128" autocomplete="off" placeholder="Enter email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile">เบอร์โทร</label>
                                        <input type="text" class="form-control required digits" id="mobile" name="mobile" maxlength="10" autocomplete="off" placeholder="Mobile Number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="roleId">ตำแหน่ง</label>
                                        <select id="roleId" name="roleId" class="form-control required" onchange="changepos()">
                                            <?php if ($roles) {
                                                foreach ($roles as $r) {
                                            ?>
                                                    <option value="<?= $r->roleId ?>"><?= $r->role ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control required" id="password" name="password" maxlength="10" autocomplete="off" placeholder="Password" value="123456">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpassword">Confirm Password</label>
                                        <input type="password" class="form-control required equalTo" id="cpassword" name="cpassword" maxlength="10" autocomplete="off" value="123456">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" id="address_group" style="display:none">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea id="address" class="form-control required" name="address" rows="4" cols="50"></textarea>
                                    </div>
                                </div>
                            </div>
                           
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <?php
                    $this->load->helper('form');
                    if ($this->session->flashdata('error')) {
                    ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php } elseif ($this->session->flashdata('success')) {
                    ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php } ?>

                    <div class="row">
                        <div class="col-md-12">
                            <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<script src="<?php echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script>
<script>
    function changepos(){
        var x = document.getElementById("roleId").value;
        if(x == 5){
            document.getElementById("address_group").style.display = "block";
            document.getElementById("taxid_group").style.display = "block";
        }else{
            document.getElementById("address_group").style.display = "none";
            document.getElementById("taxid_group").style.display = "none";
        }
    }
</script>
<?php
unset($_SESSION['success']);
unset($_SESSION['error']);
?>