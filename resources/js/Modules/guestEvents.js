import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';
import interactionPlugin from '@fullcalendar/interaction';
import momentPlugin from '@fullcalendar/moment'
import esLocale from '@fullcalendar/core/locales/es';
import axios from 'axios';

export default class GuestEvents {
    constructor() {
        this.availabilityBtn = document.querySelector('#check-availability-btn');

        this.events();
    }

    events() {
        if (this.availabilityBtn) {
            this.checkAvailability();
        }
    }

    checkAvailability() {
        // Attach event listener to the event trigger (e.g. button click)
        this.availabilityBtn.addEventListener('click', function (e) {
            e.preventDefault();

            // Get the doctor ID from the input field
            let doctorId = document.getElementById('doctor_id').value;

            // Define the data to be sent
            const data = {
                doctorId,
            };

            // Send the request using Axios
            axios.post('/events/check-guest-events', data)
                .then(response => {
                    let allDoctorsEvents = response.data;
                    renderCalendar(allDoctorsEvents);
                })
                .catch(error => {
                    console.log(error);
                });

            // Get available dates
            axios.get('/events/check-guest-events')
                .then(response => {
                    let availableDoctorsEvents = response.data;
                    renderCalendar(availableDoctorsEvents);
                })
                .catch(error => {
                    console.log(error);
                });
        });


        function renderCalendar(availableDoctorsEvents) {
            let calendarEl = document.getElementById('guest-calendar');
            let startDateInput = document.querySelector('#start_date');
            let endDateInput = document.querySelector('#end_date');
            startDateInput.setAttribute('type', 'disabled');
            let form = document.querySelector('#guest-form');
            let events = availableDoctorsEvents.map(event => {
                return {
                    title: 'Disponible',
                    start: event.start_date,
                    end: event.end_date
                }
            })

            // Render the calendar and functions
            const calendar = new Calendar(calendarEl, {
                headerToolbar: { center: 'dayGridMonth,timeGridWeek' }, // buttons for switching between views
                plugins: [momentPlugin, dayGridPlugin, timeGridPlugin, listPlugin, interactionPlugin],
                initialView: 'dayGridMonth',
                weekends: false,
                locale: esLocale,
                displayEventTime: true,
                selectable: true,
                titleFormat: 'MMMM D, YYYY',
                selectOverlap: function (event) {
                    return event.rendering === 'background';
                },
                eventClick: function (info) {
                    alert('Event: ' + info.event.title + 'Start: ' + info.event.start + 'End: ' + info.event.end);
                    console.log(info.event.start);
                    startDateInput.value = info.event.startStr;
                    endDateInput.value = info.event.endStr;
                    // Scroll to form
                    form.scrollIntoView({ behavior: "smooth", block: "start", inline: "nearest" });
                },
                select: function (info) {
                    // Alert selected dates on calendar
                    alert('selected ' + info.start + ' to ' + info.endStr);
                    // Format date values
                    startDateInput.value = info.startStr.slice(0, -6);
                    endDateInput.value = info.endStr.slice(0, -6);
                    // Scroll to form
                    form.scrollIntoView({ behavior: "smooth", block: "start", inline: "nearest" });
                },
                editable: true,
                events // request to load current events
            });

            calendar.render();
        }
    }


}