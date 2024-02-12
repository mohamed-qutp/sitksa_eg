@extends('layouts.header')
@section('body')
    <div class="section-header">
        <h2 style="margin-top: 5rem">{{ __('messages.packages') }}</h2>
    </div>
    <!-- pricing table -->
    <section class="pricing py-5">
        <div class="container">
            <div class="row">
                @foreach ($host as $host)
                <!-- Free Tier -->
                <div class="col-lg-4">
                    <div class="card mb-5 mb-lg-0">
                        <div class="card-body" style="background-image: url('{{ asset('img/curve3.png') }}');background-size: cover;">
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
                            <div class="d-grid">
                                <a href="{{ route('host-reservationindex',$host->id) }}" class="btn btn-primary text-uppercase">{{ __('messages.ordernow') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Free Tier -->
                @endforeach
            </div>
        </div>
    </section>
    <!-- pricing table -->
@endsection