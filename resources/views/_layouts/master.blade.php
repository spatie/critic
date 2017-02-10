<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Seo tool</title>

</head>
<body>

@yield('content')

<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
        'pusherKey' => config('broadcasting.connections.pusher.key'),
    ]) !!};
</script>
<script src="{{ mix('js/app.js') }}" ></script>

</body>
</html>
