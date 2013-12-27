$(document).ready(function() {
  textareas.initialize();
});

var textareas = {
  initialize: function() {
    $('textarea').autosize();
  }
};