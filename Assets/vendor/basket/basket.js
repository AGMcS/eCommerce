// Get the basket modal element
var basketModal = document.getElementById("basket-modal");

// Get the button that opens the basket modal
var basketButton = document.getElementById("basket-button");

// Get the <span> element that closes the basket modal
var closeBasket = document.getElementById("close-basket");

// When the user clicks the basket button, open the modal
basketButton.onclick = function () {
    basketModal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
closeBasket.onclick = function () {
    basketModal.style.display = "none";
}

// When the user clicks anywhere outside of the basket modal, close it
window.onclick = function (event) {
    if (event.target == basketModal) {
        basketModal.style.display = "none";
    }
}