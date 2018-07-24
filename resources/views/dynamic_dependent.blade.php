
<!DOCTYPE html>
<html>
    <head>
  
	  <title>RATING TOOL</title>
	  <link rel="stylesheet" type="text/css" >
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

	  
  
    </head>
 
 <body>
  <br /><br />
  <div class="container" style="width:600px;">
   <h2 align="center">RATING TOOL</h2><br /><br />
   
   <div class="form-group">

         <form method="POST" >


   
    <select name="product_name" id="product_name" class="form-control input-lg dynamic" data-dependent="make">
     <option value="">Select Product</option>
				 @foreach($productname_list as $product)
				 <option value="{{ $product->product_name}}">{{ $product->product_name }}</option>
				 @endforeach
    </select>
   </div>
   <br />
   
   
   <div class="form-group">
    <select name="make" id="make" class="form-control input-lg dynamic" data-dependent="model">
     <option value="">Select Make</option>
    </select>
   </div>
   <br />
   
   
   <div class="form-group">
    <select name="model" id="model" class="form-control input-lg">
     <option value="">Select Model</option>
    </select>
	

	<!--Allow user to rate a product-->
	 
		  <br><br><strong><h4 align="center">Rate this article:</h4>
		  
		                       <select name='rating' id='rating'>
		                            <option> 1</option>
									<option> 2</option>
									<option> 3</option>
									<option> 4</option>
									<option> 5</option>
								</select>
		                   <input type='submit' value='Rate' >

      <button type="submit" class="btn" name="logout" href="{{'/home'}}">Logout</button>
	</form>
   </div>
   {{ csrf_field() }}
   <br />
   <br />
  </div>
 </body>
</html>

<script>
$(document).ready(function(){

 $('.dynamic').change(function(){
  if($(this).val() != '')
  {
   var select = $(this).attr("id");
   var value = $(this).val();
   var dependent = $(this).data('dependent');
   var _token = $('input[name="_token"]').val();
   $.ajax({
    url:"{{ route('dynamicdependent.fetch') }}",
    method:"POST",
    data:{select:select, value:value, _token:_token, dependent:dependent},
    success:function(result)
    {
     $('#'+dependent).html(result);
    }

   })
  }
 });

 $('#product_name').change(function(){
  $('#make').val('');
  $('#model').val('');
 });

 $('#make').change(function(){
  $('#model').val('');
 });
 

});
</script>
