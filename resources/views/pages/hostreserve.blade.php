@extends('layouts.header')
@section('body')
    @foreach ($host as $host)
        <div class="section-header">
            <h2 style="margin-top: 5rem">{{ __('messages.packages') }}: {{ $host->disk_space }} GB</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <section class="pricing py-5">
                        <div class="card mb-5 mb-lg-0">
                            <div class="card-body" style="direction: {{ __('messages.direction') }};text-align: {{ __('messages.align') }};background-image: url('{{ asset('img/curved.png') }}');background-size: cover;border-radius: 15px;">

                                <div class="section-header">
                                    <h3 style="margin-top: 5rem">{{ __('messages.ordernow') }}</h3>
                                </div>
                                <form action="{{route('host-reservation')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group">
                                        <label for="message">{{ __('messages.thepackage') }}</label>
                                        <input type="text" name="package" class="form-control" value="{{ $host->disk_space }} GB" readonly>
                                    </div>

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
                    <section class="pricing py-5">
                        <div class="card mb-5 mb-lg-0">
                            <div class="card-body" style="background-image: url('{{ asset('img/curve2.png') }}');background-size: cover;border-radius: 15px;">
                                <h6 class="card-price text-center">{{ $host->disk_space }}<span class="period">GB</span></h6>
                                <hr>
                                <ul class="fa-ul" style="direction:ltr">
                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>FREE Domain!</li>
                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>{{ $host->disk_space }} GB Disk Space</li>
                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>{{ $host->email_accounts }} Email Accounts</li>
                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>{{ $host->websites }} Websites</li>
                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Speed Website LiteSpeed</li>
                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Anti-Spam Email Filters</li>
                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Cloud Remote Backup</li>
                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>SSD Enterprise Class</li>
                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Clean Inbox</li>
                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Free Domain</li>
                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Terminal</li>
                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>SSL Certificate</li>
                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>cPanel</li>
                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>WordPress Installer</li>
                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>DOS Protected</li>
                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Backup (Daily/Weekly/Monthly)</li>
                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>24/7 Support</li>
                                </ul>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            
        </div>
    @endforeach
@endsection