function goToHome() {
    window.location.href = "GiaoDien.html";
}


window.onload = function () {
    displayCart();
};

function displayCart() {
    let cartItems = document.getElementById("cart-items");
    cartItems.innerHTML = "";

    let total = 0;
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart.forEach(item => {
        let li = document.createElement("li");
        li.textContent = `${item.name} - $${item.price}`;
        cartItems.appendChild(li);
        total += item.price;
    });

    document.getElementById("total").textContent = `Tổng: $${total.toFixed(2)}`;
}

function checkout() {
   
    alert('Đã thanh toán!');
    localStorage.removeItem('cart'); 
    displayCart();
}
