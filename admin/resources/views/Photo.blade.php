@extends('Layout.app')
@section('title')
Photo Gallery
@endsection

@section('content')
<div class="container-fluid m-0 ">
        <div class="row">
            <div class="col-md-12">
                <button data-toggle="modal" data-target="#PhotoModal" id="addNewPhotoBtnId" class="btn my-3 btn-sm btn-danger">Add New </button>
            </div>
        </div>
        <div class="row " id="photoRow">



        </div>
        <button class="btn btn-sm btn-primary" id="LoadMoreBtn"> Load More </button>

    </div>



    <!-- Modal -->
    <div class="modal fade" id="PhotoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Photo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input class="form-control" id="imgInput" type="file">
                    <img class="imgPreview mt-3" id="imgPreview" src="{{asset('images/default-image.png')}}">


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                    <button id="SavePhoto" type="button" class="btn btn-sm btn-success">Save</button>
                </div>
            </div>
        </div>
    </div>

   <!-- URL Modal -->

    <div class="modal fade" id="urlModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

    <div class="modal-header">
        <h5 class="modal-title">Photo Url</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-4 text-center">

         
      <h6 id="photoId"class='mt-5 '></h6>



     <div id="photoFromId" class="w-100 d-none">


    <input type="text" id="photoUrlId" class="form-control mb-4" placeholder="Photo Image Link"/>
    
    </div>
    <img id="photoLoderId" class= "oading-icon m-5"src="{{asset('images/loader.svg')}}">
    <h3 id="photoWrongId"class="w-100 d-none">Something Went Wrong !</h3>



  
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancle</button>
      </div>
    </div>
  </div>
</div>



@endsection
@section('script')
    <script type="text/javascript">


       //LoadPhoto();
       
    

</script>

@endsection