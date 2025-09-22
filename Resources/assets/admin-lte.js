// ------ jquery and bootstrap basics ------

//import './_vars.scss';

// ------ Core libraries ------
import $ from 'jquery';
import 'bootstrap';
//import 'bootstrap/scss/bootstrap.scss';
import Moment from 'moment';
global.$ = global.jQuery = $;
global.moment = Moment;

// ------ Font Awesome 7 ------
/*import '@fortawesome/fontawesome-free/webfonts/fa-solid-900.woff2';
import '@fortawesome/fontawesome-free/webfonts/fa-regular-400.woff2';
import '@fortawesome/fontawesome-free/webfonts/fa-brands-400.woff2';
import '@fortawesome/fontawesome-free/scss/fontawesome.scss';
import '@fortawesome/fontawesome-free/scss/regular.scss';
import '@fortawesome/fontawesome-free/scss/solid.scss';
import '@fortawesome/fontawesome-free/scss/brands.scss';*/
import '@fortawesome/fontawesome-free';

// ------ jQuery Plugins ------
import 'jquery-ui';
import 'jquery-slimscroll';
//import 'bootstrap-select';
import 'daterangepicker';

// ------ AdminLTE framework ------
import './admin-lte.scss';
//import 'admin-lte/dist/css/AdminLTE.css';
//import 'admin-lte/dist/css/skins/_all-skins.css';
import './admin-lte-extensions.scss';

global.$.AdminLTE = {};
global.$.AdminLTE.options = {};
//import 'admin-lte/dist/js/adminlte';

// ------ Theme itself ------
import './default_avatar.png';

// ------ icheck for enhanced radio buttons and checkboxes ------
import 'icheck';
import 'icheck/skins/square/blue.css';
