function _all(q, e = document) { return e.querySelectorAll(q) }
function _one(q, e = document) { return e.querySelector(q) }


if (document.getElementById("dropdownButton")) {
    document.getElementById("dropdownButton").addEventListener("click", openDropwdown);

    function openDropwdown() {
        const dropdownModal = document.getElementById('dropdownModal');
        dropdownModal.classList.toggle("dropdownFlex");
    }
}


if (document.querySelector('#signup')) {
    document.querySelector('#signup form button#stepup').addEventListener("click", stepupSignup);
    document.querySelector('#signup form button#stepdown').addEventListener("click", stepdownSignup);

    function stepupSignup() {
        document.querySelector('#signup form').dataset.steps = "2"
    }

    function stepdownSignup() {
        document.querySelector('#signup form').dataset.steps = "1"
    }

}