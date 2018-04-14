import $ from "jquery";
import "bootstrap";


$('body').on('submit', 'form[action*="delete"]', function (e) {
    return confirm('Вы уверены?');
});
