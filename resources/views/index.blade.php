<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
    </head>
    <body class="" style="width: 50%; margin: 0 auto; font-family: 'figtree', sans-serif;">
        <h1>MRZ Data Extractor</h1>
        {{-- form with text area --}}
        {{-- errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    {{-- loop through errors --}}
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            <div>
        @endif
        <form action="{{ route('decode') }}" method="POST">
            @csrf
            <label for="data">MRZ String</label><br>
            <textarea name="data" id="data" cols="30" rows="10">
                {{ session('data') }}
            </textarea><br>
            <button type="reset">Clear</button>
            <button type="submit">Send</button>
        </form>


        <br><br><br>

        @if (isset($data))
            <kbd>{!! $data !!}</kbd>
        @endif
    </body>
</html>
