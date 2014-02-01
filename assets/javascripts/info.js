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
      $('#bs').hide();
      $('#button-bs').removeClass('active');
      $('#cte').hide();
      $('#button-cte').removeClass('active');
    });
    $('#button-bs').click(function() {
      $('#ms').hide();
      $('#button-ms').removeClass('active');
      $('#bs').show();
      $('#button-bs').addClass('active');
      $('#cte').hide();
      $('#button-cte').removeClass('active');
    });
    $('#button-cte').click(function() {
      $('#ms').hide();
      $('#button-ms').removeClass('active');
      $('#bs').hide();
      $('#button-bs').removeClass('active');
      $('#cte').show();
      $('#button-cte').addClass('active');
    });
  }
};