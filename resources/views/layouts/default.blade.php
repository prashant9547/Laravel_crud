<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="{!! asset('image/Hood_01.png') !!}" type="image/png" sizes="16x16">
	<title>@yield('title')</title>
	@include('includes.cssfiles')
	<script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
	<div id="wrapper">
		@include('includes.sidebar')
		<div id="page-wrapper" class="gray-bg">
			@include('includes.topnav')

			@yield('content')

			@include('includes.footer')
		</div>
	</div>

	@include('includes.jsfiles')



	<script type="text/javascript">
		function toastrDisplay(type, msg)
		{
			toastr.options = {
				closeButton: true,
				progressBar: true,
				showMethod: 'slideDown',
				timeOut: 7000
			};
			if (type == "success")
				toastr.success(msg);
			else if (type == "error")
				toastr.error(msg);

		}
	</script>

	@stack('scripts')
</body>
</html>
