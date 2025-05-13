<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Store - Admin</title>
    <link rel="stylesheet" href="{{ asset('admin/css/my_store.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
    <section id="content">
        {{-- @include('layouts.sidebar') --}}
        <nav>
            <i class='bx bx-menu'></i>
        </nav>

        <main id="main-content">
            <div class="head-title">
                <h1>My Store</h1>
                <a href="{{ route('add_produk') }}" class="btn-add">
                    <i class='bx bx-plus'></i>
                    <span class="text">Add Product</span>
                </a>
            </div>
            <ul class="box-info">
                <li>
                    <i class='bx bxs-box'></i>
                    <span class="text">
                        <h3>{{ $products->count() }}</h3>
                        <p>Products</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-dollar-circle'></i>
                    <span class="text">
                        <h3>Rp{{ number_format($products->sum('price'), 0, ',', '.') }}</h3>
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
                                <th>Category</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                            width="40">
                                        {{ $product->name }}
                                    </td>
                                    <td>{{ $product->category }}</td>
                                    <td>Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                                    <td>
                                        <a href="{{ route('products.edit', $product->id) }}" class="edit"><i
                                                class='bx bx-edit'></i></a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin mau hapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @if ($products->isEmpty())
                                <tr>
                                    <td colspan="4" style="text-align: center;">No products found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </section>
    <script>
        const menuToggle = document.querySelector('.bx-menu');
        const sidebar = document.querySelector('#sidebar');
        const mainContent = document.querySelector('#main-content');

        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('hide');
            mainContent.classList.toggle('expanded'); // Toggle class for the content
        });
    </script>
</body>

</html>
