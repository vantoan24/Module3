<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Nhập từ cần tìm</h3>
    <form method="post" action="/search">
        @csrf
        <input type="text" name="word" value="">
        <input type="submit" value="Dịch"> 
         @if(isset($kq)){{$kq}}
         @else 
               Điền từ khóa         
         
         @endif
    </form>
</body>
</html>