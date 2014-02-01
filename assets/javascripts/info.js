$(document).ready(function() {
  tabs.initialize();
});

var tabs = {
  initialize: function() {
    if ($('#button-ms').hasClass('active')) {
      $('#ms').show();
    } else if ($('#button-cte').hasClass('active')) {
      $('#cte').show();
    } else {
      $('#bs').show();
    }
    $('#button-ms').click(function() {
      $('#ms').show();
      $('#button-ms').addClass('active');
      $('#bs, #cte').hide();
      $('#button-bs, #button-cte').removeClass('active');      
    });
    $('#button-bs').click(function() {
      $('#ms, #cte').hide();
      $('#bs').show();
      $('#button-bs').addClass('active');      
      $('#button-cte, #button-ms').removeClass('active');
    });
    $('#button-cte').click(function() {
      $('#ms, #bs').hide();        
      $('#button-bs, #button-ms').removeClass('active');
      $('#cte').show();
      $('#button-cte').addClass('active');
    });
  }
};