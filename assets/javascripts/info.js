$(document).ready(function() {
  if ($('body').hasClass('admission')) {
    admission.initialize();
  }
});

var admission = {
  initialize: function() {
    var item = location.hash.substring(1);
    if (item.length <= 0) {
      item = "bs-computer-science";
    }
    $($(".academic_programs .program-container")[0]).children().hide();
    $("#"+item).show();
    $('.expandable-menu li a').on('click', function(e) {
      $($(".academic_programs .program-container")[0]).children().hide();
      $("#"+$(this).data('item')).show();
    });
  }  
};