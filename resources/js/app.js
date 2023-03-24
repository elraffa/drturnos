import './bootstrap';
import citasCalendar from './Modules/citasCalendar';
import useModal from './Modules/useModal';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();

const calendar = new citasCalendar();
const modal = new useModal();