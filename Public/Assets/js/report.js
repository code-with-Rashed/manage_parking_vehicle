'use strict';

const registration_number_box = document.getElementById("registration_number_box");
const registration_number_input = document.getElementById("registration_number_input");

const owner_name_box = document.getElementById("owner_name_box");
const owner_name_input = document.getElementById("owner_name_input");

const owner_contact_number_box = document.getElementById("owner_contact_number_box");
const owner_contact_number_input = document.getElementById("owner_contact_number_input");

function searchOption(option) {
    if (option == "registration_number") {
        resetSearchOtion();
        registration_number_box.style.display = 'block';
        registration_number_input.required = true;
    } else if (option == "owner_name") {
        resetSearchOtion();
        owner_name_box.style.display = 'block';
        owner_name_input.required = true;
    } else if (option == "owner_contact") {
        resetSearchOtion();
        owner_contact_number_box.style.display = 'block';
        owner_contact_number_input.required = true;
    } else {
        resetSearchOtion();
    }
}
function resetSearchOtion() {
    registration_number_input.required = false;
    registration_number_box.style.display = 'none';

    owner_name_input.required = false;
    owner_name_box.style.display = 'none';

    owner_contact_number_input.required = false;
    owner_contact_number_box.style.display = 'none';
}