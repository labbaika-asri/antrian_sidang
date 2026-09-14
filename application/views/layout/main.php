
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>APLIKASI JURNAL DAN ANTRIAN SIDANG</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/structure.css" rel="stylesheet" type="text/css" class="structure" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL STYLE -->
    <link href="assets/plugins/flatpickr/flatpickr.css" rel="stylesheet" type="text/css">
    <link href="assets/plugins/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
    <link href="assets/css/forms/theme-checkbox-radio.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLE -->
    <style>
        .widget { margin-bottom: 10px; }
        .widget-content-area { border-radius: 6px;}
        .daterangepicker.dropdown-menu {
            z-index: 1059;
        }
    </style>
    <link href='assets/fullcalendar/main.css' rel='stylesheet' />
    <script src='assets/fullcalendar/main.js'></script>

   <script>

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale :'id',
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        initialDate: '<?php echo $tanggal_sidang; ?>',
        navLinks: true, 
        selectable: true,
        selectMirror: true,
        eventLimit: true,
        events: {
            url: '<?php echo base_url('utama/jumlah_sidang'); ?>',
            failure: function() {
                alert('Ada Error Data Json Sidang!');
            }
        },
        dayClick: function(date, jsEvent, view) {

            alert('Clicked on: ' + date.format());

            alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);

            alert('Current view: ' + view.name);

            // change the day's background color just for fun
            $(this).css('background-color', 'red');

        }
    });

    calendar.render();
});

</script>
<style>

        #calendar {
            max-width: 100;
            margin: 0 auto;
        }

    </style> 
</head>
<body class="sidebar-noneoverflow application">
    
    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg></a>

            <ul class="navbar-item flex-row search-ul">
                <li class="nav-item align-self-center search-animated">
                    <h5>APLIKASI JURNAL DAN ANTRIAN SIDANG <?php echo $satker; ?> </h5>
                </li>
            </ul>
            <ul class="navbar-item flex-row navbar-dropdown">
            
            <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="messageDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Login sebagai <b><?php echo $this->session->userdata('nama');?> (<?php echo $this->session->userdata('jabatan');?> )</b>
                    </a>
                   
            <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">

                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <b>::</b>
                    </a>
                    <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="userProfileDropdown">
                        <div class="dropdown-item">
                            <a href="<?php echo base_url('utama/logout'); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> <span>Keluar</span>
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">
            
        <?php
                include "./assets/antrian/menu.php"
                ?>
        </div>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="page-header">
                    <div class="page-title">
                        <?php
                        $hakim=array(10,20);
                        $pp=array(30,410,420,430,440,450,460,470,500,1000,1010,1020,1030);
                        $array_admin=array(1,411,412,413,414,421,422,423,431,441,442,443,444,451,452,453,454,461,462,463,471,472,473,1001,1002,1003,1011,1012,1013,1031,1032,1033,1034);
                        if (in_array($this->session->userdata('kewenangan'),$array_admin)) {
                            ?>
                            <h4 class="page-title">Kalender Sidang Semua Ketua Majelis
                            <?php echo " - ".$totalsidang; ?></h4>
                            <?php
                        } else if (in_array($this->session->userdata('kewenangan'),$hakim)) {
                            ?>
                            <h4 class="page-title">Kalender Sidang Ketua
                                Majelis <?php echo $this->session->userdata('nama'); ?>
                               <?php echo " - ".$totalsidang; ?></h4>
                            <?php
                        } else if (in_array($this->session->userdata('kewenangan'),$pp)) {
                            ?>

                            <h4 class="page-title">Kalender Sidang <?php echo $this->session->userdata('jabatan'); ?>
                                <?php echo $this->session->userdata('nama'); ?>
                                <?php echo " - ".$totalsidang; ?></h4>
                            <?php
                        } else {
                            redirect(base_url());
                        }
                        ?>

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
                   

                </div>

                </div>
        <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright©2021 <?php echo ucwords(strtolower($satker)); ?> All rights reserved.</p>
                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="assets/bootstrap/js/popper.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/plugins/fullcalendar/moment.min.js"></script>
    <script src="assets/plugins/flatpickr/flatpickr.js"></script>
</body>
</html>