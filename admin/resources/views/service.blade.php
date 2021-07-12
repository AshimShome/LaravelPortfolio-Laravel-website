@extends('Layout.app')
@section('title')
Servics
@endsection

@section('content')

<div id="mainDiv"class="container d-none">
<div class="row">
<div class="col-md-12 p-5">

  <button id="addNewBtnId"class="btn my-3 btn-sm btn-danger">Add New</button>

<table id="serviceDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Image</th>
	  <th class="th-sm">Name</th>
	  <th class="th-sm">Description</th>
	  <th class="th-sm">Edit</th>
	  <th class="th-sm">Delete</th>
    </tr> 
  </thead>
  <tbody id="serviceTable">
  <!--
	<tr>
      <th class="th-sm"><img class="table-img" src="images/Knowledge.svg"></th>
	  <th class="th-sm">আইটি কোর্স</th>
	  <th class="th-sm">মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট</th>
	  <th class="th-sm"><a href="" ><i class="fas fa-edit"></i></a></th>
	  <th class="th-sm"><a href="" ><i class="fas fa-trash-alt"></i></a></th>
    </tr>	
	<tr>
-->
	
  </tbody>
</table>

</div>
</div>
</div>


<div id="loderDiv" class="container">
<div class="row">
<div class="col-md-12 text-center p-5">
<img class= "oading-icon m-5"src="{{asset('images/loader.svg')}}">
</div>
</div>
</div>

<div id="wrongDiv" class="container  d-none">
<div class="row">
<div class="col-md-12 text-center p-5">
<h3>Something Went Wrong !</h3>
<h5>Data not found</h5>



</div>
</div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body p-5 text-center">
          
          <h4 class='mt-5'>Do You Want To Delete ?</h4>

         <h6 id="serviceDeleteId"class='mt-5 d-none'></h6>

          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
        <button data-id=" "  id="serviceDeleteConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

    <div class="modal-header">
        <h5 class="modal-title">Update Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-4 text-center">

         
      <h6 id="serviceEditId"class='mt-5 d-none'></h6>


     <div id="serviceFromId" class="w-100 d-none"> 
       
    <input type="text" id="serviceImageId" class="form-control mb-4" placeholder="Service Image Link"/>
    <input type="text" id="serviceNameId" class="form-control mb-4" placeholder="Service Name"/>
    <input type="text" id="serviceDescriptionId" class="form-control mb-4" placeholder="Service Description"/>
    </div>
    <img id="serviceEditLoderId" class= "oading-icon m-5"src="{{asset('images/loader.svg')}}">
    <h3 id="serviceEditWrongId"class="w-100 d-none">Something Went Wrong !</h3>



  
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancle</button>
        <button data-id=" "  id="serviceEditConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
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




<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body p-5 text-center">
          
         <h6 class="mb-4">Add New Services</h6>
     <div id="serviceAddId" class="w-100 "> 
    <input type="text" id="serviceAddImageId" class="form-control mb-4" placeholder="Service Image Link"/>
    <input type="text" id="serviceAddNameId" class="form-control mb-4" placeholder="Service Name"/>
    <input type="text" id="serviceAddDescriptionId" class="form-control mb-4" placeholder="Service Description"/>
    </div>
    



  
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancle</button>
        <button data-id=" "  id="addNewconfmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
getServiceData();

//custom js////////////////////////////////////

//for service table
function getServiceData() {
  axios.get('/servicedata')
      .then(function(response) {

          if (response.status == 200) {
              $('#mainDiv').removeClass('d-none');
              $('#loderDiv').addClass('d-none');

              $('#serviceDataTable').DataTable().destroy();
              $('#serviceTable').empty();

              var jsonData = response.data;
              $.each(jsonData, function(i, item) {

                  $('<tr>').html(

                      "<td><img class='table-img'src=" + jsonData[i].service_img + "</td>" +
                      "<td>" + jsonData[i].service_name + "</td>" +
                      "<td>" + jsonData[i].service_des + "</td>" +

                      "<td><a class='serviceEDitBtn' data-id=" + jsonData[i].id + " ><i class='fas fa-edit'></i></a></td>" +

                      "<td><a class='serviceDeleteBtn' data-id=" + jsonData[i].id + " ><i class='fas fa-trash-alt'></i></a></td>"


                  ).appendTo('#serviceTable');
              });

              //service table delete icon table

              $('.serviceDeleteBtn').click(function() {
                  var id = $(this).data('id');
                  $('#serviceDeleteId').html(id);
                  $('#deleteModal').modal('show');
              })

              
              
              //servic edit icon click
              
              $('.serviceEDitBtn').click(function() {
                var id = $(this).data('id');

                $('#serviceEditId').html(id);

                ServiceUpdatesDetails(id);

                $('#editModal').modal('show');
            })

            
           
///////////////////////////////////datata table///////////////////////////////////////////////////
             $('#serviceDataTable').DataTable({"order":false});
             $('.dataTables_length').addClass('bs-select');



          } else {
              $('#wrongDiv').removeClass('d-none');
              $('#loderDiv').addClass('d-none');

          }
      })



      .catch(function(error) {
          $('#wrongDiv').removeClass('d-none');
          $('#loderDiv').addClass('d-none');
      });
}
//service delete yes button

