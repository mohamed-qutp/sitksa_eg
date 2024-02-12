@extends('layouts.header')
@section('body')
    
        <div class="section-header">
            <h2 style="margin-top: 5rem">{{ __('messages.domainorder') }}</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <section class="pricing py-5">
                        <div class="card mb-5 mb-lg-0">
                            <div class="card-body" style="direction: {{ __('messages.direction') }};text-align: {{ __('messages.align') }};background-image: url('{{ asset('img/career-bg-1-d62fc4820524c3408f6e25c3a2985f1a.png') }}');background-size: cover;border-radius: 15px;">
                                <div class="section-header">
                                    <h3 style="margin-top: 5rem">{{ __('messages.ordernow') }}</h3>
                                </div>
                                <form action="{{route('domain-reservation')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                    <div class="form-group">
                                        <label for="name">{{ __('messages.name') }}</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="{{ __('messages.name') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">{{ __('messages.email') }}</label>
                                        <input type="email" name="email" class="form-control" placeholder="{{ __('messages.email') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">{{ __('messages.phone') }}</label>
                                        <input type="text" name="phone" class="form-control" placeholder="{{ __('messages.phone') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="message">{{ __('messages.domainyouwant') }}</label>
                                        <input type="text" name="domain" class="form-control" placeholder="{{ __('messages.domainyouwant') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="message">{{ __('messages.message') }}</label>
                                        <textarea rows="5" name="message" class="form-control" placeholder="{{ __('messages.message') }}" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">{{ __('messages.submit') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('img/domain.png') }}" style="width: 100%">
                </div>
            </div>
            
        </div>
    
@endsection