import $ from "jquery";
import "bootstrap";


$('body').on('submit', 'form[action*="delete"]', function (e) {
    return confirm('Вы уверены?');
});

$('body').on('change', '[name="order_status"]', function (e) {
    let orderId = $(this).data('order-id');
    let statusId = $(this).val();
    let token = $('meta[name="token"]').attr('content');
    $.post({
        url: `/admin/order/${orderId}/status`,
        dataType: 'json',
        data: {
            '_token': token,
            'order_status': statusId
        }
    }).done((response) => {
        console.log(response.status);
    });
});
