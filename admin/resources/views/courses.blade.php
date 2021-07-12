@extends('Layout.app')
@section('title')
Courses
@endsection

@section('content')

<div id="mainDivCourse" class="container d-none">
<div class="row">
<div class="col-md-12 p-5">

<button id="addCourseNewBtnId"class="btn my-3 btn-sm btn-danger">Add New</button>

<table id="courseDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
	  <th class="th-sm">Name</th>
	  <th class="th-sm">Fee</th>
      <th class="th-sm">Class</th>
      <th class="th-sm">Enroll</th>
      <th class="th-sm">Details</th>
	  <th class="th-sm">Edit</th>
	  <th class="th-sm">Delete</th>
    </tr>
  </thead>
  <tbody id="courseTable">
  <!--
	<tr>
  <th class="th-sm">Name</th>
  <th class="th-sm">2000</th>
  <th class="th-sm">150</th>
  <th class="th-sm">300</th>
  <th class="th-sm"><a href="" ><i class="far fa-eye"></i></a></th>
	<th class="th-sm"><a href="" ><i class="fas fa-edit"></i></a></th>
	<th class="th-sm"><a href="" ><i class="fas fa-trash-alt"></i></a></th>
    
	-->
  </tbody>
</table>

</div>
</div>
</div>

<div id="loderDivCourse" class="container">
<div class="row">
<div class="col-md-12 text-center p-5">
<img class= "oading-icon m-5"src="{{asset('images/loader.svg')}}">
</div>
</div>
</div>

<div id="wrongDivCourse" class="container  d-none">
<div class="row">
<div class="col-md-12 text-center p-5">
<h3>Something Went Wrong !</h3>
<h5>Data not found</h5>



</div>
</div>
</div>

<div class="modal fade" id="deleteCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body p-5 text-center">
          
          <h4 class='mt-5'>Do You Want To Delete ?</h4>

         <h6 id="courseDeleteId"class='mt-5 d-none'></h6>

          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
        <button data-id=" "  id="courseDeleteConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>

<!-- /////////////////////////////////////////////-->

<div class="modal fade" id="addCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Add New Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body  text-center">
       <div class="container">
       	<div class="row">
       		<div class="col-md-6">
             	<input id="CourseNameId" type="text" id="" class="form-control mb-3" placeholder="Course Name">
          	 	<input id="CourseDesId" type="text" id="" class="form-control mb-3" placeholder="Course Description">
    		 	<input id="CourseFeeId" type="text" id="" class="form-control mb-3" placeholder="Course Fee">
     			<input id="CourseEnrollId" type="text" id="" class="form-control mb-3" placeholder="Total Enroll">
       		</div>
       		<div class="col-md-6">
     			<input id="CourseClassId" type="text" id="" class="form-control mb-3" placeholder="Total Class">      
     			<input id="CourseLinkId" type="text" id="" class="form-control mb-3" placeholder="Course Link">
     			<input id="CourseImgId" type="text" id="" class="form-control mb-3" placeholder="Course Image">
       		</div>
       	</div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button  id="CourseAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>


<!-- /////////////////////////////////////////////-->

<div class="modal fade" id="updateCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Update Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body  text-center">

      <h6 id="courseEditId"class='mt-5 d-none'></h6>

       <div class="container d-none" id="courseEditForm">
       	<div class="row">
       		<div class="col-md-6">
             	<input id="CourseNameUpdateId" type="text" id="" class="form-control mb-3" placeholder="Course Name">
          	 	<input id="CourseDesUpdateId" type="text" id="" class="form-control mb-3" placeholder="Course Description">
    		 	<input id="CourseFeeUpdateId" type="text" id="" class="form-control mb-3" placeholder="Course Fee">
     			<input id="CourseEnrollUpdateId" type="text" id="" class="form-control mb-3" placeholder="Total Enroll">
       		</div>
       		<div class="col-md-6">
     			<input id="CourseClassUpdateId" type="text" id="" class="form-control mb-3" placeholder="Total Class">      
     			<input id="CourseLinkUpdateId" type="text" id="" class="form-control mb-3" placeholder="Course Link">
     			<input id="CourseImgUpdateId" type="text" id="" class="form-control mb-3" placeholder="Course Image">
       		</div>
       	</div>
       </div>
      </div>
      
    <img id="courseEditLoderId" class= "oading-icon m-5"src="{{asset('images/loader.svg')}}">
    <h3 id="courseEditWrongId"class="w-100 d-none">Something Went Wrong !</h3>
        
      
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button  id="CourseEditConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- /////////////////////////////////////////////-->

