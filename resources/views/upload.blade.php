
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>

<form method="POST" action="{{route('image.upload')}}" enctype="multipart/form-data">
    @csrf
    <input type="file" name="uploadImage"  />
    <input type="submit"    />
</form>

</body>
</html>



