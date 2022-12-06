if (document.getElementById("dropdownButton")) {
    document.getElementById("dropdownButton").addEventListener("click", openDropwdown);

    function openDropwdown() {
        const dropdownModal = document.getElementById('dropdownModal');
        dropdownModal.classList.toggle("dropdownFlex");
    }
}


if (document.querySelector('#signup')) {
    document.querySelector('#signup form button').addEventListener("click", activateSignup);

    function activateSignup() {
        document.querySelector('#signup form').dataset.steps = "2"
    }
}