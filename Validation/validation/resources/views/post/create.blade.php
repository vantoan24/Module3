
 
<form action="/post" method="POST">
@csrf
<div>
    <label for="">Username</label>
    <input type="text" name="title" value="{{ old('title') }}">
    <div class="alert alert-danger">
        @if ($errors->any())
        <p style="color:red">{{ $errors->first('title') }}</p>
        @endif
    </div>
</div>
<div>
    <label for="">Password: </label>
    <input type="text" name="body">
    <div class="alert alert-danger">
        @if ($errors->any())
        <p style="color:red">{{ $errors->first('body') }}</p>
        @endif
        <input type="submit" value="bấm">
    </div>
</div>
</form>