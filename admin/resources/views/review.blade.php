@extends('Layout.app')
@section('title')
Review
@endsection

@section('content')

<div id="reviewmainDiv"class="container  d-none">
<div class="row">
<div class="col-md-12 p-5">

  <button id="addNewBtnIdreview"class="btn my-3 btn-sm btn-danger">Add New</button>

<table id="reviewDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Image</th>
	  <th class="th-sm">Name</th>
	  <th class="th-sm">Description</th>
	  <th class="th-sm">Edit</th>
	  <th class="th-sm">Delete</th>
    </tr> 
  </thead>
  <tbody id="reviewTable">
  
	
  </tbody>
</table>

</div>
</div>
</div>


<div id="reviewloderDiv" class="container">
<div class="row">
<div class="col-md-12 text-center p-5">
<img class= "oading-icon m-5"src="{{asset('images/loader.svg')}}">
</div>
</div>
</div>

<div id="reviewwrongDiv" class="container d-none">
<div class="row">
<div class="col-md-12 text-center p-5">
<h3>Something Went Wrong !</h3>
<h5>Data not found</h5>



</div>
</div>
</div>

<div class="modal fade" id="reviewdeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body p-5 text-center">
          
          <h4 class='mt-5'>Do You Want To Delete ?</h4>

         <h6 id="reviewDeleteId"class='mt-5 '></h6>

          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
        <button data-id=" "  id="reviewDeleteConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="revieweditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

    <div class="modal-header">
        <h5 class="modal-title">Update Review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-4 text-center">

         
      <h6 id="revieweEditId"class='mt-5 '></h6>


     <div id="reviewFromId" class="w-100 d-none"> 
       
    <input type="text" id="reviewImageId" class="form-control mb-4" placeholder="Review Image Link"/>
    <input type="text" id="reviewNameId" class="form-control mb-4" placeholder="Review Name"/>
    <input type="text" id="revieweDescriptionId" class="form-control mb-4" placeholder="Review Description"/>
    </div>
    <img id="reviewEditLoderId" class= "oading-icon m-5"src="{{asset('images/loader.svg')}}">
    <h3 id="reviewEditWrongId"class="w-100 d-none">Something Went Wrong !</h3>



  
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancle</button>
        <button data-id=" "  id="reviewEditConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body p-5 text-center">
          
          <h4 class='mt-5'>Do You Want To Delete ?</h4>

         <h6 id="serviceDeleteId"class='mt-5'></h6>

          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
        <button data-id=" "  id="serviceDeleteConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="reviewaddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body p-5 text-center">
          
         <h6 class="mb-4">Add New Review</h6>
     <div id="serviceAddId" class="w-100 "> 
    <input type="text" id="reviewAddImageId" class="form-control mb-4" placeholder="Review Image Link"/>
    <input type="text" id="reviewAddNameId" class="form-control mb-4" placeholder="Review Name"/>
    <input type="text" id="reviewAddDescriptionId" class="form-control mb-4" placeholder="Review Description"/>
    </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancle</button>
        <button data-id=" "  id="addreviewNewconfmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
getreviewData();

//custom js////////////////////////////////////

