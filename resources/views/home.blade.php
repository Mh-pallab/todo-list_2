@extends('layouts.app')

@section('content')
    <div class="container ">

        <form class="row g-2 " action="" method="post">
            <div class="col-10">
                <input class="form-control col-auto" type="text" name="text">
            </div>

            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>




    </div>
@endsection
