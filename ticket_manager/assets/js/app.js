require('../css/variable.scss');
require('../css/app.scss');

var $ = require('jquery');
require('bootstrap-sass');

$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});
