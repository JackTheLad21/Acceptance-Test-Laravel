<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<!--begin::Head-->
	<head>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="">

        <div class="text-center">
            <h2> werify your email:</h2>
        </div>

        <br>
<div class="row">
<div class="col text-center">
    <a href="{{$verificationUrl}}" target="_blank" class="btn btn-primary">Verify</a>
</div>
</div>
	</body>
	<!--end::Body-->
</html>
