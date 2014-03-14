$(document).ready(function() {
  if ($('body').hasClass('admission')) {
    admission.initialize();
  }
});

var admission = {
  initialize: function() {
    var item = location.hash.substring(1); 
    $($(".academic_programs")[0]).children().hide();
    $("#"+item).show();
    $('.expandable-menu li a').on('click', function(e) {
      $($(".academic_programs")[0]).children().hide();
      $("#"+$(this).data('item')).show();
    });
  }  
};