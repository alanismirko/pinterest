
document.getElementById("dropdownButton").addEventListener("click", openDropwdown);

function openDropwdown(){
    const dropdownModal = document.getElementById('dropdownModal');
    dropdownModal.classList.toggle("dropdownFlex");
}