$(document).ready(function() {
  if ($('body').hasClass('developer')) {
    forms.initialize();
    metas.initialize();
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
      var form = $('<form action="' + BASE_URL + 'index.php/metas/update" method="POST"> \
                      <input type="text" name="value" value="' + value.text() + '" /> \
                      <input type="hidden" name="property" value="' + item.data('property') + '" /> \
                      <input type="submit" value="Save" class="button green" /> \
                    </form>');
      value.addClass('hidden').after(form);
      form.find('input[type="text"]').focus();
      $(this).text('Cancel').attr('data-behavior', 'cancel-meta-edit');
    });
    $('#metas .actions').delegate('[data-behavior="cancel-meta-edit"]', 'click', function(e) {
      e.preventDefault();
      var item = $(this).closest('.item').removeClass('edit');
      item.find('p').removeClass('hidden').next('form').remove();
      $(this).text('Edit').attr('data-behavior', 'edit-meta');
    });
  }
};