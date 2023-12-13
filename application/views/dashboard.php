  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="../../assets/bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="../../assets/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../../assets/bower_components/select2/dist/css/select2.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-calendar"></i> Calendar
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li> -->
        <li class="active"><i class="fa fa-dashboard"></i> Calendar</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title">โปรเจค</h4>
            </div>
            <div class="box-body">
              <select class="form-select" id="project" name="project">
                <option value="">ทั้งหมด</option>
                <?php if ($project) {
                  foreach ($project as $p) { ?>
                    <option value="<?= $p->id ?>"><?= $p->name ?></option>
                <?php }
                } ?>
              </select>
              <!-- <div id="external-events">
                <div class="external-event bg-green">Lunch</div>
                <div class="external-event bg-yellow">Go home</div>
                <div class="external-event bg-aqua">Do homework</div>
                <div class="external-event bg-light-blue">Work on UI design</div>
                <div class="external-event bg-red">Sleep tight</div>
                <div class="checkbox">
                  <label for="drop-remove">
                    <input type="checkbox" id="drop-remove">
                    remove after drop
                  </label>
                </div>
              </div> -->
            </div>

          </div>
          <!-- <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title">Draggable Events</h4>
            </div>
            <div class="box-body">

              <div id="external-events">
                <div class="external-event bg-green">Lunch</div>
                <div class="external-event bg-yellow">Go home</div>
                <div class="external-event bg-aqua">Do homework</div>
                <div class="external-event bg-light-blue">Work on UI design</div>
                <div class="external-event bg-red">Sleep tight</div>
                <div class="checkbox">
                  <label for="drop-remove">
                    <input type="checkbox" id="drop-remove">
                    remove after drop
                  </label>
                </div>
              </div>
            </div>

          </div> -->

          <!-- <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Create Event</h3>
            </div>
            <div class="box-body">
              <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
               
                <ul class="fc-color-picker" id="color-chooser">
                  <li><a class="text-aqua" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-blue" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-light-blue" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-teal" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-yellow" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-orange" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-green" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-lime" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-red" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-purple" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-fuchsia" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-navy" href="#"><i class="fa fa-square"></i></a></li>
                </ul>
              </div>
             
              <div class="input-group">
                <input id="new-event" type="text" class="form-control" placeholder="Event Title">

                <div class="input-group-btn">
                  <button id="add-new-event" type="button" class="btn btn-primary btn-flat">Add</button>
                </div>
             
              </div>
            
            </div>
          </div> -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-body no-padding">
              <!-- THE CALENDAR -->
              <div id="calendar"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="../../assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <!-- <script src="../../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
  <!-- jQuery UI 1.11.4 -->
  <script src="../../assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Slimscroll -->
  <script src="../../assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="../../assets/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="../../assets/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../assets/dist/js/demo.js"></script>
  <!-- fullCalendar -->
  <script src="../../assets/bower_components/moment/moment.js"></script>
  <script src="../../assets/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
  <script src="../../assets/bower_components/select2/dist/js//select2.min.js"></script>
  <!-- Page specific script -->
  <script>
    $(function() {
      $("#project").select2({
        width: "100%"
      });
      let formatcalendar = [];

      let calendar = <?= json_encode($calender) ?>;

      function loadcalender(calendar) {
        calendar.forEach(value => {
          var dateMomentObject_start = moment(value['start_date'], ["DD/MM/YYYY", "YYYY-MM-DD"]);
          // var dateObject_start = dateMomentObject_start.toDate();
          var dateMomentObject_end = moment(value['end_date'], ["DD/MM/YYYY", "YYYY-MM-DD"]);
          // var dateObject_end = dateMomentObject_end.toDate();
          var urlscope = "";
          if (value['id']) {
            urlscope = "<?= base_url("checklist/") ?>" + value['id'];
          }
          var newcalendar = {
            _id: value['id'],
            title: value['name'] + ":" + value['topic'],
            start: dateMomentObject_start,
            end: dateMomentObject_end,
            allDay: true,
            url: urlscope,
            backgroundColor: value['backgroundColor'],
            borderColor: value['borderColor'],
            textColor: value['textColor']
          };
          formatcalendar.push(newcalendar);
        })
      }
      loadcalender(calendar)

      function reloadcalender(selectObject) {
        var value = $("#project").val();
        $.ajax({
          url: "<?= base_url("reloadcalender") ?>",
          type: 'post',
          data: {
            id: value
          },
          dataType: "JSON",
          success: function(data) {
            // console.log(data);
            $('#calendar').fullCalendar('removeEventSource', formatcalendar);
            formatcalendar = [];
            loadcalender(data)
            $('#calendar').fullCalendar('addEventSource', formatcalendar);
            $('#calendar').fullCalendar('refetchEvents');
          }
        })
      }
      $("#project").on("change", reloadcalender);

      /* initialize the external events
       -----------------------------------------------------------------*/
      function init_events(ele) {
        ele.each(function() {

          // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
          // it doesn't need to have a start or end
          var eventObject = {
            title: $.trim($(this).text()) // use the element's text as the event title
          }

          // store the Event Object in the DOM element so we can get to it later
          $(this).data('eventObject', eventObject)

          // make the event draggable using jQuery UI
          $(this).draggable({
            zIndex: 1070,
            revert: true, // will cause the event to go back to its
            revertDuration: 0 //  original position after the drag
          })

        })
      }

      init_events($('#external-events div.external-event'))

      /* initialize the calendar
       -----------------------------------------------------------------*/
      //Date for the calendar events (dummy data)
      var date = new Date()
      var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear()
      $('#calendar').fullCalendar({
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay'
        },
        buttonText: {
          today: 'today',
          month: 'month',
          week: 'week',
          day: 'day'
        },
        //Random default events
        events: formatcalendar,
        <?php
        if ($role == ROLE_SUPERADMIN || $role == ROLE_ADMIN || $role == ROLE_PROJECT_MANAGER) {
        ?>
          editable: true,
          eventDrop: function(event) {
            var id = event._id;
            var start_date = moment(event.start).format("DD/MM/YYYY");
            var end_date = moment(event.end).format("DD/MM/YYYY");
            $.ajax({
              url: "<?= base_url("editCalender") ?>",
              type: 'post',
              data: {
                id: id,
                start_date:start_date,
                end_date:end_date
              },
              dataType: "JSON",
              success: function(data) {
                console.log(data);
              }
            })
          }
        <?php
        }
        ?>
        // droppable: true, // this allows things to be dropped onto the calendar !!!
        // drop: function(date, allDay) { // this function is called when something is dropped

        //   // retrieve the dropped element's stored Event Object
        //   var originalEventObject = $(this).data('eventObject')

        //   // we need to copy it, so that multiple events don't have a reference to the same object
        //   var copiedEventObject = $.extend({}, originalEventObject)

        //   // assign it the date that was reported
        //   copiedEventObject.start = date
        //   copiedEventObject.allDay = allDay
        //   copiedEventObject.backgroundColor = $(this).css('background-color')
        //   copiedEventObject.borderColor = $(this).css('border-color')

        //   // render the event on the calendar
        //   // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        //   $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

        //   // is the "remove after drop" checkbox checked?
        //   if ($('#drop-remove').is(':checked')) {

        //     // if so, remove the element from the "Draggable Events" list
        //     $(this).remove()
        //   }

        // }
      })

      /* ADDING EVENTS */
      var currColor = '#3c8dbc' //Red by default
      //Color chooser button
      var colorChooser = $('#color-chooser-btn')
      $('#color-chooser > li > a').click(function(e) {
        e.preventDefault()
        //Save color
        currColor = $(this).css('color')
        //Add color effect to button
        $('#add-new-event').css({
          'background-color': currColor,
          'border-color': currColor
        })
      })
      $('#add-new-event').click(function(e) {
        e.preventDefault()
        //Get value and make sure it is not null
        var val = $('#new-event').val()
        if (val.length == 0) {
          return
        }

        //Create events
        var event = $('<div />')
        event.css({
          'background-color': currColor,
          'border-color': currColor,
          'color': '#fff'
        }).addClass('external-event')
        event.html(val)
        $('#external-events').prepend(event)

        //Add draggable funtionality
        init_events(event)

        //Remove event from text input
        $('#new-event').val('')
      })
    })
  </script>
  </body>

  </html>