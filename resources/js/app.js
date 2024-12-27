import './bootstrap';

import Alpine from 'alpinejs';
import dashboard from './dashboard';

window.Alpine = Alpine;

Alpine.data('dashboard', dashboard);

Alpine.start();



