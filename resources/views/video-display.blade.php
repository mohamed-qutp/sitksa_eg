<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <title>{{ __('messages.title') }}</title>
        <style>
            body {
                background-color: black;
            }
            .container {
                margin-top: 3rem;
                width: 100%;
            }
            .close {cursor: pointer;}
        </style>
    </head>
<body>
    <div class="container">
        <div class="row">
            <span><i class="fa-solid fa-xmark text-white close"></i></span>
            @foreach ($video as $vid)
            <div class="col-md-12">
                <iframe src="https://www.youtube.com/embed/{{ $vid->video }}?autoplay=1" width="100%" height="550px" allow="autoplay" webkitallowfullscreen mozallowfullscreen allowfullscreen>
                </iframe>
            </div>
            @endforeach
        </div>
    </div>
    <script>
       $( ".close" ).click(function() {
        location.href = 'http://www.sitksa-eg.com/home';
});
    </script>
</body>
</html>
