<!-- The main blade that is going to be extended from all the interfaces. Head data, navbar data, message data, script
data are included.  The content of each page is yielded.-->

<!doctype html>
<html lang="en">
@include('includes.head')
@stack('css')

<body>

@include('includes.navbar')

<div class="container" style="padding-top:35px;">
@include('includes.messages')
@yield('content')
</div>

<hr class="pt-4">
<p class="text-center">Footer - Prodromos Georgiou</p>

@include('includes.scripts')
@stack('js')
@include('sweetalert::alert')

</body>
</html>
