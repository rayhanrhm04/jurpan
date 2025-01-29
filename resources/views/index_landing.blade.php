@extends('layouts.app')

@section('content')
<section class="section-lg home-alt bg-img" id="home">
    <div class="bg-overlay-gradient bg-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="home-wrapper text-center">
                    {{-- <img width="60px" heigth="60px" src="{{ asset('assets/images/logowhite.png') }}" /> --}}
                    <h1 class="mb-0">Juraganpanel</h1>
                    <div class="h2 my-5 text-light"><span class="typed" data-elements="SMM Panel Termurah ,Pusat Reseller SMM Panel di Indonesia,SMM Panel Indonesia termurah"></span></div>
                    <a href="{{ route('login') }}" class="btn btn-custom"><i class="fa fa-sign-in-alt fa-fw mr-1"></i>Masuk</a>
                    <a href="{{ route('register') }}" class="btn btn-dark"><i class="fa fa-user-plus fa-fw mr-1"></i>Daftar</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
