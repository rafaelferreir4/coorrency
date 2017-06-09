(function ($) {
  Drupal.behaviors.coorrency = {
    attach: function (context, settings) {
      if (drupalSettings.coorrency.ajax) {
        $('#coorrency-block-form').on('submit', function(e) {
          var from = $(this).find('#edit-from').val().split(' - ');
          var to = $(this).find('#edit-to').val().split(' - ');

          if (from[1] == '' || to[1] == '') {
            $('#coorrency-block-form').append('<div class="error">' + Drupal.t('Please fill the form correctly.') + '</div>');

            return false;
          }

          $.ajax({
            type: 'GET',
            url: 'http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.xchange%20where%20pair%20in%20(%22' + from[1] + to[1] + '%22)&env=store://datatables.org/alltableswithkeys',
            dataType: 'xml',
            success: coorrencyXmlParser
          });

          e.preventDefault();
        });
      }

      function coorrencyXmlParser(coorrencyXml) {
        var coorrencyRate = $(coorrencyXml).find('Rate').text();

        if ($('#coorrency-block-form').find('#edit-amount').val() != '') {
          coorrencyRate = coorrencyRate * $('#coorrency-block-form').find('#edit-amount').val();
        }

        $('#coorrency-rate').html('<div class="coorrency-rate-amount">' + coorrencyRate + '</div>');
      }
    }
  };
}(jQuery));
