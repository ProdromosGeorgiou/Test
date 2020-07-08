<!-- This blade includes the session messages -->
@if (session('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
@if (session('error'))
    <div class="alert alert-danger">{{ Session::get('error') }}</div>
@endif
@include('sweetalert::alert')
