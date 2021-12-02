
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
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

  <h2>{{ trans('website.register') }}</h2>


  
  <form   action = "{{ url('/Admins')}}"  method="post">

   @csrf

  <div class="form-group">
    <label for="exampleInputName">{{ trans('website.name') }}</label>
    <input type="text" class="form-control" name="name" value="{{ old('name')}}" id="exampleInputName" aria-describedby="" placeholder="{{ trans('website.enter_name') }}">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail">{{ trans('website.email') }}</label>
    <input type="email"   class="form-control"  name="email" value=" {{ old('email') }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword">{{ trans('website.password') }}</label>
    <input type="password"   class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
  </div>
 


  <div class="form-group">
    <label for="exampleInputPassword">{{ trans('website.department') }}</label>
    <select  class="form-control" name="dep_id" >
    @foreach ($data as $val)
    <option value="{{ $val->id }}"> {{ $val->title }}</option>  
    @endforeach 
      
    
    </select>
    </div>



    <div class="form-group">
      <label for="exampleInputName">{{ trans('website.city') }}</label>
      <input type="text" class="form-control" name="city" value="{{ old('city')}}" id="exampleInputName" aria-describedby="" placeholder="Enter City">
    </div>


    <div class="form-group">
      <label for="exampleInputName">{{ trans('website.extraData') }}</label>
      <input type="text" class="form-control" name="extraData" value="{{ old('extraData')}}" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
    </div>
  

  
  <button type="submit" class="btn btn-primary">{{ trans('website.save') }}</button>
</form>
</div>

</body>
</html>





