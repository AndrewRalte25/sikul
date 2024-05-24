<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Calendar</title>

    <!-- Include FullCalendar CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }

        #calendar-container {
            border: 1px solid #ccc; /* Add a border around the calendar container */
            padding: 10px; /* Add padding to ensure the calendar is contained within the border */
            max-width: 600px; /* Adjust the max-width to your preference */
            width: 100%;
            margin: 0 auto;
        }

        #calendar {
            width: 100%;
        }

        .year-dropdown {
            margin-bottom: 20px; /* Move the dropdown to the top with margin-bottom */
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Calendar Container with Border and Padding -->
    <div id="calendar-container">
        <!-- Dropdown menu for selecting a student -->
        <div class="year-dropdown">
            <select id="studentSelect">
                <option value="">Select a student</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- FullCalendar -->
        <div id="calendar"></div>
    </div>

    <!-- Include FullCalendar JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>

    <script>
      $(document).ready(function() {
    var eventsCache = {}; // Cache for storing fetched events

    // Initialize FullCalendar
    var calendar = $('#calendar').fullCalendar({
        // Default view options
        defaultView: 'month',
        // Other options...

        // Event sources
        events: function(start, end, timezone, callback) {
            var studentId = $('#studentSelect').val();

            if (studentId && eventsCache[studentId]) {
                // Use cached events if available
                callback(eventsCache[studentId]);
            } else {
                // Fetch events from the server
                $.ajax({
                    url: '/attendance',
                    method: 'GET',
                    data: { student_id: studentId },
                    success: function(data) {
                        // Cache events
                        eventsCache[studentId] = data;
                        callback(data);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching attendance data:', error);
                    }
                });
            }
        }
    });

    // Handle change event of the student dropdown
    $('#studentSelect').on('change', function() {
        var studentId = $(this).val();

        // Remove cached events for the previous student
        eventsCache = {};

        // Refetch events for the selected student
        calendar.fullCalendar('refetchEvents');
    });
});
    </script>
</body>
</html>
