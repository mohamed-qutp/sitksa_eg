@extends('admin.layouts.header')
@section('content')
{{-- <form method="post" action="{{ route('text.store') }}">
    @csrf
    <textarea name="editor1"></textarea>
    <button>submit</button>
</form>

@foreach ($texts as $texts)
    {!! $texts->text !!} </br><hr>
@endforeach
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace( 'editor1' );
</script> --}}

<!DOCTYPE html>
<html>

<head>
	<!--auto compiled css & Js-->
	<script type="text/javascript"
			src="//code.jquery.com/jquery-1.9.1.js">
</script>
	<link rel="stylesheet"
		type="text/css"
		href="/css/result-light.css">
	
	<link rel="stylesheet"
		type="text/css"
		href=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<link rel="stylesheet"
		type="text/css"
		href=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<!-- JavaScript for adding
	slider for multiple images
	shown at once-->
	<script type="text/javascript">
		$(window).load(function() {
			$(".carousel .item").each(function() {
				var i = $(this).next();
				i.length || (i = $(this).siblings(":first")),
				i.children(":first-child").clone().appendTo($(this));
				
				for (var n = 0; n < 4; n++)(i = i.next()).length ||
				(i = $(this).siblings(":first")),
				i.children(":first-child").clone().appendTo($(this))
			})
		});
	</script>

</head>

<body>
	<!-- container class for bootstrap card-->
	<div class="container">
		<!-- bootstrap card with row name myCarousel as row 1-->
		<div class="carousel slide" id="myCarousel">
			<div class="carousel-inner">
				<div class="item active">
					<div class="col-xs-2">
						<a href="#">
						<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20190709143904/391.png"
							class="img-responsive">
					</a>
					</div>
				</div>
				<div class="item">
					<div class="col-xs-2">
						<a href="#">
						<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20190709143850/1382.png"
							class="img-responsive">
					</a>
					</div>
				</div>
				<div class="item">
					<div class="col-xs-2">
						<a href="#">
						<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20190709143855/223-1.png"
							class="img-responsive">
					</a>
					</div>
				</div>
			</div> <a class="left carousel-control"
					href="#myCarousel"
					data-slide="prev">
		<i class="glyphicon glyphicon-chevron-left">
		</i>
		</a>
			<a class="right carousel-control"
			href="#myCarousel"
			data-slide="next">
			<i class="glyphicon glyphicon-chevron-right">
			</i>
		</a>

		</div>
	</div>
</body>

</html>

@endsection