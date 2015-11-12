<!-- resources/views/auth/login.blade.php -->

<!DOCTYPE html>
<html class="bg-black">
    @include('admin.includes.head')
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header">Sign In</div>

            <form action="{{URL::to('/admin')}}" method="post">
                <div class="body bg-gray">
                    @if (count($errors) > 0)
                    <!-- Form Error List -->
                    <div class="alert alert-danger">
                        <strong>Whoops! Something went wrong!</strong>
                        <br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="form-group">
                        <input type="text" name="email" class="form-control"  placeholder="Email ID"/>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required/>
                    </div>          
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Remember me
                    </div>
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Sign in</button>  

                    <p><a href="#">I forgot my password</a></p>

                    <a href="{{URL::to('auth/register')}}" class="text-center">Register a new membership</a>
                </div>
            </form>

            <div class="margin text-center">
                <span>Sign in using social networks</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

            </div>
        </div>


        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../../js/bootstrap.min.js" type="text/javascript"></script>    

    </body>
</html>