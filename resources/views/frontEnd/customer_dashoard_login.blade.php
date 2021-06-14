@extends('frontEnd.master.master')
@section('title')
Login | Register
@endsection

@section('body')

<div class="container ">
    <div class="row">
        <div class="col-md-6">
            <div class="shipping_title">

                <center>
                    <h3 style="padding-top:12px;" class="">Login</h3>
                </center>

            </div>
            <br>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label style="color:black;" for="email" class="shipping_label">Email</label>

                    <div class="name">
                        <input id="email" type="email" class="form-control" name="email" value="" required
                            autocomplete="email">
                        
                    </div>
                </div>

                <div class="form-group">
                    <label style="color:black;" for="email" class="shipping_label">Password</label>

                    <div class="name">
                        <input id="password" type="password" class="form-control" name="password" value="" required>
                    </div>
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>

            </form>
        </div>



        <div class="col-md-6">
            <div class="shipping_title">

                <center>
                    <h3 style="padding-top:12px;" class="">Registration</h3>
                </center>

            </div>
            <br>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label style="color:black;" for="email" class="shipping_label">Name</label>

                    <div class="name">
                        <input id="email" type="text" class="form-control" name="name" value="" required>
                    </div>
                </div>

                <div class="form-group">
                    <label style="color:black;" for="email" class="shipping_label">Email</label>

                    <div class="name">
                        <input id="email" type="email" class="form-control" name="email" value="" required
                            autocomplete="email">
                    </div>
                </div>
                <div class="form-group">
                    <label style="color:black;" for="email" class="shipping_label">Phone</label>

                    <div class="name">
                        <input id="email" type="number" class="form-control" name="phone" value="" required>
                    </div>
                </div>
                <div class="form-group">
                    <label style="color:black;" for="email" class="shipping_label">Password</label>

                    <div class="name">
                        <input id="email" type="password" class="form-control" name="password" value="" required>
                    </div>
                </div>


                <div class="form-group">
                    <label style="color:black;" for="email" class="shipping_label">Confrim password</label>

                    <div class="name">
                        <input id="email" type="password" class="form-control" name="password_confirmation" value=""
                            required>
                    </div>
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>

            </form>

        </div>



    </div>

</div>

@endsection