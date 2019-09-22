<!DOCTYPE html>
<html lang="en">
<head>
<title>Laravel Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{ asset('css/backend/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/backend/bootstrap-responsive.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/backend/uniform.css') }}" />
<link rel="stylesheet" href="{{ asset('css/backend/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('css/backend/fullcalendar.css') }}" />
<link rel="stylesheet" href="{{ asset('css/backend/matrix-style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/backend/matrix-media.css') }}" />
<link rel="stylesheet" href="{{ asset('css/backend/jquery.gritter.css') }}" />
<link rel="stylesheet" href="{{ asset('fonts/backend/font-awesome/css/font-awesome.css') }}" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

@include('layouts.backend.admin_header')

@include('layouts.backend.admin_sidebar')

@yield('content')

@include('layouts.backend.admin_footer')

<script src="{{ asset('js/backend/jquery.min.js') }}"></script>
<script src="{{ asset('js/backend/jquery.ui.custom.js') }}"></script>
<script src="{{ asset('js/backend/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/backend/jquery.uniform.js') }}"></script>
<script src="{{ asset('js/backend/select2.min.js') }}"></script>
<script src="{{ asset('js/backend/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/backend/jquery.validate.js') }}"></script>
<script src="{{ asset('js/backend/matrix.js') }}"></script>
<script src="{{ asset('js/backend/matrix.form_validation.js') }}"></script>
<script src="{{ asset('js/backend/matrix.tables.js') }}"></script>
<script src="{{ asset('js/backend/matrix.popover.js') }}"></script>

</body>
</html>
