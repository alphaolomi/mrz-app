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
  <h1>MRZ Code Generator</h1>

  <div class="container">
    <h1>Generate MRZ</h1>
    <form method="POST" action="{{ route('mrz.generate') }}">
        @csrf

        <div class="form-group">
            <label for="type">Type</label>
            <input type="text" name="type" id="type" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="country">Country</label>
            <input type="text" name="country" id="country" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="document_number">Document Number</label>
            <input type="text" name="document_number" id="document_number" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="birth_date">Birth Date</label>
            <input type="date" name="birth_date" id="birth_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control" required>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
        </div>

        <div class="form-group">
            <label for="expiration_date">Expiration Date</label>
            <input type="date" name="expiration_date" id="expiration_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="nationality">Nationality</label>
            <input type="text" name="nationality" id="nationality" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Generate MRZ</button>
    </form>
</div>
</body>

</html>
