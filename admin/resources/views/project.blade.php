
@extends('Layout.app')
@section('title')
Project
@endsection

@section('content')

<div id="projectmainDiv"class="container d-none">
<div class="row">
<div class="col-md-12 p-5">

  <button id="addNewBtnId"class="btn my-3 btn-sm btn-danger">Add New</button>

<table id="projectDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Image</th>
	  <th class="th-sm">Project Name</th>
	  <th class="th-sm">Project Description</th>
    <th class="th-sm">Project Link</th>
	  <th class="th-sm">Edit</th>
	  <th class="th-sm">Delete</th>
    </tr> 
  </thead>
  <tbody id="projectTable">
  
	
	
  </tbody>
</table>

</div>
</div>
</div>


<div id="projectloderDiv" class="container">
<div class="row">
<div class="col-md-12 text-center p-5">
<img class= "oading-icon m-5"src="{{asset('images/loader.svg')}}">
</div>
</div>
</div>

<div id="projectwrongDiv" class="container d-none ">
<div class="row">
<div class="col-md-12 text-center p-5">
<h3>Something Went Wrong !</h3>
<h5>Data not found</h5>



</div>
</div>
</div>

<div class="modal fade" id="projectdeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body p-5 text-center">
          
          <h4 class='mt-5'>Do You Want To Delete ?</h4>

         <h6 id="projectDeleteId"class='mt-5 d-none'></h6>

          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
        <button data-id=" "  id="projectDeleteConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="projecteditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

    <div class="modal-header">
        <h5 class="modal-title">Update Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-4 text-center">

         
      <h6 id="projectEditId"class='mt-5 d-none'></h6>


     <div id="projectFromId" class="w-100 d-none"> 
       
    <input type="text" id="ProjectImageId" class="form-control mb-4" placeholder="Project Image Link"/>
    <input type="text" id="ProjectNameId" class="form-control mb-4" placeholder="Project  Name"/>
    <input type="text" id="ProjectDescriptionId" class="form-control mb-4" placeholder="Project  Description"/>
    <input type="text" id="ProjectLinkId" class="form-control mb-4" placeholder="Project Link"/>

    </div>
    <img id="projectEditLoderId" class= "oading-icon m-5"src="{{asset('images/loader.svg')}}">
    <h3 id="projectEditWrongId"class="w-100 d-none">Something Went Wrong !</h3>  
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancle</button>
        <button data-id=" "  id="projectEditConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="projectdeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body p-5 text-center">
          
          <h4 class='mt-5'>Do You Want To Delete ?</h4>

         <h6 id="projectDeleteId"class='mt-5'></h6>

          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
        <button data-id=" "  id="projectDeleteConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="projectaddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body p-5 text-center">
          
         <h6 class="mb-4">Add New Project</h6>
     <div id="projectAddId" class="w-100 "> 
     <input type="text" id="projectAddImageId" class="form-control mb-4" placeholder="Project Image Link"/>
    <input type="text" id="projectAddNameId" class="form-control mb-4" placeholder="Project Name"/>
    <input type="text" id="projectAddDescriptionId" class="form-control mb-4" placeholder="Project Description"/>
    <input type="text" id="projectAddLinkId" class="form-control mb-4" placeholder="Project Link"/>



    </div>
    



  
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancle</button>
        <button data-id=" "  id="projectaddNewconfmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
getProjectData();
//custom js////////////////////////////////////

//for service table
function getProjectData() {
  axios.get('/ProjectData')
      .then(function(response) {

          if (response.status == 200) {
              $('#projectmainDiv').removeClass('d-none');
              $('#projectloderDiv').addClass('d-none');

              $('#projectDataTable').DataTable().destroy();
              $('#projectTable').empty();

              var jsonData = response.data;
              $.each(jsonData, function(i, item) {

                  $('<tr>').html(

                      "<td><img class='table-img'src=" + jsonData[i].service_img + "</td>" +
                      "<td>" + jsonData[i].project_name	 + "</td>" +
                      "<td>" + jsonData[i].project_des	 + "</td>" +
                      "<td>" + jsonData[i].project_link		 + "</td>" +

                      "<td><a class='projectEDitBtn' data-id=" + jsonData[i].id + " ><i class='fas fa-edit'></i></a></td>" +

                      "<td><a class='projectDeleteBtn' data-id=" + jsonData[i].id + " ><i class='fas fa-trash-alt'></i></a></td>"


                  ).appendTo('#projectTable');
              });

              //service table delete icon table

              $('.projectDeleteBtn').click(function() {
                  var id = $(this).data('id');
                  $('#projectDeleteId').html(id);
                  $('#projectdeleteModal').modal('show');
              })

              
              
              //servic edit icon click
              
              $('.projectEDitBtn').click(function() {
                var id = $(this).data('id');

                $('#projectEditId').html(id);

                ProjectUpdatesDetails(id);

                $('#projecteditModal').modal('show');
            })

            ///project add new btn clk
          $('#addNewBtnId').click(function() {

            $('#projectaddModal').modal('show');
              });
  

            
           
///////////////////////////////////datata table///////////////////////////////////////////////////
             $('#projectDataTable').DataTable({"order":false});
             $('.dataTables_length').addClass('bs-select');



          } else {
              $('#projectwrongDiv').removeClass('d-none');
              $('#projectloderDiv').addClass('d-none');

          }
      })



      .catch(function(error) {
          $('#wrongDiv').removeClass('d-none');
          $('#loderDiv').addClass('d-none');
      });
}
//project delete yes button

$('#projectDeleteConfirmBtn').click(function() {
  var id = $('#projectDeleteId').html();
projectDelete(id);

});
// project Delete