//for service table
function getreviewData() {
    axios.get('/reviewData')
        .then(function(response) {
  
            if (response.status == 200) {
             $('#reviewmainDiv').removeClass('d-none');
                $('#reviewloderDiv').addClass('d-none');
  
                $('#reviewDataTable').DataTable().destroy();
                $('#reviewTable').empty();
  
                var jsonData = response.data;
                $.each(jsonData, function(i, item) {
  
                    $('<tr>').html(
  
                        "<td><img class='table-img'src=" + jsonData[i].img + "</td>" +
                        "<td>" + jsonData[i].name+ "</td>" +
                        "<td>" + jsonData[i].des + "</td>" +
  
                        "<td><a class='reviewEDitBtn' data-id=" + jsonData[i].id + " ><i class='fas fa-edit'></i></a></td>" +
  
                        "<td><a class='reviewDeleteBtn' data-id=" + jsonData[i].id + " ><i class='fas fa-trash-alt'></i></a></td>"
  
  
                    ).appendTo('#reviewTable');
                });
  
                //service table delete icon table
  
                $('.reviewDeleteBtn').click(function() {
                    var id = $(this).data('id');
                    $('#reviewDeleteId').html(id);
                    $('#reviewdeleteModal').modal('show');
                })
  
                
                
                //servic edit icon click
                
                $('.reviewEDitBtn').click(function() {
                  var id = $(this).data('id');
  
                  $('#revieweEditId').html(id);
  
                  reviewUpdatesDetails(id);
  
                  $('#revieweditModal').modal('show');
              })
  
              
             
  ///////////////////////////////////datata table///////////////////////////////////////////////////
               $('#reviewDataTable').DataTable({"order":false});
               $('.dataTables_length').addClass('bs-select');
  
  
  
            } else {
                $('#reviewwrongDiv').removeClass('d-none');
                $('#reviewloderDiv').addClass('d-none');
  
            }
        })
  
  
  
        .catch(function(error) {
            $('#reviewwrongDiv').removeClass('d-none');
            $('#reviewloderDiv').addClass('d-none');
        });
  }
  //service delete yes button
  
  $('#reviewDeleteConfirmBtn').click(function() {
    var id = $('#reviewDeleteId').html();
   revewDelete(id);
  
  });
  // review Delete
  
  function revewDelete(deleteId) {
    $('#serviceDeleteConfreviewDeleteConfirmBtnirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
    axios.post('/deletereviewData', {
            id: deleteId
        })
        .then(function(response) {
          $('#reviewDeleteConfirmBtn').html('Yes');
  
           if(response.status==200){
            if (response.data == 1) {
              //alert('Success');
              $('#reviewdeleteModal').modal('hide');
  
              toastr.success('Delete Success');
              getreviewData();
          } else {
              //alert('Fail');
              $('#reviewdeleteModal').modal('hide');
              toastr.error('Delete Fail');
              getreviewData();
  
          }
  
           }else{
  
            $('#reviewdeleteModal').modal('hide');
          toastr.error('Something Went  Wrong !');
           }
        })
  
  
  
        .catch(function(error) {
          $('#reviewdeleteModal').modal('hide');
          toastr.error('Something Went  Wrong !');
        });
  }
  
  // each Service update details
  
  function reviewUpdatesDetails(updateId) {
    axios.post('/getreviewDetails', {
            id: updateId
        })
        .then(function(response) {
          if (response.status==200) {
            $('#reviewFromId').removeClass('d-none');
            $('#reviewEditLoderId').addClass('d-none');
  
  
            var jsonData = response.data;
          
            $('#reviewImageId').val(jsonData[0].img);
            $('#reviewNameId').val(jsonData[0].name);
            $('#revieweDescriptionId').val(jsonData[0].des);
  
  
          } else{
            $('#reviewEditWrongId').removeClass('d-none');
            $('#serviceEditLoderId').addClass('d-none');
  
          }
        })
  
  
  
        .catch(function(error) {
          $('#serviceEditWrongId').removeClass('d-none');
          $('#serviceEditLoderId').addClass('d-none');
  
        });
  }
  
   //service update yes button////////////////////////////////////////////////////////
  
   $('#reviewEditConfirmBtn').click(function() {
    var id = $('#revieweEditId').html();
    var img = $('#reviewImageId').val();
    var name = $('#reviewNameId').val();
    var des = $('#revieweDescriptionId').val();
    
  
  
    updatesReview(id,img,name,des);
  })
  
  //service update
  
  function updatesReview(serviceId,serviceImg,serviceName,serviceDes) {
    $('#serviceEditConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
  
     if(serviceImg.length==0){
      toastr.error('Review image is Empty !');
      $('#reviewEditConfirmBtn').html('Save');
  
     }else if(serviceName.length==0){
      toastr.error('Review name is Empty !');
      $('#reviewEditConfirmBtn').html('Save');
  
     }else if(serviceDes.length==0){
      toastr.error('Review description is Empty !');
      $('#reviewEditConfirmBtn').html('Save');
  
     }else {
  
      axios.post('/updatereviewData', {
        id:serviceId,img:serviceImg,name:serviceName,des:serviceDes
  
    })
    .then(function(response) {
      $('#reviewEditConfirmBtn').html('Save');
  
      if(response.status==200){
        if (response.data == 1) {
         
          $('#revieweditModal').modal('hide');
    
          toastr.success('Update Success');
          getreviewData();
      } else {
          
          $('#revieweditModal').modal('hide');
          toastr.error('Update Fail');
          getreviewData();
    
      }
      
      }else{
  
        $('#revieweditModal').modal('hide');
        toastr.error('Something Went  Wrong !');
  
  
      }
  
    })
  
  
  
    .catch(function(error) {
      $('#revieweditModal').modal('hide');
        toastr.error('Something Went  Wrong !');
  
  
    });
       
    }
  
  }
  
  
  //review add new btn clk
  $('#addNewBtnIdreview').click(function() {
    
    $('#reviewaddModal').modal('show');
  });
  
   //review add yes button
  
   $('#addreviewNewconfmBtn').click(function() {
  
    var img = $('#reviewAddImageId').val();
    var name = $('#reviewAddNameId').val();
    var des = $('#reviewAddDescriptionId').val();
  
  
    reviewAdd(img,name,des);
  })
  
  
  //service add function
  
  
  function reviewAdd(serviceImg,serviceName,serviceDes) {
    $('#addreviewNewconfmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
  
     if(serviceImg.length==0){
      toastr.error('Review image is Empty !');
      $('#addreviewNewconfmBtn').html('Save');
  
     }else if(serviceName.length==0){
      toastr.error('Review name is Empty !');
      $('#addreviewNewconfmBtn').html('Save');
  
     }else if(serviceDes.length==0){
      toastr.error('Review description is Empty !');
      $('#addreviewNewconfmBtn').html('Save');
  
     }else {
  
      axios.post('/reviewAdd', {
        img:serviceImg,name:serviceName,des:serviceDes
  
    })
    .then(function(response) {
      $('#addreviewNewconfmBtn').html('Save');
  
      if(response.status==200){
        if (response.data == 1) {
          //alert('Success');
          $('#reviewaddModal').modal('hide');
    
          toastr.success('Add Success');
          getreviewData();
      } else {
          //alert('Fail');
          $('#reviewaddModal').modal('hide');
          toastr.error('Add Fail');
          getreviewData();
    
      }
      }else{
  
        $('#reviewaddModal').modal('hide');
        toastr.error('Something Went  Wrong !');
  
  
      }
  
    })
  
  
  
    .catch(function(error) {
      $('#reviewaddModal').modal('hide');
        toastr.error('Something Went  Wrong !');
  
  
    });
       
    }
  
  }
  
  
</script>

@endsection