$('#serviceDeleteConfirmBtn').click(function() {
  var id = $('#serviceDeleteId').html();
  ServiceDelete(id);

});
// Service Delete

function ServiceDelete(deleteId) {
  $('#serviceDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
  axios.post('/deleteservicedata', {
          id: deleteId
      })
      .then(function(response) {
        $('#serviceDeleteConfirmBtn').html('Yes');

         if(response.status==200){
          if (response.data == 1) {
            //alert('Success');
            $('#deleteModal').modal('hide');

            toastr.success('Delete Success');
            getServiceData();
        } else {
            //alert('Fail');
            $('#deleteModal').modal('hide');
            toastr.error('Delete Fail');
            getServiceData();

        }

         }else{

          $('#deleteModal').modal('hide');
        toastr.error('Something Went  Wrong !');
         }
      })



      .catch(function(error) {
        $('#deleteModal').modal('hide');
        toastr.error('Something Went  Wrong !');
      });
}

// each Service update details

function ServiceUpdatesDetails(updateId) {
  axios.post('/getServiceDetails', {
          id: updateId
      })
      .then(function(response) {
        if (response.status==200) {
          $('#serviceFromId').removeClass('d-none');
          $('#serviceEditLoderId').addClass('d-none');


          var jsonData = response.data;
        
          $('#serviceImageId').val(jsonData[0].service_img);
          $('#serviceNameId').val(jsonData[0].service_name);
          $('#serviceDescriptionId').val(jsonData[0].service_des);


        } else{
          $('#serviceEditWrongId').removeClass('d-none');
          $('#serviceEditLoderId').addClass('d-none');

        }
      })



      .catch(function(error) {
        $('#serviceEditWrongId').removeClass('d-none');
        $('#serviceEditLoderId').addClass('d-none');

      });
}

 //service update yes button

 $('#serviceEditConfirmBtn').click(function() {
  var id = $('#serviceEditId').html();
  var img = $('#serviceImageId').val();
  var name = $('#serviceNameId').val();
  var des = $('#serviceDescriptionId').val();


  updatesService(id,img,name,des);
})

//service update

function updatesService(serviceId,serviceImg,serviceName,serviceDes) {
  $('#serviceEditConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");

   if(serviceImg.length==0){
    toastr.error('Service image is Empty !');
    $('#serviceEditConfirmBtn').html('Save');

   }else if(serviceName.length==0){
    toastr.error('Service name is Empty !');
    $('#serviceEditConfirmBtn').html('Save');

   }else if(serviceDes.length==0){
    toastr.error('Service description is Empty !');
    $('#serviceEditConfirmBtn').html('Save');

   }else {

    axios.post('/updateServiceData', {
      id:serviceId,img:serviceImg,name:serviceName,des:serviceDes

  })
  .then(function(response) {
    $('#serviceEditConfirmBtn').html('Save');

    if(response.status==200){
      if (response.data == 1) {
       
        $('#editModal').modal('hide');
  
        toastr.success('Update Success');
        getServiceData();
    } else {
        
        $('#editModal').modal('hide');
        toastr.error('Update Fail');
        getServiceData();
  
    }
    
    }else{

      $('#editModal').modal('hide');
      toastr.error('Something Went  Wrong !');


    }

  })



  .catch(function(error) {
    $('#editModal').modal('hide');
      toastr.error('Something Went  Wrong !');


  });
     
  }

}


//service add new btn clk
$('#addNewBtnId').click(function() {
  
  $('#addModal').modal('show');
});

 //service add yes button

 $('#addNewconfmBtn').click(function() {

  var img = $('#serviceAddImageId').val();
  var name = $('#serviceAddNameId').val();
  var des = $('#serviceAddDescriptionId').val();


  serviceAdd(img,name,des);
})


//service add function


function serviceAdd(serviceImg,serviceName,serviceDes) {
  $('#addNewconfmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");

   if(serviceImg.length==0){
    toastr.error('Service image is Empty !');
    $('#addNewconfmBtn').html('Save');

   }else if(serviceName.length==0){
    toastr.error('Service name is Empty !');
    $('#addNewconfmBtn').html('Save');

   }else if(serviceDes.length==0){
    toastr.error('Service description is Empty !');
    $('#addNewconfmBtn').html('Save');

   }else {

    axios.post('/serviceAdd', {
      img:serviceImg,name:serviceName,des:serviceDes

  })
  .then(function(response) {
    $('#addNewconfmBtn').html('Save');

    if(response.status==200){
      if (response.data == 1) {
        //alert('Success');
        $('#addModal').modal('hide');
  
        toastr.success('Add Success');
        getServiceData();
    } else {
        //alert('Fail');
        $('#addModal').modal('hide');
        toastr.error('Add Fail');
        getServiceData();
  
    }
    }else{

      $('#addModal').modal('hide');
      toastr.error('Something Went  Wrong !');


    }

  })



  .catch(function(error) {
    $('#addModal').modal('hide');
      toastr.error('Something Went  Wrong !');


  });
     
  }

}



</script>

@endsection

