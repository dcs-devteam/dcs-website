$(document).ready(function() {
  if ($('body').hasClass('developers')) {
    forms.initialize();
    metas.initialize();
    developers.initialize();
    polls.initialize();
    secrets.initialize();
    shortcuts.initialize();
  }
});

var forms = {
  initialize: function() {
    $('section [data-behavior="create-item"]').on('click', function() {
      $(this).addClass('hidden').siblings('form, [data-behavior="cancel-creation"]').removeClass('hidden').find('input').first().focus();
    });
    $('section [data-behavior="cancel-creation"]').on('click', function() {
      $(this).addClass('hidden').siblings('form, [data-behavior="create-item"]').toggleClass('hidden').find('input[type="text"], input[type="password"]').val('');
    });
  }
};

var metas = {
  initialize: function() {
    $('#metas .actions').delegate('[data-behavior="edit-meta"]', 'click', function(e) {
      e.preventDefault();
      var item = $(this).closest('.item').addClass('edit');
      var value = $(this).closest('.actions').siblings('p');
      var form = $('<form action="' + DCS.BASE_URL + 'index.php/metas/update" method="POST"> \
                      <input type="text" name="value" value="' + value.text() + '" required /> \
                      <input type="hidden" name="property" value="' + item.data('property') + '" /> \
                      <input type="submit" value="Save" class="button green" /> \
                    </form>');
      value.addClass('hidden').after(form);
      form.find('input[type="text"]').focus();
      $(this).text('Cancel').attr('data-behavior', 'cancel-edit-meta');
    });
    $('#metas .actions').delegate('[data-behavior="cancel-edit-meta"]', 'click', function(e) {
      e.preventDefault();
      var item = $(this).closest('.item').removeClass('edit');
      item.find('p').removeClass('hidden').next('form').remove();
      $(this).text('Edit').attr('data-behavior', 'edit-meta');
    });
  }
};

var developers = {
  initialize: function() {
    $('#developers .actions').delegate('[data-behavior="change-password"]', 'click', function(e) {
      e.preventDefault();
      var item = $(this).closest('.item').addClass('edit');
      var form = $('<form action="' + DCS.BASE_URL + 'index.php/developers/update" method="POST"> \
                      <input type="password" name="password" required /> \
                      <input type="submit" value="Save" class="button green" /> \
                    </form>');
      $(this).closest('.actions').before(form);
      form.find('input[type="password"]').focus();
      $(this).text('Cancel').attr('data-behavior', 'cancel-change-password');
    });
    $('#developers .actions').delegate('[data-behavior="cancel-change-password"]', 'click', function(e) {
      e.preventDefault();
      var item = $(this).closest('.item').removeClass('edit');
      item.find('form').remove();
      $(this).text('Change Password').attr('data-behavior', 'change-password');
    });
  }
};

var polls = {
  initialize: function() {
    $('#polls').delegate(' .item:not(.selected)', 'click', function() {
      polls.showPollAnswers($(this));
    });
    $('#polls .answers [data-behavior="close-answers"]').on('click', function() {
      $('#main-body .left').removeClass('shrink');
      $('#main-body .right').removeClass('expand');
      $('.item.selected').removeClass('selected');
      $('#polls .answers p').remove();
    });
    $('#polls [data-behavior="delete-poll-question"]').on('click', function(e) {
      e.stopPropagation();
      var confirmation = confirm('Are you sure you want to delete this item?');
      if (!confirmation) {
        e.preventDefault();
      }
    });
  },
  showPollAnswers: function(item) {
    $('#main-body .left').addClass('shrink');
    $('#main-body .right').addClass('expand');
    $('#polls .answers .loader').removeClass('hidden');
    $('#polls .answers p, #polls .answers h4').remove();
    $('.item.selected').removeClass('selected');
    item.addClass('selected');
    var answers = $('#polls .answers');
    $.ajax({
      url: DCS.BASE_URL + 'index.php/polls/answers',
      type: 'POST',
      data: {id: item.data('id')},
      success: function(data) {
        data = JSON.parse(data);
        $('#polls .answers .loader').addClass('hidden');
        if (data.length == 0) {
          answers.append('<h4>This question has no answers yet.</h4>');
        } else {
          for (var i = 0; i < data.length; i++) {
            var answer = $('<p>' + data[i].answer + '</p>');
            answers.append(answer);
          }
        }
      }
    });
  }
};

var secrets = {
  initialize: function() {
    $('#secrets input[type="text"][name="command"]').on('change', function() {
      $('#secrets input[type="text"][name="script_path"]').val(DCS.BASE_URL + 'assets/secrets/' + $(this).val() + '/main.js');
    });
  }
};

var shortcuts = {
  initialize: function() {
    $(document).on('keydown', function(e) {
      if (e.keyCode == 72 && e.altKey) {
        location.href = DCS.BASE_URL;
      } else if (e.keyCode == 83 && e.altKey) {
        location.href = DCS.BASE_URL + 'index.php/developers/sign_out';
      }
    });
  }
};