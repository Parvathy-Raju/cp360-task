@extends('peoples.layout')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New One</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="home"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('forms.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12" id="dynamicAddRemove">
            <div class="form-group" hidden>
                <strong>Name:</strong>
                <input type="text" name="moreFields[0][name]" class="form-control" placeholder="Name">
            </div>
            <button type="button" name="add" id="add-btn" class="btn btn-success">Text Field</button>
        </div>
         

        
        <div class="col-xs-12 col-sm-12 col-md-12" id="dynamicAddRemove1">
            <div class="form-group" hidden>
                <strong>Phone Number:</strong>
                <input type="number" name="moreFields[0][phone_number]" class="form-control" placeholder="Phone Number"/>
                
            </div>
            <button type="button" name="add" id="add-btn1" class="btn btn-success">Number Field</button>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12" id="dynamicAddRemove2">
            <div class="form-group" hidden>
                <strong>Gender:</strong>
                <select name="moreFields[0][gender]" class="form-control">
                <option value="Select Gender" selected>Select Gender</option>
           <option value="Male">Male</option>
           <option value="Female">Female</option>
        </select>
            </div>
            <button type="button" name="add" id="add-btn2" class="btn btn-success">Select Button</button>
        </div>
       

       
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
</form>
<table class="table table-bordered">
        <tr>
            
            <th>Details</th>
           
            <th width="280px">Action</th>
        </tr>
        @foreach ($forms as $form)
        <tr>
           
            <td>{{ $form->details }}</td>
            
            <td>
                <form action="{{ route('forms.destroy',$form->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('forms.show',$form->id) }}">Show</a>
    
                  
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
<script type="text/javascript">
var i = 0;
$("#add-btn").click(function(){
++i;
$("#dynamicAddRemove").append('<input type="text" name="moreFields['+i+'][name]" placeholder="Name" class="form-control" /><button type="button" class="btn btn-danger remove-tr">Remove</button>');
});
$("#add-btn1").click(function(){
++i;
$("#dynamicAddRemove1").append('<input type="number" name="moreFields['+i+'][phone_number]" placeholder="Phone Number" class="form-control"/><button type="button" class="btn btn-danger remove-tr">Remove</button>');


});
$("#add-btn2").click(function(){
++i;
$("#dynamicAddRemove2").append('<select name="moreFields['+i+'][gender]" class="form-control"><option value="Select Gender" selected>Select Gender</option><option value="Male">Male</option><option value="Female">Female</option></select><button type="button" class="btn btn-danger remove-tr">Remove</button>');

});

$(document).on('click', '.remove-tr', function(){  
$(this).parents('div').remove();
});  
</script>
@endsection
