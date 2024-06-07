$(function () {

    enableDrag();
    function enableDrag() {
        $('#external-events .fc-event').each(function () {
            $(this).data('event', {
                title: $.trim($(this).text()), // use the element's text as the event title
                stick: true // maintain when user navigates (see docs on the renderEvent method)
            });
            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true,      // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });
        });
    }

    $(".save-event").on('click', function () {
        var categoryName = $('#addNewEvent form').find("input[name='category-name']").val();
        var categoryColor = $('#addNewEvent form').find("select[name='category-color']").val();
        console.log(categoryName, categoryColor);
        if (categoryName !== null && categoryName.length != 0) {
            $('#event-list').append('<div class="fc-event bg-' + categoryColor + '" data-class="bg-' + categoryColor + '">' + categoryName + '</div>');
            $('#addNewEvent form').find("input[name='category-name']").val("");
            $('#addNewEvent form').find("select[name='category-color']").val("");
            enableDrag();
        }
    });




    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();

    if (dd < 10) { dd = '0' + dd }
    if (mm < 10) { mm = '0' + mm }

    var current = yyyy + '-' + mm + '-';
    var calendar = $('#calendar');



    // Add direct event to calendar

    var newEvent = function (start) {
        $('#addDirectEvent input[name="event-name"]').val("");
        $('#addDirectEvent select[name="event-bg"]').val("");
        $('#addDirectEvent').modal('show');
        $('#addDirectEvent #addDirectEventBtn').unbind();
        $('#addDirectEvent #addDirectEventBtn').on('click', async function (e) {
            e.preventDefault();
            var title = $('#addDirectEvent input[name="event-name"]').val();
            var classes = 'bg-' + $('#addDirectEvent select[name="event-bg"]').val();
            // var started = $('#addDirectEvent input[name="cal-date"]').val();
            var started = start;
            // var end = $('#addDirectEvent input[name="end_date"]').val();
            if (title) {

                var eventData = {
                    title: title,
                    start: started,
                    className: classes,
                    // end: end
                };
                console.log(eventData);
                const url = '../backend/add_event.php';
                const headers = {
                    'Content-Type': 'application/json', // Assuming you're sending JSON data
                };

                const result = await fetch(url, {
                    method: 'POST',
                    headers: headers,
                    body: JSON.stringify(eventData) // Convert the data to JSON format
                })
                console.log(result);


                calendar.fullCalendar('renderEvent', eventData, true);
                $('#addDirectEvent').modal('hide');
            }


            else {
                alert("Title can't be blank. Please try again.")
            }
        });
    }
    var data;
    async function getDate() {
        const url = '../backend/display_event.php';
        const headers = {
            'Content-Type': 'application/json', // Assuming you're sending JSON data
        };

        try {
            const response = await fetch(url, {
                method: 'GET',
                headers: headers
            });

            if (!response.ok) {
                throw new Error('Network response was not ok');
            }

            const jsonData = await response.json(); // Parse JSON response
            console.log(jsonData); // Log the parsed JSON data
            data = jsonData;
            console.log(data[0].start.split('-')[2]); //
            // console.log(data[0].end_date.split('-')[2]);
            myCal(data);
        } catch (error) {
            console.error('There was a problem with your fetch operation:', error);
        }
    }

    getDate();


    function myCal(data) {
        let calenderObj = [];
        data.forEach((item) => {
            calenderObj.push({

                title: item.title,
                start: current + item.start.split('-')[2],
                className: item.className,


            })
        })
        console.log(calenderObj);

        calendar.fullCalendar({

            header: {
                left: 'title',
                center: '',
                right: 'month, agendaWeek, agendaDay, prev, next'
            },

            editable: true,
            droppable: true,
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            events: calenderObj,

            drop: function (date, jsEvent) {

                // var originalEventObject = $(this).data('eventObject');
                // var $categoryClass = $(this).attr('data-class');
                // var copiedEventObject = $.extend({}, originalEventObject);
                // //console.log(originalEventObject + '--' + $categoryClass + '---' + copiedEventObject);
                // copiedEventObject.start = date;
                // if ($categoryClass)
                //   copiedEventObject['className'] = [$categoryClass];
                // calendar.fullCalendar('renderEvent', copiedEventObject, true);
                // is the "remove after drop" checkbox checked?

                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove();
                }
            },

            select: function (start, end, allDay) {
                newEvent(start);
            },

            eventClick: function (calEvent, jsEvent, view) {
                //var title = prompt('Event Title:', calEvent.title, { buttons: { Ok: true, Cancel: false} });

                var eventModal = $('#eventEditModal');
                eventModal.modal('show');
                eventModal.find('input[name="event-name"]').val(calEvent.title);

                eventModal.find('.save-btn').click(function () {
                    calEvent.title = eventModal.find("input[name='event-name']").val();
                    calendar.fullCalendar('updateEvent', calEvent);
                    eventModal.modal('hide');
                });

                // if (title){
                //     calEvent.title = title;
                //     calendar.fullCalendar('updateEvent',calEvent);
                // }
            }
        });
    }

    // initialize the calendar

});