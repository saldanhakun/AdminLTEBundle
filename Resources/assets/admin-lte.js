// ------ Core libraries ------

//import './_vars.scss';
import $ from 'jquery';
import 'bootstrap';
import Moment from 'moment';
global.$ = global.jQuery = $;
global.moment = Moment;

// ------ jQuery Plugins ------
import 'jquery-ui';
import 'jquery-slimscroll';
//import 'bootstrap-select';
import 'daterangepicker';

// ------ AdminLTE framework ------
import './admin-lte.scss';
import 'admin-lte/src/scss/adminlte.scss';
//import 'admin-lte/dist/css/skins/_all-skins.css';
import './admin-lte-extensions.scss';

global.$.AdminLTE = {};
global.$.AdminLTE.options = {};
import 'admin-lte/dist/js/adminlte';

// ------ Theme itself ------
import './default_avatar.png';

// ------ icheck for enhanced radio buttons and checkboxes ------
import 'icheck';
import 'icheck/skins/square/blue.css';
