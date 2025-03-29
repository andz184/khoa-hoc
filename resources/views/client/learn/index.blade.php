@extends('layouts.learn')

@section('content')

<section class="home-grid">




 </section>



 <section class="courses">

    <h1 class="heading">our courses</h1>

    <div class="box-container">

       <div class="box">
          <div class="tutor">
             <img src="{{ asset('assets/img/pic-2.jpg') }}" alt="">
             <div class="info">
                <h3>john deo</h3>
                <span>21-10-2022</span>
             </div>
          </div>
          <div class="thumb">
             <img src="{{ asset('assets/img/thumb-1.png') }}" alt="">
             <span>10 videos</span>
          </div>
          <h3 class="title">complete HTML tutorial</h3>
          <a href="playlist.html" class="inline-btn">view playlist</a>
       </div>

       <div class="box">
          <div class="tutor">
             <img src="{{ asset('assets/img/pic-3.jpg') }}" alt="">
             <div class="info">
                <h3>john deo</h3>
                <span>21-10-2022</span>
             </div>
          </div>
          <div class="thumb">
             <img src="{{ asset('assets/img/thumb-2.png') }}" alt="">
             <span>10 videos</span>
          </div>
          <h3 class="title">complete CSS tutorial</h3>
          <a href="playlist.html" class="inline-btn">view playlist</a>
       </div>

       <div class="box">
          <div class="tutor">
             <img src="{{ asset('assets/img/pic-4.jpg') }}" alt="">
             <div class="info">
                <h3>john deo</h3>
                <span>21-10-2022</span>
             </div>
          </div>
          <div class="thumb">
             <img src="{{ asset('assets/img/thumb-3.png') }}" alt="">
             <span>10 videos</span>
          </div>
          <h3 class="title">complete JS tutorial</h3>
          <a href="playlist.html" class="inline-btn">view playlist</a>
       </div>

       <div class="box">
          <div class="tutor">
             <img src="{{ asset('assets/img/pic-5.jpg') }}" alt="">
             <div class="info">
                <h3>john deo</h3>
                <span>21-10-2022</span>
             </div>
          </div>
          <div class="thumb">
             <img src="{{ asset('assets/img/thumb-4.png') }}" alt="">
             <span>10 videos</span>
          </div>
          <h3 class="title">complete Boostrap tutorial</h3>
          <a href="playlist.html" class="inline-btn">view playlist</a>
       </div>

       <div class="box">
          <div class="tutor">
             <img src="{{ asset('assets/img/pic-6.jpg') }}" alt="">
             <div class="info">
                <h3>john deo</h3>
                <span>21-10-2022</span>
             </div>
          </div>
          <div class="thumb">
             <img src="{{ asset('assets/img/thumb-5.png') }}" alt="">
             <span>10 videos</span>
          </div>
          <h3 class="title">complete JQuery tutorial</h3>
          <a href="playlist.html" class="inline-btn">view playlist</a>
       </div>

       <div class="box">
          <div class="tutor">
             <img src="{{ asset('assets/img/pic-7.jpg') }}" alt="">
             <div class="info">
                <h3>john deo</h3>
                <span>21-10-2022</span>
             </div>
          </div>
          <div class="thumb">
             <img src="{{ asset('assets/img/thumb-6.png') }}" alt="">
             <span>10 videos</span>
          </div>
          <h3 class="title">complete SASS tutorial</h3>
          <a href="{{ route('home-listcourse') }}" class="inline-btn">View Playlist</a>
       </div>

    </div>

    <div class="more-btn">
       <a href="courses.html" class="inline-option-btn">view all courses</a>
    </div>

 </section>

@endsection