<div class="modal fade" id="detailsCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Course Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body  text-center">

      <h6 id="detailsCourseId"class='mt-5 d-none'></h6>

       <div class="container d-none " id="courseDetailsForm">
       	<div class="row">
       		<div class="col-md-6">
             	<input id="CourseNameDetailsId" type="text" id="" class="form-control mb-3" placeholder="Course Name">
          	 	<input id="CourseDesDetailsId" type="text" id="" class="form-control mb-3" placeholder="Course Description">
    		 	<input id="CourseFeeDetailsId" type="text" id="" class="form-control mb-3" placeholder="Course Fee">
     			<input id="CourseEnrollDetailsId" type="text" id="" class="form-control mb-3" placeholder="Total Enroll">
       		</div>
       		<div class="col-md-6">
     			<input id="CourseClassDetailsId" type="text" id="" class="form-control mb-3" placeholder="Total Class">      
     			<input id="CourseLinkDetailsId" type="text" id="" class="form-control mb-3" placeholder="Course Link">
     			<input id="CourseImageDetailsId" type="text" id="" class="form-control mb-3" placeholder="Course Image">
       		</div>
       	</div>
       </div>
      </div>
      
    <img id="courseDetailsLoderId" class= "oading-icon m-5 d-none"src="{{asset('images/loader.svg')}}">
    <h3 id="courseDetailsWrongId"class="w-100 d-none">Something Went Wrong !</h3>
        
      
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
getCourseData();
//for course table
function getCourseData() {
  axios.get('/coursesData')
      .then(function(response) {

          if (response.status == 200) {
              $('#mainDivCourse').removeClass('d-none');
              $('#loderDivCourse').addClass('d-none');

              $('#courseDataTable').DataTable().destroy();
              $('#courseTable').empty();

              var jsonData = response.data;
              $.each(jsonData,function(i, item) {

                  $('<tr>').html(

                      "<td>" + jsonData[i].course_name + "</td>" +
                      "<td>" + jsonData[i].course_fee + "</td>" +
                      "<td>" + jsonData[i].course_totalclass + "</td>" +
                      "<td>" + jsonData[i].course_totalenroll	+ "</td>" +

                      "<td><a class='courseViewDetailsBtn' data-id=" + jsonData[i].id + " ><i class='far fa-eye'></i></a></td>" +

                      "<td><a class='courseEDitBtn' data-id=" + jsonData[i].id + " ><i class='fas fa-edit'></i></a></td>" +

                      "<td><a class='courseDeleteBtn' data-id=" + jsonData[i].id + " ><i class='fas fa-trash-alt'></i></a></td>"


                  ).appendTo('#courseTable');
              });
               
               //course table delete icon table
               $('.courseDeleteBtn').click(function() {
                var id = $(this).data('id');
                $('#courseDeleteId').html(id);
                $('#deleteCourseModal').modal('show');
            });

            //course table courseViewDetailsBtn icon table/////////////////////////////////////
            $('.courseViewDetailsBtn').click(function() {
                var id = $(this).data('id');
                courseDetails(id);
                $('#detailsCourseId').html(id);
                $('#detailsCourseModal').modal('show');
            });

////////////////////////////////////////////////////////////////////////////////////
             
            //course edit icon click
            
            $('.courseEDitBtn').click(function() {
              var id = $(this).data('id');
              courseUpdatesDetails(id);
              $('#courseEditId').html(id);
              $('#updateCourseModal').modal('show');
          })
            
            ///////////////////////////////////datata table///////////////////////////////////////////////////
           $('#courseDataTable').DataTable({"order":false});
           $('.dataTables_length').addClass('bs-select');
            
          

          } else {
              $('#wrongDivCourse').removeClass('d-none');
              $('#loderDivCourse').addClass('d-none');

          }
      })



      .catch(function(error) {
          $('#wrongDivCourse').removeClass('d-none');
          $('#loderDivCourse').addClass('d-none');
      });
  }



//course delete yes button

$('#courseDeleteConfirmBtn').click(function() {
  var id = $('#courseDeleteId').html();
  courseDelete(id);

});

// course Delete

