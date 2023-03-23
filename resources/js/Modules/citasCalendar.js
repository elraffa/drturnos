import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';
import interactionPlugin from '@fullcalendar/interaction';
import esLocale from '@fullcalendar/core/locales/es';



export default class citasCalendar {
    constructor () {
        this.calendarEl = document.getElementById('calendar');

        this.events();
    }

    events() {
        this.renderCalendar();
    }

    renderCalendar() {
        const calendar = new Calendar(this.calendarEl, {
            headerToolbar: { center: 'dayGridMonth,timeGridWeek' }, // buttons for switching between views
            plugins: [ dayGridPlugin, timeGridPlugin, listPlugin, interactionPlugin ],
            initialView: 'dayGridMonth',
            locale: esLocale,
            selectable: true,
            events: 
                citasEvents, 
        });
        calendar.render();
    }
 }