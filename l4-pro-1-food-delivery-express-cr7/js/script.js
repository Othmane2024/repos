document.addEventListener("DOMContentLoaded", () => {
    let navbar = document.querySelector('.header .flex .navbar');
    let sidebar = document.getElementById('sidebar');
    let cartContainer = document.getElementById('cart-container');
    let totalPriceElement = document.getElementById('total-price');
    let cartBtn = document.getElementById('cartBtn');

    addCloseButtonListeners();

    // Function to update sidebar visibility based on cart status
    function updateSidebarVisibility(isCartEmpty) {
        if (isCartEmpty) {
            sidebar.classList.add('sidebar-hidden');
        } else {
            sidebar.classList.remove('sidebar-hidden');
        }
        localStorage.setItem('sidebarVisible', !isCartEmpty);
    }

    // Function to add event listeners to the close buttons
    function addCloseButtonListeners() {
        document.querySelectorAll('#close-btn').forEach(button => {
            console.log(button); 
            button.addEventListener('click', (event) => {

                event.preventDefault();

                let target = event.target;

                let formData = new FormData();
                console.log(target.attributes);
                formData.append("id", target.getAttribute('data-id'));
                formData.append("action", "remove");
                
                fetch("cart.php", {

                    method: "POST",
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    cartContainer.innerHTML = data.cartItemsHtml;
                    totalPriceElement.textContent = data.totalPrice;
                    updateSidebarVisibility(data.isCartEmpty);
                    addCloseButtonListeners(); // Add listeners after updating cart items
                })
                .catch(error => console.error("Error:", error));

                // sidebar.classList.add('sidebar-hidden');
                // localStorage.setItem('sidebarVisible', false);
            });
        });
    }

    // Check cart status on page load
    fetch("cart.php", {
        method: "POST",
        body: new FormData()
    })
    .then(response => response.json())
    .then(data => {
        updateSidebarVisibility(data.isCartEmpty);
        cartContainer.innerHTML = data.cartItemsHtml;
        totalPriceElement.textContent = data.totalPrice;
        addCloseButtonListeners(); // Add listeners after updating cart items
    })
    .catch(error => console.error("Error:", error));

    document.querySelector('#menu-btn').onclick = () => {
        navbar.classList.toggle('active');
    };

    window.onscroll = () => {
        // Optionally handle scroll events
    };

    document.querySelectorAll('.add_to_cart').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();

            let formData = new FormData();
            formData.append("id", this.getAttribute('data-id'));
            formData.append("action", "add");

            fetch("cart.php", {
                method: "POST",
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                cartContainer.innerHTML = data.cartItemsHtml;
                totalPriceElement.textContent = data.totalPrice;
                updateSidebarVisibility(data.isCartEmpty);
                addCloseButtonListeners(); // Add listeners after updating cart items
            })
            .catch(error => console.error("Error:", error));
        });
    });

    if (cartBtn && sidebar) {
        cartBtn.addEventListener('click', function() {
            sidebar.classList.toggle('sidebar-hidden');
            localStorage.setItem('sidebarVisible', !sidebar.classList.contains('sidebar-hidden'));
        });
    }

    // Check localStorage for sidebar visibility state on page load
    if (localStorage.getItem('sidebarVisible') === 'true') {
        sidebar.classList.remove('sidebar-hidden');
    } else {
        sidebar.classList.add('sidebar-hidden');
    }
});