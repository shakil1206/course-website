@extends('Layout.app')
@section('title',"Photo Gallery")

@section('custom-css')
<link rel="stylesheet" href="{{ asset('css/image-gallery.css') }}">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 pt-5">
            <button id="addNewPhotoBtnId" class="btn my-3 btn-sm btn-danger">Add New</button>

        </div>
    </div>
</div>

<div class="modal fade" id="addPhotosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Photos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body  text-center">
                <div class="container">
                    <input class="form-control" type="file" id="imgInput">
                    <img class="w-100 mt-3" src="" id="imgPreview" alt="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                <button id="savePhoto" type="button" class="btn  btn-sm  btn-danger">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Photo Gallery</h1><hr>
        </div>
    </div>
</div>



<div class="container-fluid">
   <div class="row justify-content-center">
        <div class="card-columns">

        </div>
        <button id="loadMoreBtnId" class="btn btn-primary text-center">Load More</button>
   </div>

</div>







@endsection



@section('script')
<script>
    $('#addNewPhotoBtnId').click(function () {
        $('#addPhotosModal').modal('show');
    })


    $('#imgInput').change(function () {
        var reader = new FileReader();
        reader.readAsDataURL(this.files[0]);

        reader.onload = function (event) {
            var ImgSource = event.target.result;
            $("#imgPreview").attr('src', ImgSource);
        }
    })


    $('#savePhoto').on('click', function () {

        $('#savePhoto').html('<div class="spinner-border spinner-border-sm" role="status"></div>');

        var photoFile = $('#imgInput').prop('files')[0];

        var formData = new FormData()
        formData.append('photo', photoFile);

        axios.post('/photoUpload', formData)
            .then(function (response) {

                if (response.status == 200 && response.data == 1) {
                    toastr.success('Photo Upload Success!');
                    $('#savePhoto').html('Save');
                    $('#addPhotosModal').modal('hide');

                $('.card-columns').empty();
                loadPhoto();
                } else {
                    toastr.error('Photo Upload Faild');
                    $('#savePhoto').html('Save');

                }

            }).catch(function (error) {
                toastr.error('Photo Upload Faild');
                $('#savePhoto').html('Save');

            })
    })




    // $(document).ready(function () {
    //     $("img").click(function () {
    //         var t = $(this).attr("src");
    //         $(".modal-body").html("<img src='" + t + "' class='modal-img'>");
    //         $("#myModal").modal();
    //     });

    //     $("video").click(function () {
    //         var v = $("video > source");
    //         var t = v.attr("src");
    //         $(".modal-body").html("<video class='model-vid' controls><source src='" + t +
    //             "' type='video/mp4'></source></video>");
    //         $("#myModal").modal();
    //     });
    // });
    //EOF Document.ready


    loadPhoto();


    function loadPhoto(){

        axios.get('/photoJson')
        .then(function(response){
            // console.log(response.data);

            $.each(response.data, function (i, item) {
                    $('<div class="card">').html(
                        `<img data-id="${item['id']}" src="${item['location']}" class="card-img-top" alt="Image Name"><button data-id="${item['id']}" data-photo="${item['location']}" class="btn image-delete-btn btn-sm"><i class="fas fa-trash-alt"></i></button>`
                    ).appendTo('.card-columns');
                })



                $('.image-delete-btn').on('click',function(event){
                    event.preventDefault();

                    let id = $(this).data('id');
                    let photo = $(this).data('photo');

                    photoDelete(id, photo);
                })


        }).catch(function(error){

        })



    }


    let ImgId=0;
    function loadById(firstImageId, loadMoreBtn){

        ImgId = ImgId + 2;

        let LastImageId = firstImageId + ImgId;

        loadMoreBtn.html(`<div class="spinner-border spinner-border-sm" role="status"></div>`);


        let url = '/photoJsonById/'+LastImageId;
        // alert(url);


        axios.get(url)
        .then(function(response){
            // console.log(response.data);

            $.each(response.data, function (i, item) {
                    $('<div class="card">').html(
                        `<img data-id="${item['id']}" src="${item['location']}" class="card-img-top" alt="Image Name"><button data-id="${item['id']}" data-photo="${item['location']}" class="btn image-delete-btn btn-sm"><i class="fas fa-trash-alt"></i></button>`
                    ).appendTo('.card-columns');
                })


                loadMoreBtn.html(`Load More`);


                $('.image-delete-btn').on('click',function(event){
                    event.preventDefault();

                    let id = $(this).data('id');
                    let photo = $(this).data('photo');

                    // alert(id+photo)
                    photoDelete(id, photo);
                })





        }).catch(function(error){

        })



    }


    $("#loadMoreBtnId").on('click',function(){
        let loadMoreBtn = $(this);
        var firstImageId = $(this).closest('div').find('img').data('id');
        loadById(firstImageId,loadMoreBtn );
    })





    function photoDelete(id, photo){

        let url = '/photoDelete';
        let myFormData = new FormData();
        myFormData.append('OldPhotoUrl',photo);
        myFormData.append('id',id);

        axios.post(url, myFormData).then(function(response){

            if(response.status==200 && response.data==1){
                toastr.success('Photo Delete Success!');
                // $('.card-columns').empty();
                // loadPhoto();
                window.location.href='/photo';
                ImgId=0;

            }else{
                toastr.error('Photo delete Faild');

            }

        }).catch(function(error){
                toastr.error('Photo delete Faild');

        })
    }





</script>
@endsection
