<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <title>Admin</title>
</head>
<body class="sidebar-mini layout-fixed">
<div id="admin">

    {{-- <router-link to="/dashboard">Test Componet</router-link>
    <br/>
    <router-view></router-view> --}}
    {{-- @{{ test }}admin --}}

    <admin-master></admin-master>

</div>
     <script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
     <script src="{{ asset('assets/admin/js/adminlte.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
