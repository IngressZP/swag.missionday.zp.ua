import $ from "jquery";
import "bootstrap";


function filter_table(name) {
    const index_dispatch = {
        'telegram_nick': 2,
        'ingress_nick': 3,
    };
    let table = $('.orders-table');

    if (!table) return false;
    if (!name in index_dispatch) return false;

    let search = $(`[name="${name}"]`).val().toLowerCase();
    let rows = table.find('tbody').find('tr:not(:first-child)');
    let index = index_dispatch[name];

    for (let row of rows) {
        if (search) {
            let cells = $(row).find('td');
            let nick = cells.eq(index).text().toLowerCase();
            if (!nick.includes(search)) {
                row.style.display = 'none';
            } else {
                row.style.display = '';
            }
        } else {
            row.style.display = '';
        }
    }
}


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

$('body').on('input', '[name="telegram_nick"]', function (e) {
    filter_table(this.name);
});

$('body').on('input', '[name="ingress_nick"]', function (e) {
    filter_table(this.name);
});


$('body').on('change', '[name="order_status_filter"]', function (e) {
    let table = $('.orders-table');

    if (!table) return false;

    let search = $(this).val();
    let rows = table.find('tbody').find('tr:not(:first-child)');

    for (let row of rows) {
        if (search) {
            let select = $(row).find('select');
            if (select.val() !== search) {
                row.style.display = 'none';
            } else {
                row.style.display = '';
            }
        } else {
            row.style.display = '';
        }
    }
});

$('body').on('click', '.orders-table_telegram-nick', function (e) {
    e.preventDefault();
    $('[name="telegram_nick"]').val($(this).text()).trigger('input');
});

$('body').on('click', '.orders-table_ingress-nick', function (e) {
    e.preventDefault();
    $('[name="ingress_nick"]').val($(this).text()).trigger('input');
});
