$('#imgInput').change(function () {
    var reader=new FileReader();
    reader.readAsDataURL(this.files[0]);
    reader.onload=function (event) {
       var ImgSource= event.target.result;
        $('#imgPreview').attr('src',ImgSource)
    }
})


$('#SavePhoto').on('click',function () {
    $('#SavePhoto').html("<div class='spinner-border spinner-border-sm' role='status'></div>")
   var PhotoFile= $('#imgInput').prop('files')[0];
   var formData=new FormData();
   formData.append('photo',PhotoFile);
   axios.post("/PhotoUpload",formData).then(function (response) {
       //alert(response.data);
        if(response.status==200 && response.data==1){
           $('#PhotoModal').modal('hide');
           $('#SavePhoto').html('Save');
           toastr.success('Photo Upload Success');
       }
       else{
           $('#PhotoModal').modal('hide');
           toastr.error('Photo Upload Fail');
       }
   }).catch(function (error) {
       $('#PhotoModal').modal('hide');
       toastr.error('Photo Upload Fail');
       $('#SavePhoto').html('Save');
       //alert(error);

  })
});


 LoadPhoto();



function LoadPhoto() {
    let URL="/PhotoJSON";
    axios.get(URL).then(function (response) {	

        $.each(response.data, function(i, item) {
            $("<div class='col-md-4 p-1'>").html(
                "<img data-id="+ item['id']+" class='imgOnRow' src=" + item['location'] + ">"+
                "<button data-id="+ item['id']+" data-photo="+ item['location']+" class='btn deletePhoto btn-sm'> Delete</button>"+
                "<button data-id="+ item['id']+" data-photo="+ item['location']+" class='btn PhotoUrl btn-sm'> Photo Url</button>"

            ).appendTo('#photoRow');
        })


        $('.deletePhoto').on('click',function (event) {
            let id=$(this).data('id');
            let photo=$(this).data('photo');

            PhotoDelete(photo,id);

            event.preventDefault();
        })


        $('.PhotoUrl').click(function() {
            var id = $(this).data('id');
            $('#photoId').html(id);
            PhotoDetails(id);
            $('#urlModal').modal('show');

        })

    }).catch(function (error) {

    })
}


    var  ImgID=0;
function LoadByID(FirstImgID,loadMoreBtn){
    ImgID=ImgID+3;
    let PhotoID=ImgID+FirstImgID;
    let URL="/PhotoJSONByID/"+PhotoID

     loadMoreBtn.html("<div class='spinner-border spinner-border-sm' role='status'></div>")
     axios.get(URL).then(function (response) {
         loadMoreBtn.html("Load More");
        $.each(response.data, function(i, item) {
            $("<div class='col-md-4 p-1'>").html(
                "<img data-id="+ item['id']+" class='imgOnRow' src=" + item['location'] + ">"+
                "<button data-id="+ item['id']+" data-photo="+ item['location']+" class='btn deletePhoto btn-sm'> Delete</button>"+
                "<button data-id="+ item['id']+" data-photo="+ item['location']+" class='btn PhotoUrl btn-sm'> Photo Url</button>"

            ).appendTo('#photoRow');
        })

        $('.deletePhoto').on('click',function (event) {
            let id=$(this).data('id');
            let photo=$(this).data('photo');

            PhotoDelete(photo,id);

            event.preventDefault();
        })

        $('.PhotoUrl').click(function() {
            var id = $(this).data('id');
            $('#photoId').html(id);
            PhotoDetails(id);
            $('#urlModal').modal('show');

        })

    }).catch(function (error) {

    })

}

$('#LoadMoreBtn').on('click',function () {
   let loadMoreBtn=$(this);
   let FirstImgID= $(this).closest('div').find('img').data('id');
   LoadByID(FirstImgID,loadMoreBtn);
})



function PhotoDelete(OldPhotoURL,id) {
        let URL="/PhotoDelete";
        let MyFormData=new FormData();
        MyFormData.append('OldPhotoURL',OldPhotoURL);
        MyFormData.append('id',id);
        axios.post(URL,MyFormData).then(function (response) {
            if(response.status==200 && response.data==1){
                toastr.success('Photo Delete Success');
                window.location.href="/Photo";

            }
            else{
                toastr.error('Delete Fail Try Again');
            }
        }).catch(function () {
            toastr.error('Delete Fail Try Again');
        })

}

 // Photo Details 
 function PhotoDetails(detailsID) {
    axios.post('/getPhotoDetails', {
            id: detailsID
        })
        .then(function(response) {

                if(response.status==200){
                    $('#photoFromId').removeClass('d-none');
                    $('#photoLoderId').addClass('d-none');

                    var jsonData = response.data;
                    $('#photoUrlId').val(jsonData[0].location);
                   
                }
                else{
                   $('#photoLoderId').addClass('d-none');
                   $('#photoWrongId').removeClass('d-none');
                }
    })
    .catch(function(error) {
        $('#photoLoderId').addClass('d-none');
        $('#photoWrongId').removeClass('d-none');
   });

}




