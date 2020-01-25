BX.ready(function () {
    let basketItems = BX.findChildren(BX("basket"));
    basketItems.forEach(function (basketItem) {
        if (basketItem.id === 'basket_total') {
            return;
        }
        BX.bind(BX('DELETE_' + basketItem.id), 'click', processBasket);
        BX.bind(BX('QUANTITY_' + basketItem.id), 'bxchange', processBasket);
        BX.bind(BX('QUANTITY_' + basketItem.id), 'focus', processBasket);
        BX.bind(BX('MINUS_' + basketItem.id), 'click', processBasket);
        BX.bind(BX('PLUS_' + basketItem.id), 'click', processBasket);
    });
});

function processBasket() {
    let postData = {
        'sessid': BX.bitrix_sessid(),
        'site_id': BX.message('SITE_ID'),
        'basketAction': 'recalculateAjax'
    };
    if (this.id.indexOf('QUANTITY_') >= 0) {
        postData['basket[' + this.id + ']'] = this.value;
    } else if (this.id.indexOf('DELETE_') >= 0) {
        postData['basket[' + this.id + ']'] = 'Y';
    } else if (this.id.indexOf('MINUS_') >= 0) {
        let id = this.id.substr(6);
        let input = BX('QUANTITY_' + id);
        if (input.value > 1) {
            BX.adjust(input, {property: {value: input.value--}});
        }
        postData['basket[QUANTITY_' + id + ']'] = input.value;
    } else if (this.id.indexOf('PLUS_') >= 0) {
        let id = this.id.substr(5);
        let input = BX('QUANTITY_' + id);
        BX.adjust(input, {property: {value: input.value++}});
        postData['basket[QUANTITY_' + id + ']'] = input.value;
    }
    BX.ajax({
        url: '/bitrix/components/bitrix/sale.basket.basket/ajax.php',
        method: 'POST',
        data: postData,
        dataType: 'json',
        onsuccess: function (result) {
            result.DELETED_BASKET_ITEMS.forEach(function (deleted) {
                BX(deleted.toString()).remove();
            });
            Object.values(result.BASKET_DATA.GRID.ROWS).forEach(function (one) {
                BX.adjust(BX('SUM_FULL_PRICE_FORMATED_' + one.ID), {html: one.SUM});
                BX('QUANTITY_' + one.ID).value = one.QUANTITY;
            });
            BX.adjust(BX('allSum_FORMATED'), {html: result.BASKET_DATA.allSum_FORMATED});
        }
    });
}