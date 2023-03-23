import './bootstrap';
import citasCalendar from './Modules/citasCalendar';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();

const calendar = new citasCalendar();