<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Contact Message</title>
    </head>
    <body>
        <div style="margin-top: 20px">
            <h1>Hai ricevito un nuovo messaggio!</h1>
            <strong>Nome</strong>: {{ $lead->name }}<br>
            <strong>Email</strong>: {{ $lead->email }}<br>
            <strong>Messaggio</strong>:
            <p>{{ $lead->message }}</p>
        </div>
    </body>
</html>