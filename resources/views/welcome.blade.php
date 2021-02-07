<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Codepotato Labs</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-cp-dark-blue text-white">

<div class="container mx-auto py-12">

    <div class="flex flex-row justify-between items-center mb-12">
        <a href="https://codepotato.co.uk" class="block">
            <img src="https://codepotato.co.uk/site/themes/codepotato19/images/codepotato-logo-new.svg" alt="">
        </a>
        <div class="flex flex-row items-center">
            <a class="text-cp-pink text-2xl mr-4" href="{{ route('login') }}">Log in</a>
            <p class="mr-4 text-2xl opacity-25">or</p>
            <a class="text-2xl" href="{{ route('register') }}">Sign up</a>
        </div>
    </div>



    <h1 class="text-9xl text-cp-pink text-gradient bg-gradient-to-r from-cp-pink to-cp-purple">
        <svg class="h-32 float-left mr-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11" />
        </svg>
        Hey there, would you like to help shape the products we build?</h1>

    <p class="text-2xl opacity-25 mt-12">Of course you do</p>

    <p class="text-8xl text-cp-purple my-28">You might be thinking, what products?</p>

    <p class="text-7xl text-cp-blue">Well, we're currently looking for ideas on what would make a spudtacular back-office system built for modern financial planners and advisers. Exciting, right?</p>

    <p class="text-2xl opacity-25 mt-12">Yeah, we get pretty excited about this nerdy stuff too.</p>

    <p class="text-7xl text-white opacity-50 my-24">Oh, and we're building Hakuna™, a consumer-facing cashflow planning tool that focuses on ensuring people have a decent level of financial literacy.</p>

    <p class="text-7xl text-white my-24">But enough about us, this platform's for you too! You can get involved by suggesting ideas for products that you would like us to tackle, too.</p>

    <p class="text-2xl opacity-25">Oh wow, you're still here. You're totally cool for hanging in there with all that big text. 😍</p>

    <a href="{{ route('register') }}" class="text-7xl text-gradient bg-gradient-to-r block from-cp-pink to-cp-purple my-24">Get involved (it's free) - Sign up</a>

</div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
