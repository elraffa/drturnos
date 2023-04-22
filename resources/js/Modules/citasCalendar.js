import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';
import interactionPlugin from '@fullcalendar/interaction';
import esLocale from '@fullcalendar/core/locales/es';

export default class citasCalendar {
    constructor () {
        this.calendarEl = document.getElementById('calendar');
        this.start_date = document.getElementById('start_date');
        this.end_date = document.getElementById('end_date');

        if (this.calendarEl) {
            this.events();
        }
    }

    events() {
        this.renderCalendar();
        this.setEndDate();
    }

    renderCalendar() {
        const calendar = new Calendar(this.calendarEl, {
            headerToolbar: { center: 'dayGridMonth,timeGridWeek' }, // buttons for switching between views
            plugins: [ dayGridPlugin, timeGridPlugin, listPlugin, interactionPlugin ],
            initialView: 'dayGridMonth',
            locale: esLocale,
            selectable: true,
            displayEventTime: true,
            editable: true,
            events: citasEvents, // citasEvents is a global variable defined in the blade view
        });

        calendar.render();
    }

    setEndDate() {
        this.start_date.addEventListener('change', () => {
            this.end_date.value = this.start_date.value;
        });
    }
 }