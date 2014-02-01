$(document).ready(function() {
  tabs.initialize();
});

var tabs = {
  initialize: function() {    
    var program = $('#program').val();
    $("#"+program).show();    
    $("[data-item='"+program+"']").parent().parent().show().parent().addClass('expanded');
    $("[data-item = '"+program+"']").addClass('current');
    $("[data-item='ap-bachelor-of-science']").click(function(e) {
      e.preventDefault();
      $("[data-item='ap-bachelor-of-science']").addClass('current');
      $("[data-item='ap-master-of-science'], [data-item='ap-continuing-education-program']").removeClass('current');
      $('#ap-bachelor-of-science').show();
      $('#ap-master-of-science, #ap-continuing-education-program').hide();
    });
    $("[data-item='ap-master-of-science']").click(function(e) {
      e.preventDefault();
      $("[data-item='ap-master-of-science']").addClass('current');
      $("[data-item='ap-bachelor-of-science'], [data-item='ap-continuing-education-program']").removeClass('current');
      $('#ap-master-of-science').show();
      $('#ap-bachelor-of-science, #ap-continuing-education-program').hide();
    });
    $("[data-item='ap-continuing-education-program']").click(function(e) {
      e.preventDefault();
      $("[data-item='ap-continuing-education-program']").addClass('current');
      $("[data-item='ap-bachelor-of-science'], [data-item='ap-master-of-science']").removeClass('current');
      $('#ap-continuing-education-program').show();
      $('#ap-bachelor-of-science, #ap-master-of-science').hide();
    });
  }
};