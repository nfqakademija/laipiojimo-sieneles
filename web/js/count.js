let priceDisplay = $('.price');
let priceIndex = 200;

function setPriceIndex(setting) {

}

$('body').click(function (e) {
    if (e.target.tagName === 'INPUT') {

        const button = e.target;

        let price;
        const width = $('#orders_width').val();
        const height = $('#orders_height').val();
        let area = width * height;
        let fixation = $('input[name="orders[fixation]"]:checked').val();
        let location = $('input[name="orders[location]"]:checked').val();
        let purpose = $('input[name="orders[purpose]"]:checked').val();
        let certificate = $('input[name="orders[certificate]"]:checked').val();


        price = area * priceIndex;


        console.log(fixation);
        console.log(location);
        console.log(purpose);
        console.log(certificate);




        priceDisplay.html(price + ' €');
        console.log(area);
    }
});
// console.log(price);
