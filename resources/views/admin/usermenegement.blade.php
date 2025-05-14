<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Store - Admin</title>
    <link rel="stylesheet" href="{{ asset('admin/css/usermenegement.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
    @include('layouts.sidebar')

    <section id="content">
        <nav>
            <i class='bx bx-menu'></i>
        </nav>
        <main>
            <div class="head-title">
                <h1>My Store</h1>
                <div>
                    <a href="#" id="add-user-btn" class="btn-add">
                        <i class='bx bx-plus'></i>
                        <span class="text">Add User</span>
                    </a>
                </div>
            </div>
            <ul class="box-info">
            </ul>
            <!-- Create User Form -->
            <div class="form-container">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <select name="role" required>
                        <option value="" disabled selected>Select Role</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                    <button type="submit" class="btn">Create User</button>
                </form>
            </div>

            <!-- Search Bar -->
            <div class="search-bar">
                <input type="text" id="searchInput" placeholder="Search users..." onkeyup="searchUsers()" />
            </div>

            <!-- Table -->
            <div class="card">
                <table id="userTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <div class="user-info">
                                        <div>
                                            <span>{{ $user->name }}</span>
                                            <span class="email">{{ $user->email }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ ucfirst($user->role) }}</td>
                                <td>
                                    <div class="actions">
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                            style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-delete"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" style="text-align: center;">No users found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </main>
    </section>

    <script>
        function searchUsers() {
            let input = document.getElementById('searchInput');
            let filter = input.value.toLowerCase();
            let table = document.getElementById("userTable");
            let tr = table.getElementsByTagName("tr");

            for (let i = 1; i < tr.length; i++) {
                let td = tr[i].getElementsByTagName("td");
                let name = td[1].textContent.toLowerCase();
                let email = td[1].getElementsByClassName('email')[0].textContent.toLowerCase();

                if (name.indexOf(filter) > -1 || email.indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
        const menuToggle = document.querySelector('.bx-menu');
        const sidebar = document.querySelector('#sidebar');
        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('hide');
        });

        document.addEventListener('DOMContentLoaded', function() {
            const addUserBtn = document.querySelector('#add-user-btn');
            const formContainer = document.querySelector('.form-container');

            addUserBtn.addEventListener('click', function(e) {
                e.preventDefault();
                formContainer.classList.toggle('active');
            });
        });
    </script>
</body>

</html>
