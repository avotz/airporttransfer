
window._ = require('lodash');
import AOS from 'aos';

window.AOS = AOS;
import 'aos/dist/aos.css';

try {
    //window.$ = window.jQuery = require('jquery');

} catch (e) { }


window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

