document.addEventListener("DOMContentLoaded", function () {
    // Sidebar Toggle
    const menuBar = document.querySelector('.bx-menu');
    const sidebar = document.getElementById('sidebar');

    if (menuBar) {
        menuBar.addEventListener('click', function () {
            sidebar.classList.toggle('hide');
        });
    }

    // Search Bar Toggle (Mobile)
    const searchButton = document.querySelector('.search-btn');
    const searchForm = document.querySelector('.form-input');

    if (searchButton) {
        searchButton.addEventListener('click', function (e) {
            if (window.innerWidth < 576) {
                e.preventDefault();
                searchForm.classList.toggle('show');
            }
        });
    }

    // Edit and Delete Buttons
    const editButtons = document.querySelectorAll('.edit');
    const deleteButtons = document.querySelectorAll('.delete');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            alert("Edit product functionality coming soon!");
        });
    });

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            if (confirm("Are you sure you want to delete this product?")) {
                alert("Product deleted!");
                // Here, you can add AJAX request to delete the product from the database
            }
        });
    });
});
