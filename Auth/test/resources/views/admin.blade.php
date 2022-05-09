<div class="content">
    <div class="title m-b-md">
        Laravel Cusstom Validation
    </div>
    <div class="form-custom-validation">
        <form action="{{ route('user.create') }}" method="post">
            <label for="name">Name: </label>
            <input id="name" name="name" type="text" placeholder="Enter the full name">
            <br>
            <label for="age">Age: </label>
            <input id="age" name="age" type="text" placeholder="Enter the age">
            <br>
            <button type="submit">Submit</button>
        </form>
    </div>
</div>