@extends('layouts.header')
@section('body')
<main>
    <div class="contact" style="direction: rtl; text-align:right;">
        <div class="container">
            <div class="row">
                @foreach ($article as $article)
                
                    @section('metadesc',$article->meta_tag)
                    @section('title',$article->title)

                    <div class="col-md-9">
                        <article>
                            <div class="contact-info">
                                <img src="{{ asset('storage/'.$article->img_path) }}" style="width: 100%; border-radius:20px"  alt=
                                @if ($article->alt_img != null)
                                    {{ "".$article->alt_img."" }}
                                @else
                                    {{ "".$article->title."" }}
                                @endif
                                >
                                
                                {!! $article->description !!}
                                {{-- @foreach ($details as $details)
                                    <{{ $details->tag }}>{{$details->description}}</{{ $details->tag }}>
                                @endforeach --}}

                                @if ($article->video != null)
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <center>
                                            <iframe width="150px" height="150px"
                                            src="https://www.youtube.com/embed/{{ $article->video }}?autoplay=0&mute=1&rel=0">
                                            </iframe>
                                        </center>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                                @endif
                                
                            </div>
                        </article>
                    </div>
                @endforeach

                <div class="col-md-3">
                    <div class="editor-info">
                        <h4 class="section-title">{{ __('messages.relatedposts') }}</h4></br>
                        @foreach ($otherarticles as $otherarticles)
                        <div class="editor-item">
                            <div class="editor-img">
                                <img src="{{ asset('storage/'.$otherarticles->img_path) }}" alt=
                                @if ($otherarticles->alt_img != null)
                                    {{ "".$otherarticles->alt_img."" }}
                                @else
                                    {{ "".$otherarticles->title."" }}
                                @endif>
                            </div>
                            <div class="editor-text">
                                <h3>{{ $otherarticles->title }}</h3>
                                <a href="{{ route('article.show',[$otherarticles->id,$otherarticles->slug]) }}">{{ __('messages.readmore') }}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection