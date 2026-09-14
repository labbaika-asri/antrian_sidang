<div id="content" class="main-content">

    <div class="layout-px-spacing">
        <div class="page-header">

            <div class="title">
                <?php
                $hakim=array(10,20);
                $pp=array(30,410,420,430,440,450,460,470,500,1000,1010,1020,1030);
                $array_admin=array(1,411,412,413,414,421,422,423,431,441,442,443,444,451,452,453,454,461,462,463,471,472,473,1001,1002,1003,1011,1012,1013,1031,1032,1033,1034);
                if (in_array($this->session->userdata('kewenangan'),$array_admin)) {
                    ?>
                    <h4 class="page-title">Kalender Sidang Semua Ketua Majelis</h4>
                    <?php
                } else if (in_array($this->session->userdata('kewenangan'),$hakim)) {
                    ?>
                    <h4 class="page-title">Kalender Sidang Ketuas
                        Majelis <?php echo $this->session->userdata('nama'); ?></h4>
                    <?php
                } else if ( in_array($this->session->userdata('kewenangan'),$pp) ) {
                    ?>

                    <h4 class="page-title">Kalender Sidang <?php echo $this->session->userdata('jabatan'); ?>
                        <?php echo $this->session->userdata('nama'); ?></h4>
                    <?php
                } else {

                    redirect(base_url());
                }
                ?>
            </div>
            <div class="alert alert-secondary bg-secondary text-white border-0" role="alert">
                <?php echo $totalsidang; ?>
            </div>

        </div>

        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="statbox widget box box-shadow">
                    <div class="widget-content widget-content-area">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>

            <!-- The Modal -->
            <div id="addEventsModal" class="modal animated fadeIn">

                <div class="modal-dialog modal-dialog-centered">

                    <!-- Modal content -->
                    <div class="modal-content">

                        <div class="modal-body">

                            <span class="close">&times;</span>

                            <div class="add-edit-event-box">
                                <div class="add-edit-event-content">
                                    <h5 class="add-event-title modal-title">Add Events</h5>
                                    <h5 class="edit-event-title modal-title">Edit Events</h5>

                                    <form class="">

                                        <div class="row">

                                            <div class="col-md-12">
                                                <label for="start-date" class="">Event Title:</label>
                                                <div class="d-flex event-title">
                                                    <input id="write-e" type="text" placeholder="Enter Title" class="form-control" name="task">
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-12">
                                                <div class="form-group start-date">
                                                    <label for="start-date" class="">From:</label>
                                                    <div class="d-flex">
                                                        <input id="start-date" placeholder="Start Date" class="form-control" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-12">
                                                <div class="form-group end-date">
                                                    <label for="end-date" class="">To:</label>
                                                    <div class="d-flex">
                                                        <input id="end-date" placeholder="End Date" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="start-date" class="">Event Description:</label>
                                                <div class="d-flex event-description">
                                                    <textarea id="taskdescription" placeholder="Enter Description" rows="3" class="form-control" name="taskdescription"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="event-badge">
                                                    <p class="">Badge:</p>

                                                    <div class="d-sm-flex d-block">
                                                        <div class="n-chk">
                                                            <label class="new-control new-radio radio-primary">
                                                                <input type="radio" class="new-control-input" name="marker" value="bg-primary">
                                                                <span class="new-control-indicator"></span>Work
                                                            </label>
                                                        </div>

                                                        <div class="n-chk">
                                                            <label class="new-control new-radio radio-warning">
                                                                <input type="radio" class="new-control-input" name="marker" value="bg-warning">
                                                                <span class="new-control-indicator"></span>Travel
                                                            </label>
                                                        </div>

                                                        <div class="n-chk">
                                                            <label class="new-control new-radio radio-success">
                                                                <input type="radio" class="new-control-input" name="marker" value="bg-success">
                                                                <span class="new-control-indicator"></span>Personal
                                                            </label>
                                                        </div>

                                                        <div class="n-chk">
                                                            <label class="new-control new-radio radio-danger">
                                                                <input type="radio" class="new-control-input" name="marker" value="bg-danger">
                                                                <span class="new-control-indicator"></span>Important
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button id="discard" class="btn" data-dismiss="modal">Discard</button>
                            <button id="add-e" class="btn">Add Task</button>
                            <button id="edit-event" class="btn">Save</button>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
    <div class="footer-wrapper">
        <div class="footer-section f-section-1">

        </div>
        <div class="footer-section f-section-2">

        </div>
    </div>
</div>