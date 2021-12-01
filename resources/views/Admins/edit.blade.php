<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h2>Edit</h2>
        <form action="{{ url('/Admins/' . $data->id) }}" method="post">

            @csrf
            @method('put')

            {{-- <input type="hidden" name="_method" value="put"> --}}


            <input type="hidden" name="id" value="{{ $data->id }}">
            <div class="form-group">
                <label for="exampleInputName">Name</label>
                <input type="text" class="form-control" name="name" value="{{ $data->name }}" id="exampleInputName"
                    aria-describedby="" placeholder="Enter Name">
            </div>


            <div class="form-group">
                <label for="exampleInputEmail">Email address</label>
                <input type="email" class="form-control" name="email" value=" {{ $data->email }}"
                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            </div>


            <div class="form-group">
                <label for="exampleInputPassword">Department</label>
                <select class="form-control" name="dep_id">
                    @foreach ($dep_data as $val)
                        <option value="{{ $val->id }}" @if($data->dep_id == $val->id) selected @endif > {{ $val->title }}</option>
                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>

</body>

</html>
