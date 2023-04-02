'use strict';

const popup = document.querySelector('.popup');
const confirm_btn = document.querySelector('.confirm-btn');

function confirm_delete(delete_link) {
    confirm_btn.href = delete_link;
    popup.style.display = 'block';
}
function popup_close() {
    popup.style.display = 'none';
}