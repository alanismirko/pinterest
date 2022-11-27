
function openDropwdown(){
    const dropdownModal = document.getElementById('dropdownModal');

    if (dropdownModal.style.display === "flex") {
        dropdownModal.style.display = "none";
      } else {
        dropdownModal.style.display = "flex";
      }
}