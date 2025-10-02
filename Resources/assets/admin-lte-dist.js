
import $ from 'jquery';
import 'bootstrap';
import Moment from 'moment';
global.$ = global.jQuery = $;
global.moment = Moment;

global.$.AdminLTE = {};
global.$.AdminLTE.options = {};
import 'admin-lte/dist/js/adminlte';

// ------ AdminLTE framework ------
import 'admin-lte/dist/css/adminlte.css';
import 'admin-lte/dist/css/adminlte.rtl.css';

// ------ Theme itself ------
import './default_avatar.png';

// ------ icheck for enhanced radio buttons and checkboxes ------
import 'icheck';
import 'icheck/skins/square/blue.css';
