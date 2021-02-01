@extends('Layout.app2')
@section('title',"Login")


@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center ">
        <div class="col-12 col-md-4">
            <div class="form-container bg-dark rounded">
                    <h1 class="text-center mt-2"><i class="fas fa-user-secret"></i></h1>
                <form action="" method="POST" class="loginForm">

                    <label for="username">User Name</label>
                    <input required name="userName" value="" type="text" id="username" class="form-control mb-2" placeholder="Enter User Name" title="Enter User Name">
                    <label for="password">Password</label>
                    <input required name="userPassword" value="" type="password" id="password" class="form-control mb-2" placeholder="Enter Password" title="Enter Password">

                    <button name="submit" type="submit" class="btn btn-block bg-success rounded mt-4 mb-3">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection


@section('script')

<script>

    $('.loginForm').on('submit',function(event){
        event.preventDefault();
        var formData = $(this).serializeArray();

        var userName = formData[0]['value'];
        var password = formData[1]['value'];


        axios.post('/onLogin',{
            user:userName,
            pass:password,
        }).then(function(response){

            if(response.status===200 && response.data==1){

                window.location.href='/';

            }else{
                toastr.error('Login Fail! Try Again');
            }


        }).catch(function(error){
            toastr.error('Login Fail! Try Again');
        })

    })

</script>
@endsection
