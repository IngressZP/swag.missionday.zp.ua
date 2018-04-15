import $ from "jquery";
import "bootstrap";


$('.product-quantity__control_minus').on('click', function (e) {
    e.preventDefault();
    let input = $('.product-quantity__input');
    let v = parseInt(input.val());
    input.val(Math.max(v - 1, 1));
    return false;
});

$('.product-quantity__control_plus').on('click', function (e) {
    e.preventDefault();
    let input = $('.product-quantity__input');
    let v = parseInt(input.val());
    input.val(v + 1);
    return false;
});