function courseDelete(deleteId) {
  $('#courseDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
  axios.post('/deleteCoursesData', {
          id: deleteId
      })
      .then(function(response) {
        $('#courseDeleteConfirmBtn').html('Yes');

         if(response.status==200){
          if (response.data == 1) {
            //alert('Success');
            $('#deleteCourseModal').modal('hide');

            toastr.success('Delete Success');
            getCourseData();
        } else {
            //alert('Fail');
            $('#deleteCourseModal').modal('hide');
            toastr.error('Delete Fail');
            getCourseData();

        }

         }else{

          $('#deleteCourseModal').modal('hide');
        toastr.error('Something Went  Wrong !');
         }
      })



      .catch(function(error) {
        $('#deleteCourseModal').modal('hide');
       toastr.error('Something Went  Wrong !');
      });
}



//course add new btn clk
$('#addCourseNewBtnId').click(function() {

$('#addCourseModal').modal('show');
});

//course add yes button

$('#CourseAddConfirmBtn').click(function() {

var CourseName = $('#CourseNameId').val();
var CourseDes = $('#CourseDesId').val();
var CourseFee= $('#CourseFeeId').val();
var CourseEnroll = $('#CourseEnrollId').val();
var CourseClass = $('#CourseClassId').val();
var CourseLink = $('#CourseLinkId').val();
var CourseImg = $('#CourseImgId').val();



courseAdd(CourseName,CourseDes,CourseFee,CourseEnroll,CourseClass,
  CourseLink,CourseImg);
})


//Course add function

function courseAdd(CourseName,CourseDes,CourseFee,CourseEnroll,CourseClass,CourseLink,CourseImg) {
$('#CourseAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
if(CourseName.length==0){
  toastr.error('Course name is Empty !');
  $('#CourseAddConfirmBtn').html('Save');

 }else if(CourseDes.length==0){
  toastr.error('Course description is Empty !');

  $('#CourseAddConfirmBtn').html('Save');

 }else if(CourseFee.length==0){
  toastr.error('Course fee is Empty !');

  $('#CourseAddConfirmBtn').html('Save');

}else if(CourseEnroll.length==0){
  toastr.error('Course total-enroll is Empty !');

  $('#CourseAddConfirmBtn').html('Save');

 }else if(CourseClass.length==0){
  toastr.error('Course total class is Empty !');
  $('#CourseAddConfirmBtn').html('Save');


}else if(CourseLink.length==0){
  toastr.error('Course link is Empty !');

  $('#CourseAddConfirmBtn').html('Save');


 }else if(CourseImg.length==0){
  toastr.error('Course image is Empty !');
  $('#CourseAddConfirmBtn').html('Save');


 }else {

 axios.post('/coursesAdd', {

    course_name:CourseName,
     course_des:CourseDes,
     course_fee:CourseFee,
    course_totalenroll:CourseEnroll,
    course_totalclass:CourseClass,
   course_link:CourseLink,
   course_img:CourseImg

})
.then(function(response) {
  $('#CourseAddConfirmBtn').html('Save');

  if(response.status==200){
    if (response.data == 1) {
      //alert('Success');
      $('#addCourseModal').modal('hide');

      toastr.success('Add Success');
      getCourseData();
  } else {
      //alert('Fail');
      $('#addCourseModal').modal('hide');
      toastr.error('Add Fail');
      getCourseData();

  }
  }else{

    $('#addCourseModal').modal('hide');
    toastr.error('Something Went  Wrong !');


  }

})



.catch(function(error) {
  $('#addCourseModal').modal('hide');
    toastr.error('Something Went  Wrong !');


});
   
}

}

// each course update details/////////////////////////////lllllllllllllllllllllllllllll/////////////////////////////

function courseUpdatesDetails(updateId) {
axios.post('/getcoursesDetails', {
        id: updateId
    })
    .then(function(response) {
      if (response.status==200) {
        $('#courseEditForm').removeClass('d-none');
        $('#courseEditLoderId').addClass('d-none');


        var jsonData = response.data;
      
        $('#CourseNameUpdateId').val(jsonData[0].course_name);
        $('#CourseDesUpdateId').val(jsonData[0].course_des);
        $('#CourseFeeUpdateId').val(jsonData[0].course_fee);
        $('#CourseEnrollUpdateId').val(jsonData[0].course_totalenroll);
        $('#CourseClassUpdateId').val(jsonData[0].course_totalclass);
        $('#CourseLinkUpdateId').val(jsonData[0].course_link);
        $('#CourseImgUpdateId').val(jsonData[0].course_img);



      } else{
        $('#courseEditWrongId').removeClass('d-none');
        $('#courseEditLoderId').addClass('d-none');

      }
    })



    .catch(function(error) {
      $('#courseEditWrongId').removeClass('d-none');
      $('#courseEditLoderId').addClass('d-none');

    });
}

//////////////////////////////////////////////////////

        
//course update yes button///////////////////////////////////

$('#CourseEditConfirmBtn').click(function() {
var CourseId = $('#courseEditId').html();
var CourseName = $('#CourseNameUpdateId').val();
var CourseDes = $('#CourseDesUpdateId').val();
var CourseFee = $('#CourseFeeUpdateId').val();

var CourseEnroll = $('#CourseEnrollUpdateId').val();
var CourseClass = $('#CourseClassUpdateId').val();
var CourseLink = $('#CourseLinkUpdateId').val();
var CourseImg = $('#CourseImgUpdateId').val();




updateCourse(CourseId,CourseName,CourseDes,CourseFee,CourseEnroll,CourseClass,CourseLink,
  CourseImg );
})

//course details


function updateCourse(CourseId,CourseName,CourseDes,CourseFee,CourseEnroll,CourseClass,CourseLink,
CourseImg ) {
$('#CourseEditConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");

 if(CourseName.length==0){
  toastr.error('Course Name is Empty !');
  $('#CourseEditConfirmBtn').html('Save');

 }else if(CourseDes.length==0){
  toastr.error('Course description is Empty !');
  $('#CourseEditConfirmBtn').html('Save');

 }else if(CourseFee.length==0){
  toastr.error('Course Fee is Empty !');
  $('#CourseEditConfirmBtn').html('Save');

}else if(CourseEnroll.length==0){
  toastr.error('Course Enroll is Empty !');
  $('#CourseEditConfirmBtn').html('Save');

 }else if(CourseClass.length==0){
  toastr.error('Course Class is Empty !');
  $('#CourseEditConfirmBtn').html('Save');

}else if(CourseLink.length==0){
  toastr.error('Course Link is Empty !');
  $('#CourseEditConfirmBtn').html('Save');

}else if(CourseImg.length==0){
  toastr.error('Course Image is Empty !');
  $('#CourseEditConfirmBtn').html('Save');

 
 }else {



  axios.post('/updatecoursesData', {
    id:CourseId,
    course_name:CourseName,
    course_des:CourseDes,
    course_fee:CourseFee,
    course_totalenroll:CourseEnroll,
    course_totalclass:CourseClass,
    course_link:CourseLink,
    course_img:CourseImg

})
.then(function(response) {
  $('#CourseEditConfirmBtn').html('Save');

  if(response.status==200){
    if (response.data == 1) {
     
      $('#updateCourseModal').modal('hide');

      toastr.success('Update Success');
      getCourseData();
  } else {
      
      $('#updateCourseModal').modal('hide');
      toastr.error('Update Fail');
      getCourseData();

  }
  }else{

    $('#updateCourseModal').modal('hide');
    toastr.error('Something Went  Wrong !');


  }

})



.catch(function(error) {
  $('#updateCourseModal').modal('hide');
    toastr.error('Something Went  Wrong !');


});
   
}

}

// each course  details/////////////////////////////lllllllllllllllllllllllllllll/////////////////////////////

function courseDetails(courseDetailsId) {
  axios.post('/detailsCourses', {
          id: courseDetailsId
      })
      .then(function(response) {
        if (response.status==200) {
         $('#courseDetailsForm').removeClass('d-none');
          $('#courseDetailsLoderId').addClass('d-none');
  
  
          var jsonData = response.data;

          $('#CourseNameDetailsId').val(jsonData[0].course_name);
          $('#CourseDesDetailsId').val(jsonData[0].course_des);
          $('#CourseFeeDetailsId').val(jsonData[0].course_fee);
          $('#CourseEnrollDetailsId').val(jsonData[0].course_totalenroll);
          $('#CourseClassDetailsId').val(jsonData[0].course_totalclass);
          $('#CourseLinkDetailsId').val(jsonData[0].course_link);
          $('#CourseImageDetailsId').val(jsonData[0].course_img);

  
  
  
        } else{
         $('#courseDetailsWrongId').removeClass('d-none');
          $('#courseDetailsLoderId').addClass('d-none');
  
       }
      })
  
  
  
      .catch(function(error) {
        $('#courseDetailsWrongId').removeClass('d-none');
          $('#courseDetailsLoderId').addClass('d-none');
  
      });
  }
  
  //////////////////////////////////////////////////////
  



</script>

@endsection