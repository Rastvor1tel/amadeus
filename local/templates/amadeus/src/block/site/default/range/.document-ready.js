var $range = $(".js-range-slider"),
    $from = $(".js-from"),
    $to = $(".js-to"),
    from,
    to;
var updateValues = function () {
    $from.prop("value", from);
    $to.prop("value", to);
};
var updateRange = function () {
    range.update({
        from: from,
        to: to
    });
};
$range.ionRangeSlider({
    step: 1,
    onChange: function (data) {
        from = data.from;
        to = data.to;        
        updateValues();
    },
    onFinish: function (data) {
        from = data.from;
        to = data.to;
        
        updateValues();
    }
});
$from.on("change", function () {
    from = +$(this).prop("value");
    if (from < min) {
        from = min;
    }
    if (from > to) {
        from = to;
    }

    updateValues();    
    updateRange();
});
$to.on("change", function () {
    to = +$(this).prop("value");
    if (to > max) {
        to = max;
    }
    if (to < from) {
        to = from;
    }

    updateValues();    
    updateRange();
});