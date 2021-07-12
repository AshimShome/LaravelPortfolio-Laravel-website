@extends('Layout.app')

@section('title')
Contact
@endsection

@section('content')

<div id="contactMainDiv"class="container d-none">
<div class="row">
<div class="col-md-12 p-5">


<table id="contactDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%"> 
  <thead>
    <tr>
      <th class="th-sm">Name</th>
	  <th class="th-sm">Mobile Number</th>
	  <th class="th-sm">Email</th>
    <th class="th-sm">Message</th>

	  <th class="th-sm">Delete</th>
    </tr> 
  </thead>
  <tbody id="contactTable">
  
	

	
  </tbody>
</table>

</div>
</div>
</div>

<div id="loderDivContact" class="container">
<div class="row">
<div class="col-md-12 text-center p-5">
<img class= "oading-icon m-5"src="{{asset('images/loader.svg')}}">
</div>
</div>
</div>

<div id="wrongDivContact" class="container d-none ">
<div class="row">
<div class="col-md-12 text-center p-5">
<h3>Something Went Wrong !</h3>
<h5>Data not found</h5>

</div>
</div>
</div>
  
<div class="modal fade" id="deleteContactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body p-5 text-center">
          
          <h4 class='mt-5'>Do You Want To Delete ?</h4>

         <h6 id="ContactDeleteId"class='mt-5 d-none'></h6>

          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
        <button data-id=" "  id="contactDeleteConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>
 
@endsection

@section('script')
<script type="text/javascript">
getContacttData();

//for contact table
function getContacttData() {
    axios.get('/ContactData')
        .then(function(response) {
  
            if (response.status == 200) {
                $('#contactMainDiv').removeClass('d-none');
                $('#loderDivContact').addClass('d-none');
  
                $('#contactDataTable').DataTable().destroy();
                $('#contactTable').empty();
  
                var jsonData = response.data;
                $.each(jsonData, function(i, item) {
  
                    $('<tr>').html(
  
                        "<td>" + jsonData[i].contact_name + "</td>" +
                        "<td>" + jsonData[i].contact_mobile + "</td>" +
                        "<td>" + jsonData[i].contact_email+ "</td>" +
                        "<td>" + jsonData[i].contact_msg + "</td>"+
  
  
                        "<td><a class='contactDeleteBtn' data-id=" + jsonData[i].id + " ><i class='fas fa-trash-alt'></i></a></td>"
  
  
                    ).appendTo('#contactTable');
                });
  
                //contact table delete icon table
  
                $('.contactDeleteBtn').click(function() {
                    var id = $(this).data('id');
                    $('#ContactDeleteId').html(id);
                    $('#deleteContactModal').modal('show');
                })
  
                
                
            
              
             
  ///////////////////////////////////datata table///////////////////////////////////////////////////
               $('#contactDataTable').DataTable({"order":false});
               $('.dataTables_length').addClass('bs-select');
  
  
  
            } else {
                $('#wrongDivContact').removeClass('d-none');
                $('#loderDivContact').addClass('d-none');
  
            }
        })
  
  
  
        .catch(function(error) {
            $('#wrongDivContact').removeClass('d-none');
                $('#loderDivContact').addClass('d-none');
        });
  }

  $('#contactDeleteConfirmBtn').click(function() {
    var id = $('#ContactDeleteId').html();
    ContactDelete(id);
  
  });

  function ContactDelete(deleteId) {
    $('#contactDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
    axios.post('/ContactDatatDelete', {
            id: deleteId
        })
        .then(function(response) {
          $('#contactDeleteConfirmBtn').html('Yes');
  
           if(response.status==200){
            if (response.data == 1) {
              //alert('Success');
              $('#deleteContactModal').modal('hide');
  
              toastr.success('Delete Success');
              getContacttData();
          } else {
              //alert('Fail');
              $('#deleteContactModal').modal('hide');
              toastr.error('Delete Fail');
              getContacttData();
  
          }
  
           }else{
  
            $('#deleteContactModal').modal('hide');
          toastr.error('Something Went  Wrong !');
           }
        })
  
  
  
        .catch(function(error) {
          $('#deleteContactModal').modal('hide');
         toastr.error('Something Went  Wrong !');
        });
  }
  



</script>

@endsection
