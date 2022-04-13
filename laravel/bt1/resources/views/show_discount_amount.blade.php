<html>
<head>
<body>
<form>
    <style type="text/css">
        .login {
            height: 200px;
            width: 300px;
            margin: 0;
            padding: 10px;
            border: 3px gainsboro solid;
            border-radius: 15px;
        }
        .login input {
            padding: 5px;
            margin: 5px
        }
    </style>
    <div class="login" style="margin-left: 500px; text-align: left">
        <p style="color: green"><b>Product description: {{$productDescription}}</b></p>
        <p style="color: green"><b>Price:  {{$listPrice}}</b></p>
        <P style="color: green"><b>Discount Percent:  {{$discountPercent}}</b></P>
        <P style="color: green"><b>Discount Amount: {{$discountAmount}}</b></P>
        <P style="color: green"><b>Discount Price: {{$discountPrice}}</b></P>
    </div>
</form>
</body>
</head>
</html>
