function quantity_plus() {
    document.getElementById('quantity').value++;
    document.getElementById('quantity_minus_button').disabled = false;
}

function quantity_minus() {
    document.getElementById('quantity').value--;
    quantity_oninput();
}

function quantity_oninput() {
    let value = document.getElementById('quantity').value;
    if (isNaN(value)) {
        return;
    }
    value = Number(value);
    if (value <= 1) {
        if (!document.getElementById('quantity_minus_button').disabled) {
            document.getElementById('quantity_minus_button').disabled = true;
        }
    } else {
        if (document.getElementById('quantity_minus_button').disabled) {
            document.getElementById('quantity_minus_button').disabled = false
        }
    }
}

function zoomImage(key, src) {
    document.getElementById('imageid').src=src;
    for (let item of document.getElementsByClassName('gelleryimg')) {
        if (item.id === 'img'+key) {
            item.classList.add('border-primary');
        } else {
            item.classList.remove('border-primary');
        }
    }
}