<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Welcome</h2>

<p><b>Account:</b> {{{ $email }}}</p>

<p>To activate your account, <a href="{{ URL::to('register') }}/{{ $id }}/activate/{{ urlencode($activationCode) }}">click
        here.</a></p>

<p>Or point your browser to this address: <br/> {{ URL::to('register') }}/{{ $id }}/activate/{{
    urlencode($activationCode) }}</p>

<p>Thank you, <br/>
    ~The Support Team</p>
</body>
</html>