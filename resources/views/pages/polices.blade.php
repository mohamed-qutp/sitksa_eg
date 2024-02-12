@extends('layouts.header')
@section('body')
    <section id="clients2" class="clients2 section-bg">
        <div style="    text-align: center;" class="container" data-aos="zoom-in">
            <div class="container titles" style="  border-radius: 8px; margin-bottom: 15px;">
                <h3 style="text-align: center;line-height: 100px;"> {{ __('policy.policy') }} </h3>
            </div>
            <p> {{ __('policy.policyp') }} </p>
        </div>

        <div style="    text-align: center;" class="container" data-aos="zoom-in">
            <div class="container titles" style="  border-radius: 8px; margin-bottom: 15px;">
                <h3 style="text-align: center;line-height: 100px;"> {{ __('policy.Data') }} </h3>
            </div>
            <p> {{ __('policy.Datap') }} </p>
        </div>

        <div style="    text-align: center;" class="container" data-aos="zoom-in">
            <div class="container titles" style="  border-radius: 8px; margin-bottom: 15px;">
                <h3 style="text-align: center;line-height: 100px;"> {{ __('policy.When') }} </h3>
            </div>
            <p> {{ __('policy.Whenp') }} </p>
            <p> {{ __('policy.Whenp1') }} </p>
        </div>

        <div style="    text-align: center;" class="container" data-aos="zoom-in">
            <div class="container titles" style="  border-radius: 8px; margin-bottom: 15px;">
                <h3 style="text-align: center;line-height: 100px;">{{ __('policy.HowUse') }} </h3>
            </div>
            <p> {{ __('policy.HowUsep') }}</p>
            <p> {{ __('policy.HowUse1') }}</p>
            <p> {{ __('policy.HowUse2') }}</p>
            <p> {{ __('policy.HowUse3') }}</p>
            <p> {{ __('policy.HowUse4') }}</p>
            <p> {{ __('policy.HowUse5') }}</p>
        </div>
        <div style="    text-align: center;" class="container" data-aos="zoom-in">
            <div class="container titles" style="  border-radius: 8px; margin-bottom: 15px;">
                <h3 style="text-align: center;line-height: 100px;"> {{ __('policy.HowProtect') }}</h3>
            </div>
            <p> {{ __('policy.HowProtectp') }}</p>
            <p> {{ __('policy.HowProtectp1') }}</p>
        </div>

        <div style="    text-align: center;" class="container" data-aos="zoom-in">
            <div class="container titles" style="  border-radius: 8px; margin-bottom: 15px;">
                <h3 style="text-align: center;line-height: 100px;"> {{ __('policy.Disclosure') }}</h3>
            </div>
            <p> {{ __('policy.Disclosurep') }}</p>
        </div>
       
        <div style="    text-align: center;" class="container" data-aos="zoom-in">
            <div class="container titles" style="  border-radius: 8px; margin-bottom: 15px;">
                <h3 style="text-align: center;line-height: 100px;"> {{ __('policy.Cookies') }} </h3>
            </div>
            <p> {{ __('policy.Cookiesp') }} </p>
            <p> {{ __('policy.Cookiesp1') }} </p>
        </div>

        <div style="    text-align: center;" class="container" data-aos="zoom-in">
            <div class="container titles" style="  border-radius: 8px; margin-bottom: 15px;">
                <h3 style="text-align: center;line-height: 100px;">{{ __('policy.Contact') }} </h3>
            </div>
            <h4>{{ __('policy.Contact1') }}</h4>
            <p> {{ __('policy.Contact1p') }}</p>
            <h4>{{ __('policy.Contact2') }}</h4>
            <p> {{ __('policy.Contact2p') }}</p>
            <h4>{{ __('policy.Contact3') }}</h4>
            <p> {{ __('policy.Contact3p') }}</p>

            <h3>{{ __('policy.Phone') }}</h3>
            <h3>{{ __('policy.Email') }}</h3>
            <p>{{ __('policy.Updated') }}</p>
        </div>
    </section>
@endsection
