
$(function () {
    'use strict';
    var quantityCounter = $('.quantity-counter');

    // checkout quantity counter
    if (quantityCounter.length > 0) {
        quantityCounter
        .TouchSpin({
            min: $(this).data('min'),
            max: $(this).data('max')
        })
        .on('touchspin.on.startdownspin', function () {
            var $this = $(this);
            $('.bootstrap-touchspin-up').removeClass('disabled-max-min');
            if ($this.val() == 1) {
            $(this).siblings().find('.bootstrap-touchspin-down').addClass('disabled-max-min');
            }
        })
        .on('touchspin.on.startupspin', function () {
            var $this = $(this);
            $('.bootstrap-touchspin-down').removeClass('disabled-max-min');
            if ($this.val() == $this.data('max')) {
            $(this).siblings().find('.bootstrap-touchspin-up').addClass('disabled-max-min');
            }
        });
    }
});
