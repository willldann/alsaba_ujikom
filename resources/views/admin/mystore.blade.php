<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Store - Admin</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/admin/css/my_store.css">
    <script src="/admin/js/my_store.js"></script>
</head>
<body>
    <section id="content">
        <nav>
            <i class='bx bx-menu'></i>
            <a href="#" class="nav-link">My Store</a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search product...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <a href="#" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num">5</span>
            </a>
            <a href="#" class="profile">
                <img src="img/people.png" alt="Profile">
            </a>
        </nav>
        <main>
            <div class="head-title">
                <h1>My Store</h1>
                <a href="#" class="btn-add">
                    <i class='bx bx-plus'></i>
                    <span class="text">Add Product</span>
                </a>
            </div>
            <ul class="box-info">
                <li>
                    <i class='bx bxs-box'></i>
                    <span class="text">
                        <h3>120</h3>
                        <p>Products</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-dollar-circle'></i>
                    <span class="text">
                        <h3>$15,230</h3>
                        <p>Total Revenue</p>
                    </span>
                </li>
            </ul>
            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Product List</h3>
                        <i class='bx bx-filter'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="img/product1.png" alt="Product A"> Product A</td>
                                <td>$120</td>
                                <td><span class="status available">Available</span></td>
                                <td>
                                    <button class="edit"><i class='bx bx-edit'></i></button>
                                    <button class="delete"><i class='bx bx-trash'></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="img/product2.png" alt="Product B"> Product B</td>
                                <td>$90</td>
                                <td><span class="status out-stock">Out of Stock</span></td>
                                <td>
                                    <button class="edit"><i class='bx bx-edit'></i></button>
                                    <button class="delete"><i class='bx bx-trash'></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Kembali ke Dashboard Button -->
            <div class="back-to-dashboard">
                <a href="javascript:history.back()" class="back-btn">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
                
                </a>
            </div>
        </main>
    </section>
    <script src="/admin/js/my_store.js"></script>
</body>
</html>
