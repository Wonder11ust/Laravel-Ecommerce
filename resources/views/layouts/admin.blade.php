<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    {{-- font aweseome --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <title>Admin Sidebar</title>
    <style>
        /* Menambahkan sedikit gaya ke sidebar */
        .sidebar {
            height: 100%;
            width: 10em;
            position: absolute;
            top: 0;
            left: 0;
            background-color: #f8f9fa;
            padding-top: 20px;
        }

        .sidebar a {
            padding: 10px;
            text-align: left;
            text-decoration: none;
            font-size: 18px;
            color: #333;
            display: block;
        }

        .sidebar a:hover {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="/admin/dashboard">Dashboard</a>
    <a href="/admin/dashboard/create">Products</a>
    <a href="/admin/dashboard">Categories</a>
    <a href="/admin/dashboard/orders">Orders</a>
    <a href="/admin/dashboard/users">Users</a>
</div>


    @yield('content')


</body>
</html>
