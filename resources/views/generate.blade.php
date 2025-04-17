<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Generate Document</title>
</head>
<body>
    <h2>Generate Legal Document (Lawza)</h2>
    <form method="POST" action="{{ route('generate.document') }}">
        @csrf
        <textarea name="prompt" rows="8" cols="80" placeholder="e.g., Draft sale agreement for residential plot in DHA Karachi under Pakistani law."></textarea>
        <br><br>
        <button type="submit">Generate & Download PDF</button>
    </form>
</body>
</html>
