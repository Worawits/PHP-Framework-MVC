<?php if ($role == ROLE_SUPERADMIN || $role == ROLE_ADMIN || $role == ROLE_PROJECT_MANAGER || $role == ROLE_EMPLOYEE_DEV || $role == ROLE_EMPLOYEE_TESTER) { ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <i class="fa fa-tachometer" aria-hidden="true"></i> สรุปโปรเจค
                <small>Control panel</small>
            </h1>
        </section>
        <?php



        ?>
        <section class="content">

            <div class="row">

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-gray">
                        <div class="inner">
                            <h3><?= $countpending ?></h3>
                            <p>รอดำเนินการ</p>
                        </div>
                        <!-- <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div> -->

                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-blue">
                        <div class="inner">
                            <h3><?= $countworking ?></h3>
                            <p>ดำเนินการโปรเจค</p>
                        </div>
                        <!-- <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div> -->

                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?= $countfinish ?></h3>
                            <p>โปรเจคเสร็จสิน</p>
                        </div>
                        <!-- <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div> -->

                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-teal">
                        <div class="inner">
                            <h3><?= $countsupport ?></h3>
                            <p>Support</p>
                        </div>
                        <!-- <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div> -->

                    </div>
                </div><!-- ./col -->
            </div>
            <?php if ($role == ROLE_SUPERADMIN || $role == ROLE_ADMIN || $role == ROLE_PROJECT_MANAGER) { ?>
                <h3>
                    <i class="fa fa-bell" aria-hidden="true"></i> แจ้งเตือนงวด
                    <!-- <small>Control panel</small> -->
                </h3>
                <div class="row">
                    <?php
                    if ($alarmproject) {
                        foreach ($alarmproject as $record) { ?>

                            <a href="<?= base_url('ins_project/' . $record->id) ?>">
                                <?php
                                if ($record->alarm == 1) {
                                ?>
                                    <div class="col-lg-3 col-xs-6">
                                        <div class="small-box bg-yellow">
                                            <div class="inner">
                                                <h4><?= $record->name ?></h4>
                                                <p><?= $record->ins_col ?></p>
                                            </div>
                                        </div>
                                    </div>

                                <?php } else { ?>

                                    <div class="col-lg-3 col-xs-6">
                                        <div class="small-box bg-red">
                                            <div class="inner">
                                                <h4><?= $record->name ?></h4>
                                                <p><?= $record->ins_col ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </a>
                    <?php   }
                    } ?>
                </div>
            <?php } ?>
            <?php if ($role == ROLE_EMPLOYEE_DEV || $role == ROLE_EMPLOYEE_TESTER) { ?>
                <h3>
                    <i class="fa fa-th-large" aria-hidden="true"></i> ดำเนินการโปรเจค
                    <!-- <small>Control panel</small> -->
                </h3>
                <div class="row">
                    <?php
                    if ($working) {
                        foreach ($working as $record) {
                            if ($role == ROLE_EMPLOYEE_DEV) { ?>
                                <a href="<?= base_url('ins_project/' . $record->id) ?>">
                                    <div class="col-lg-3 col-xs-6">
                                        <!-- small box -->
                                        <div class="small-box bg-gray">
                                            <div class="inner">
                                                <h4><?= $record->name ?></h3>
                                                    <p>เหลือ Checklist (<?= $record->checklist_dev ?>) Issues (<?= $record->issues_dev ?>)</p>
                                            </div>
                                            <!-- <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div> -->

                                        </div>
                                    </div><!-- ./col -->
                                </a>
                            <?php   } else if ($role == ROLE_EMPLOYEE_TESTER) { ?>
                                <a href="<?= base_url('ins_project/' . $record->id) ?>">
                                    <div class="col-lg-3 col-xs-6">
                                        <!-- small box -->
                                        <div class="small-box bg-gray">
                                            <div class="inner">
                                                <h4><?= $record->name ?></h3>
                                                    <p>เหลือ Checklist (<?= $record->checklist_test ?>) Issues (<?= $record->issues_test ?>)</p>
                                            </div>
                                            <!-- <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div> -->

                                        </div>
                                    </div><!-- ./col -->
                                </a>
                    <?php  }
                        }
                    } ?>
                </div>
                <h3>
                    <i class="fa fa-bug" aria-hidden="true"></i> Support
                    <!-- <small>Control panel</small> -->
                </h3>
                <div class="row">
                    <?php
                    if ($support) {
                        foreach ($support as $record) {
                            if ($role == ROLE_EMPLOYEE_DEV) { ?>
                                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-gray">
                                        <div class="inner">
                                            <h4><?= $record->name ?></h3>
                                            <p>Issues (<?= $record->issues_test ?>)</p>
                                        </div>
                                        <!-- <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div> -->

                                    </div>
                                </div><!-- ./col -->
                            <?php   } else if ($role == ROLE_EMPLOYEE_TESTER) { ?>
                                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-gray">
                                        <div class="inner">
                                            <h4><?= $record->name ?></h3>
                                                <p>Issues (<?= $record->issues_test ?>)</p>
                                        </div>
                                        <!-- <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div> -->

                                    </div>
                                </div><!-- ./col -->
                    <?php  }
                        }
                    } ?>
                </div>
            <?php } ?>
        </section>


    </div>
<?php } ?>
<?php if ($role == ROLE_CUSTOMER) { ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
                <small>Control panel</small>
            </h1>
        </section>
        <?php



        ?>
        <section class="content">

            <div class="row">
                <?php
                if ($project) {
                    foreach ($project as $record) { ?>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-gray">
                                <div class="inner">
                                    <h4><?= $record->name ?></h3>
                                        <p>Checklist (<?= $record->checklist_cus ?>) Issues (<?= $record->issues_cus ?>)</p>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } ?>
            </div>
            <h3>
                <i class="fa fa-bell" aria-hidden="true"></i> แจ้งเตือนงวด
                <!-- <small>Control panel</small> -->
            </h3>
            <div class="row">
            <?php
                    if ($alarmproject) {
                        foreach ($alarmproject as $record) { ?>

                            <a href="<?= base_url('ins_project/' . $record->id) ?>">
                                <?php
                                if ($record->alarm == 1) {
                                ?>
                                    <div class="col-lg-3 col-xs-6">
                                        <div class="small-box bg-yellow">
                                            <div class="inner">
                                                <h4><?= $record->name ?></h4>
                                                <p><?= $record->ins_col ?></p>
                                            </div>
                                        </div>
                                    </div>

                                <?php } else { ?>

                                    <div class="col-lg-3 col-xs-6">
                                        <div class="small-box bg-red">
                                            <div class="inner">
                                                <h4><?= $record->name ?></h4>
                                                <p><?= $record->ins_col ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </a>
                    <?php   }
                    } ?>
                <!-- <div class="col-lg-3 col-xs-6">
              
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h4>ชื่อโปรเจค</h4>
                            <p>dd/mm/yy</p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
              
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h4>ชื่อโปรเจค</h4>
                            <p>dd/mm/yy</p>
                        </div>

                    </div>
                </div> -->

            </div>
        </section>
    </div>
<?php } ?>