function projectDelete(deleteId) {
  $('#serviceDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
  axios.post('/deleteProjectData', {
          id: deleteId
      })
      .then(function(response) {
        $('#projectDeleteConfirmBtn').html('Yes');

         if(response.status==200){
          if (response.data == 1) {
            //alert('Success');
            $('#projectdeleteModal').modal('hide');

            toastr.success('Delete Success');
            getProjectData();
        } else {
            //alert('Fail');
            $('#projectdeleteModal').modal('hide');
            toastr.error('Delete Fail');
            getProjectData();

        }

         }else{

          $('#projectdeleteModal').modal('hide');
        toastr.error('Something Went  Wrong !');
         }
      })



      .catch(function(error) {
        $('#projectdeleteModal').modal('hide');
        toastr.error('Something Went  Wrong !');
      });
}

// each Service update details

function ProjectUpdatesDetails(deleteId) {
  axios.post('/getProjectDetails', {
          id: deleteId
      })
      .then(function(response) {
        if (response.status==200) {
          $('#projectFromId').removeClass('d-none');
          $('#projectEditLoderId').addClass('d-none');


          var jsonData = response.data;
        
          $('#ProjectImageId').val(jsonData[0].project_img);
          $('#ProjectNameId').val(jsonData[0].project_name);
          $('#ProjectDescriptionId').val(jsonData[0].project_des);
          $('#ProjectLinkId').val(jsonData[0].project_link);



        } else{
          $('#projectEditWrongId').removeClass('d-none');
          $('#projectEditLoderId').addClass('d-none');

        }
      })



      .catch(function(error) {
        $('#projectEditWrongId').removeClass('d-none');
          $('#projectEditLoderId').addClass('d-none');


      });
}

 //project update yes button

 $('#projectEditConfirmBtn').click(function() {
  var id = $('#projectEditId').html();
  var ProjectImage = $('#ProjectImageId').val();
  var ProjectName= $('#ProjectNameId').val();
  var ProjectDescription = $('#ProjectDescriptionId').val();
  var ProjectLink= $('#ProjectLinkId').val();



  updateProject(id,ProjectImage,ProjectName,ProjectDescription,ProjectLink);
})

//service update

function updateProject(id,ProjectImage,ProjectName,ProjectDescription,ProjectLink) {
  $('#projectEditConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");

   if(ProjectImage.length==0){
    toastr.error('Project image is Empty !');
    $('#projectEditConfirmBtn').html('Save');

   }else if(ProjectName.length==0){
    toastr.error('Project name is Empty !');
    $('#projectEditConfirmBtn').html('Save');

   }else if(ProjectDescription.length==0){
    toastr.error('Project description is Empty !');
    $('#projectEditConfirmBtn').html('Save');

   }else if(ProjectLink.length==0){
    toastr.error('Project Link is Empty !');
    $('#projectEditConfirmBtn').html('Save');

   }else {

    axios.post('/updateProjectData', {
      id:id,
      project_img:ProjectImage,
      project_name:ProjectName,
      project_des	:ProjectDescription,
      project_link:ProjectLink,
  })
  .then(function(response) {
    $('#projectEditConfirmBtn').html('Save');

    if(response.status==200){
      if (response.data == 1) {
       
        $('#projecteditModal').modal('hide');
  
        toastr.success('Update Success');
        getProjectData();
    } else {
        
        $('#projecteditModal').modal('hide');
        toastr.error('Update Fail');
        getProjectData();
  
    }
    
    }else{

      $('#projecteditModal').modal('hide');
      toastr.error('Something Went  Wrong !');


    }

  })



  .catch(function(error) {
    $('#projecteditModal').modal('hide');
      toastr.error('Something Went  Wrong !');


  });
     
  }

}


//service add new btn clk
$('#addNewBtnId').click(function() {
  
  $('#addModal').modal('show');
});

    //project add yes button

    $('#projectaddNewconfmBtn').click(function() {

      var projectAddImage = $('#projectAddImageId').val();
      var projectAddName = $('#projectAddNameId').val();
      var projectAddDescription = $('#projectAddDescriptionId').val();
      var projectAddLink = $('#projectAddLinkId').val();
    
    
    
      projectAdd(projectAddImage,projectAddName,projectAddDescription,projectAddLink);
    })

//service add function


function projectAdd(projectAddImage,projectAddName,projectAddDescription,projectAddLink) {
  $('#projectaddNewconfmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");

   if(projectAddImage.length==0){
    toastr.error('Project image is Empty !');
    $('#projectaddNewconfmBtn').html('Save');

   }else if(projectAddName.length==0){
    toastr.error('Project name is Empty !');
    $('#projectaddNewconfmBtn').html('Save');

   }else if(projectAddDescription.length==0){
    toastr.error('Project description is Empty !');
    $('#projectaddNewconfmBtn').html('Save');

   }
   else if(projectAddLink.length==0){
    toastr.error('Project Link is Empty !');
    $('#projectaddNewconfmBtn').html('Save');

   }else {

    axios.post('/ProjectAdd', { 
      project_img:projectAddImage,
      project_name:projectAddName,
      project_des:projectAddDescription,
      project_link:projectAddLink


  })
  .then(function(response) {
    $('#projectaddNewconfmBtn').html('Save');

    if(response.status==200){
      if (response.data == 1) {
        //alert('Success');
        $('#projectaddModal').modal('hide');
  
        toastr.success('Add Success');
        getProjectData();
    } else {
        //alert('Fail');
        $('#projectaddModal').modal('hide');
        toastr.error('Add Fail');
        getProjectData();
  
    }
    }else{

      $('#projectaddModal').modal('hide');
      toastr.error('Something Went  Wrong !');


    }

  })



  .catch(function(error) {
    $('#projectaddModal').modal('hide');
      toastr.error('Something Went  Wrong !');


  });
     
  }


}



</script>

@endsection