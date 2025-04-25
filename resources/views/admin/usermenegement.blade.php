<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Management</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9fafb;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header p {
            font-size: 14px;
            color: #6b7280;
            margin: 0;
        }

        .filter-btn {
            display: flex;
            align-items: center;
            background: none;
            border: none;
            color: #6b7280;
            font-size: 14px;
            cursor: pointer;
        }

        .filter-btn img {
            width: 16px;
            margin-right: 5px;
        }

        .page-title {
            font-size: 24px;
            margin-bottom: 20px;
            font-weight: 600;
            color: #111827;
        }

        .back-button {
            background-color: #6b7280;
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            display: inline-block;
            margin-bottom: 20px;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #4b5563;
        }

        .search-bar {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }

        .search-bar input {
            padding: 8px 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            width: 200px;
            font-size: 14px;
        }

        .success-message {
            background-color: #d1fae5;
            color: #065f46;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .form-container {
            margin-bottom: 20px;
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .form-container form {
            display: flex;
            gap: 15px;
            align-items: center;
            flex-wrap: wrap;
        }

        .form-container input,
        .form-container select {
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #d1d5db;
            width: 200px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        .form-container input:focus,
        .form-container select:focus {
            outline: none;
            border-color: #3b82f6;
        }

        .card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px 16px;
            text-align: left;
        }

        th {
            background-color: #f9fafb;
            font-weight: 600;
            color: #6b7280;
            font-size: 12px;
            text-transform: uppercase;
        }

        tr:hover td {
            background-color: #f3f4f6;
        }

        td {
            background-color: #ffffff;
            font-size: 14px;
            color: #111827;
            border-bottom: 1px solid #e5e7eb;
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .user-info img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .user-info span {
            display: block;
        }

        .user-info .email {
            font-size: 12px;
            color: #6b7280;
        }

        .status-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 9999px;
            font-size: 12px;
            font-weight: bold;
        }

        .completed {
            background-color: #d1fae5;
            color: #065f46;
        }

        .in-progress {
            background-color: #fef3c7;
            color: #92400e;
        }

        .hold {
            background-color: #f3e8ff;
            color: #6b21a8;
        }

        .btn {
            padding: 8px 12px;
            font-size: 14px;
            border-radius: 6px;
            text-decoration: none;
            color: white;
            background-color: #3b82f6;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #2563eb;
        }

        .btn-delete {
            background-color: #ef4444;
        }

        .actions {
            display: flex;
            gap: 5px;
        }

        .actions button {
            background: none;
            border: none;
            cursor: pointer;
        }

        .actions img {
            width: 16px;
        }
    </style>
</head>

<body>
    <div class="container">

        <!-- Header -->
        <div class="header">
            <p>Manage your team members and their account permissions here.</p>
        </div>

        <!-- Title -->
        <h2 class="page-title">Customers</h2>

        <!-- Back Button -->
        <a href="{{ route('admin.dashboard') }}" class="back-button">Back</a>

        <!-- Success message -->
        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

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

        <!-- Table -->
        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer</th>
                        <th>Role</th>
                        <th>Status</th>
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
                                <span class="status-badge {{ $user->status ?? 'completed' }}">
                                    {{ ucfirst($user->status ?? 'Completed') }}
                                </span>
                            </td>
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
                            <td colspan="5" style="text-align: center;">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
