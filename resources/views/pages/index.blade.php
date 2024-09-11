@extends('components.body')

@section('title', 'Scheduling System with Automated Conflict Resolver')

@section('body')
    <div class="title">
        <h1 class="font-normal text-2xl ml-4 mt-2">S.Y 2024-2025 Calendar of Activities</h1>
    </div>
    {{-- Search input box--}}
    <div class="row">
        <div class="w-fit">
            <div class="input-control ml-4 mr-4 flex items-center justify-end gap-2">
                <input type="text" name="eventSearch" id="search" placeholder="Search event.." class="p-2 border-2 rounded-md">
                <button id="search-button" class="btn btn-primary">Search</button>

                {{-- For large screens button --}}
                <div class="hidden md:block" role="group" aria-label="Calendar Print Action">
                    <button id="print-button" class="btn btn-success">Export as Excel File</button>
                </div>
                {{-- For mobile button --}}
                <div class="block md:hidden" role="group" aria-label="Calendar Print Action">
                    <button id="print-button" class="btn btn-success">Export</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="calendar-events" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-[#800000] text-neutral-100">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Calendar Activities</h1>
                </div>
                <div class="modal-body w-full">
                    {{-- Event title input --}}
                    <input type="text" name="eventTitle" id="event-title" placeholder="Event Title:" class="form-control p-2 w-full">
                    <span class="bg-red-600" id="titleError"></span>
                    <div class="grid grid-cols-2 gap-2 mt-3">
                        {{-- Start date input --}}
                        <div class="containers">
                            <label for="start-date" class="font-medium">Start Date:</label>
                            <input type="date" name="startDate" id="start-date" class="form-control">
                        </div>

                        {{-- End date input --}}
                        <div class="containers">
                            <label for="end-date" class="font-medium">End Date:</label></label>
                            <input type="date" name="endDate" id="end-date" class="form-control">
                        </div>
                    </div>

                    {{-- Buttons --}}
                    <div class="flex justify-end gap-2 col-span-2 mt-3">
                        <button type="button" class="border-[#800000] border-2 p-2 w-[120px] text-[#800000] rounded-lg" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="bg-[#800000] p-2 w-[120px] text-white rounded-lg" id="save" data-bs-dismiss="modal">Save Event</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-2 max-w-fit">
        <div class="card overflow-hidden" style="border: 1px solid #ddd; border-radius: 0.5rem; background-color: lightgray">
            <div class="card-body p-0 overflow-y-auto md:h-[450px]">
                <div class="w-full min-h-[430px] max-h-[800px] cursor-pointer" id="calendar"></div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            const searchBtn = document.getElementById('search-button');
            const printBtn = document.getElementById('print-button');
            const calendarElement = document.getElementById('calendar');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            const calendar = new FullCalendar.Calendar(calendarElement, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                initialView: 'dayGridMonth',
                timeZone: 'UTC',
                events: '/calendar/events',
                editable: true,
                selectable: true,
                aspectRatio: 2,

                // Function for the resizing of calendar based on the screen
                windowResize() {
                    calendar.updateSize();
                },

                // Function for toggling the modal when a date is clicked in the calendar
                select(start, end, all) {
                    $('#calendar-events').modal('toggle');
                },

                // Function for deleting events in the calendar
                eventContent(info) {
                    const eventTitle = info.event.title;
                    const eventElement = document.createElement('div');
                    eventElement.innerHTML = `<span style="cursor:pointer;"><i class="fas fa-trash"></i></span> ${eventTitle}`;

                    eventElement.querySelector('span').addEventListener('click', () => {
                        if (confirm('Are you sure you want to delete this event?')) {
                            const eventId = info.event.id;
                            $.ajax({
                                method: 'DELETE',
                                url: '/calendar/event/' + eventId,
                                success() {
                                    alert('Event deleted successfully!');
                                    calendar.refetchEvents();
                                },
                                error(error) {
                                    alert('Error deleting event.', error);
                                }
                            });
                        }
                    });
                    return { domNodes: [eventElement] };
                },

                // Function for dragging and dropping of calendar events
                eventDrop(info) {
                    const eventId = info.event.id;
                    const newStartDate = info.event.start;
                    const newEndDate = info.event.end || newStartDate;
                    const newStartDateUTC = newStartDate.toISOString().slice(0, 10);
                    const newEndDateUTC = newEndDate.toISOString().slice(0, 10);

                    $.ajax({
                        method: 'PUT',
                        url: `/calendar/event/${eventId}`,
                        data: { start_date: newStartDateUTC, end_date: newEndDateUTC },
                        success() {
                            alert('Event re-assigned successfully!');
                        },
                        error(error) {
                            alert('Error re-assigning event.', error);
                        }
                    });
                },

                // Function for resizing events
                eventResize(info) {
                    const eventId = info.event.id;
                    const newEndDate = info.event.end;
                    const newEndDateUTC = newEndDate.toISOString().slice(0, 10);

                    $.ajax({
                        method: 'PUT',
                        url: `/calendar/${eventId}/resize`,
                        data: { end_date: newEndDateUTC },
                        success() {
                            console.log('Event resized');
                        },
                        error(error) {
                            console.log('Error resizing current event.', error);
                        }
                    });
                }
            });

            calendar.render();

            searchBtn.addEventListener('click', () => {
                const searchEvent = document.getElementById('search').value.toLowerCase();
                displaySearchedEvents(searchEvent);
            });

            // Function for search
            const displaySearchedEvents = searchEvent => {
                const searchedEvent = encodeURIComponent(searchEvent);

                $.ajax({
                    method: 'GET',
                    url: `/calendar/search?eventTitle=${searchedEvent}`,
                    success(response) {
                        if (calendar) {
                            calendar.removeAllEvents();
                            calendar.addEventSource(response);
                        } else {
                            console.error('Calendar event not defined.');
                        }
                    },
                    error(jqXHR, status, error) {
                        console.error('Error searching events: ', status, error);
                    }
                });
            }

            printBtn.addEventListener('click', () => {
                const events = calendar.getEvents().map((event) => ({
                    title: event.title,
                    start: event.start,
                    end: event.end ? event.end.toISOString() : null,
                    color: event.backgroundColor,
                }));

                const wb = XLSX.utils.book_new();
                const ws = XLSX.utils.json_to_sheet(events);

                XLSX.utils.book_append_sheet(wb, ws, 'Events');

                const arrayBuffer = XLSX.write(wb, {
                    booktype: 'xlsx',
                    type: 'array'
                });

                const blob = new Blob([arrayBuffer], {
                    type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                });

                const downloadLink = document.createElement('a');
                downloadLink.href = URL.createObjectURL(blob);
                downloadLink.download = 'events.xlsx';
                downloadLink.click();
            });
        });
    </script>
@endsection
