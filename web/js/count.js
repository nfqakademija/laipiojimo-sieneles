let priceDisplay = $('.call-to-action__cart-total');
let priceIndex = 200;

function getPriceIndex(fixation, location, area) {
    let index = 1;
    switch (fixation) {
        case '2':
            index += 0.2;
            break;
        case '3':
            index += 0.3;
            break;
        default:
            break;
    }

    switch (location) {
        case '2':
            index += 0.5;
            break;
        case '3':
            index += 0.75;
            break;
        default:
            break;
    }

    switch (true) {
        case (area >= 10 && area < 20):
            index = (index * 0.95).toFixed(2);
            break;
        case (area >= 20 && area < 50):
            index = (index * 0.9).toFixed(2);
            break;
        case (area >= 50):
            index = (index * 0.85).toFixed(2);
            break;
        default:
            break;
    }
    return index * priceIndex;
}

$('body').click(function () {
    let price;
    let width = $('#orders_width').val();
    let height = $('#orders_height').val();
    let area = width * height;
    let fixation = $('input[name="orders[fixation]"]:checked').val();
    let location = $('input[name="orders[location]"]:checked').val();
    let certificate = $('input[name="orders[certificate]"]:checked').val();

    if ($.isNumeric(width) && $.isNumeric(height)) {
        price = area * getPriceIndex(fixation, location, area);

        if (certificate == 1) {
            price += 300;
        }

        priceDisplay.html(price + ' €');
    } else {
        priceDisplay.html('Milijonas pinigų');
    }
});
