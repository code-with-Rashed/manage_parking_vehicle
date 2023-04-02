'use strict';
const vehicle_number_box = document.getElementById("vehicle_number_box");
const owner_name_box = document.getElementById("owner_name_box");
const owner_phone_number_box = document.getElementById("owner_phone_number_box");

function searchOption(option) {
    if (option == "vehicle_number") {
        resetSearchOtion();
        vehicle_number_box.style.display = 'block';
    } else if (option == "owner_name") {
        resetSearchOtion();
        owner_name_box.style.display = 'block';
    } else if (option == "owner_phone_number") {
        resetSearchOtion();
        owner_phone_number_box.style.display = 'block';
    }
}
function resetSearchOtion() {
    vehicle_number_box.style.display = 'none';
    owner_name_box.style.display = 'none';
    owner_phone_number_box.style.display = 'none';
}