
window._ = require('lodash');
import AOS from 'aos';

window.AOS = AOS;
import 'aos/dist/aos.css';

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

