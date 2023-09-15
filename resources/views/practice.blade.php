<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        p {
            color: red;
        }
        img{
            width: 100px;
            height: 80px;
        }
    </style>
</head>
<body>
    @if (session('alert'))
        <p>{{session('alert')}}</p>
    @endif
    <form action="{{route('saveImage')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="images[]" multiple><br><br>
        <input type="submit" name="btn-submit" value="Save Image">
    </form><br>
    <form action="{{route('loginGoogle')}}">
    <input type="submit" value="Login by Google">
    </form>
    <div>
        @if (isset($images))
            @foreach ($images[0]['link'] as $value)
                <img src="{{$value}}" alt="">      
            @endforeach
        @endif
    </div>
</body>
<script>
    
</script>
</html>