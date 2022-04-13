<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>calcucator</title>
</head>
<body>
    <h1>Calcucator</h1>
    <form action="/calcu" method="POST">
        @csrf
        <p>
            Product Description:
            <input type="number" name="description" placeholder="ProductDescription">
        </p>
        <p>
            List Price:
            <input type="number" name="List" placeholder="ListPrice">
        </p>
        <p>
            Discount Percent:
            <input type="number" name="percent" placeholder="DiscountPercent">
        </p>
        <p>
            <button type="submit">Tính chiết khấu</button>
        </p>
    </form>
</body>
</html>