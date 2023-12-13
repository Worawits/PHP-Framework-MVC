<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Group
            <small>Add, Edit, Delete</small>
        </h1>
    </section>
    <?php print_r($users); ?>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal"
                        data-target="#myModal">เพิ่ม</button>

                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <form role="form" action="<?php echo base_url() ?>addNewGroup" method="post" role="form">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">เพิ่มกลุ่ม</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="fname">ชื่อกลุ่ม</label>
                                                    <input type="text" class="form-control required" id="group_name"
                                                        name="group_name">
                                                </div>

                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="fname">เจ้าของกลุ่ม</label>
                                                    <select class="form-control" id="role" name="role">
                                                        <option value="0">Select User</option>
                                                        <?php
                                                        if(!empty($users))
                                                        {
                                                            foreach ($users as $rl)
                                                            {
                                                                ?>
                                                        <option value="<?php echo $rl->userid; ?>"
                                                            <?php if($rl->userid == $userid) {echo "selected=selected";} ?>>
                                                            <?php echo $rl->name ?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-default">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">กลุ่ม</h3>

                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>Id</th>
                                <th>ชื่อกลุ่ม</th>

                                <th class="text-center">Actions</th>
                            </tr>
                            <?php
                    if(!empty($userRecords))
                    {
                        foreach($userRecords as $record)
                        {
                    ?>
                            <tr>
                                <td><?php echo $record->id ?></td>
                                <td><?php echo $record->group_name ?></td>

                                <td class="text-center">
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#myModalPoint<?php echo $record->id ?>"><i
                                            class="fa fa-pencil"></i>
                                        Profit</button>
                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#myModal<?php echo $record->id ?>"><i class="fa fa-pencil"></i>
                                        Edit</button>
                                    <button type="button" onClick="ondelete('<?=$record->id?>')"
                                        class="btn btn-danger">Delete</button>
                                    <div id="myModalPoint<?php echo $record->id ?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <form role="form"
                                                action="<?php echo base_url() ?>profitNewGroup/<?php echo $record->id ?>"
                                                method="post" role="form">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Profit</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control required"
                                                                        id="profit" name="profit">
                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-default">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div id="myModal<?php echo $record->id ?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <form role="form"
                                                action="<?php echo base_url() ?>editNewGroup/<?php echo $record->id ?>"
                                                method="post" role="form">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">แกไขกลุ่ม</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="fname">ชื่อกลุ่ม</label>
                                                                    <input type="text" class="form-control required"
                                                                        id="group_name"
                                                                        value="<?php echo $record->group_name ?>"
                                                                        name="group_name">
                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-default">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                        </table>

                    </div><!-- /.box-body -->

                </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script>
function ondelete(id) {
    var c = confirm("Are you sure you want to delete");
    if (c) {
        window.location.href = '<?=base_url('deletegroup/')?>' + id;
    }

}
</script>