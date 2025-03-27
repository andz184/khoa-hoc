<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


</head>
<body>




    <!-- Navbar -->
    @include('partials.learn.header')
    <!-- /.navbar -->
    <!-- Navbar -->
    @include('partials.learn.menu')
    <!-- /.navbar -->



    @yield('content')

    @include('partials.learn.footer')
    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

<!-- custom js file link  -->
<script src="{{ asset('assets/js/script.js') }}"></script>

</body>
</html>
