@extends('admin.layouts.header')
@section('content')
<div class="container-fluid py-4">
    <form action="{{ route('youtube.store') }}" method="post" autocomplete="off">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <input type="text" name="video" class="form-control" placeholder="ادخل رابط الفيديو على اليوتيوب">
            </div>
            <div class="col-lg-6">
                <button type="submit" class="btn btn-success">حفظ</button>
            </div>
        </div>
    </form>
    @foreach ($vid as $vid)
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('youtube.destroy',$vid->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                <iframe width="250" height="250"
                src="https://www.youtube.com/embed/{{ $vid->video }}?autoplay=0&mute=1&rel=0">
                </iframe>
            </form>
                
        </div>
    </div>
    @endforeach
</div>
@endsection
