import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';
import interactionPlugin from '@fullcalendar/interaction';
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
        this.availabilityBtn.addEventListener('click', function(e) {
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
                console.log(response.data);
                let allDoctorsEvents = response.data;
                renderCalendar(allDoctorsEvents);
                })
                .catch(error => {
                console.log(error);
                });
            });

            function renderCalendar(allDoctorsEvents) {
                let calendarEl = document.getElementById('guest-calendar');
                let events = allDoctorsEvents.map(event => {
                    return {
                        title: 'No disponible',
                        start: event.start_date,
                        end: event.end_date
                    }
                })

                const calendar = new Calendar(calendarEl, {
                    headerToolbar: { center: 'dayGridMonth,timeGridWeek' }, // buttons for switching between views
                    plugins: [ dayGridPlugin, timeGridPlugin, listPlugin, interactionPlugin ],
                    initialView: 'dayGridWeek',
                    weekends: false,
                    locale: esLocale,
                    selectable: true,
                    displayEventTime: true,
                    selectOverlap: function(event) {
                        return event.rendering === 'background';
                      },
                    eventClick: function(info) {
                        alert('Event: ' + info.event.title + 'Start: ' + info.event.start + 'End: ' + info.event.end);
                      },
                    editable: true,
                    events // request to load current events
                });

                calendar.render();
            }
        }

    
}