function _all(q, e = document) { return e.querySelectorAll(q) }
function _one(q, e = document) { return e.querySelector(q) }


if (document.getElementById("dropdownButton")) {
    document.getElementById("dropdownButton").addEventListener("click", openDropwdown);

    function openDropwdown() {
        const dropdownModal = document.getElementById('dropdownModal');
        dropdownModal.classList.toggle("dropdownFlex");
    }
}


if (_one('#signup')) {
    _one('#signup form button#stepup').addEventListener("click", stepupSignup);
    _one('#signup form button#stepdown').addEventListener("click", stepdownSignup);

    function stepupSignup() {
        _one('#signup form').dataset.steps = "2"
    }

    function stepdownSignup() {
        _one('#signup form').dataset.steps = "1"
    }

}


if (_one('#nickname-input')) {
    _one('#nickname-input').addEventListener("input", printOutput);

    function printOutput() {
        _one('#nickname-output').innerText = _one('#nickname-input').value
    }
}