<!-- resources/views/auth/register.blade.php -->

<form method="POST" action="{{URL::to('/auth/register')}}">
    {!! csrf_field() !!}
    <div>
       Old Password
        <input type="password" name="old_password">
    </div>
    <div>
       New Password
        <input type="password" name="password">
    </div>

    <div>
        Confirm Password
        <input type="password" name="password_confirmation">
    </div>
     <div>
        <button type="submit">Register</button>
    </div>
</form>