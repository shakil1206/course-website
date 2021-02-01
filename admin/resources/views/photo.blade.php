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

<div id="gallery" class="container-fluid">
    <img src="http://127.0.0.1:8001/storage/iIKay7xLdmfgX2Sw7VAHN7w3TvuyNjXSz8Xvnv9h.svg" class="card img-responsive">
    <img src="http://127.0.0.1:8001/storage/YtXmwkt1kRBbOuZSjai4RkWHmkmYZVGtXwVCOnih.jpeg" class="card img-responsive">
    <img src="http://127.0.0.1:8001/storage/Rjbzw8oaBW2RA60uwTmBnPDJqgvD4VUpPGdYrDBK.jpeg" class="card img-responsive">
    <img src="http://127.0.0.1:8001/storage/rbtOUUr4UD8Zrlgktt2gZTeAW6Epqo6JhL2ywyCS.png" class="card img-responsive">
    <img src="http://127.0.0.1:8001/storage/znHIsQujjTIttcGYfo5f2eWU8lqVvcs21GmBovPO.svg" class="card img-responsive">
    <img src="http://127.0.0.1:8001/storage/J5rcbmipYKTmiPUSo4447vLarzs5KeVbp25jEu8F.jpeg" class="card img-responsive">

</div>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
            </div>
        </div>

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

                } else {
                    toastr.error('Photo Upload Faild');
                    $('#savePhoto').html('Save');

                }

            }).catch(function (error) {
                toastr.error('Photo Upload Faild');
                $('#savePhoto').html('Save');

            })
    })




    $(document).ready(function () {
        $("img").click(function () {
            var t = $(this).attr("src");
            $(".modal-body").html("<img src='" + t + "' class='modal-img'>");
            $("#myModal").modal();
        });

        $("video").click(function () {
            var v = $("video > source");
            var t = v.attr("src");
            $(".modal-body").html("<video class='model-vid' controls><source src='" + t +
                "' type='video/mp4'></source></video>");
            $("#myModal").modal();
        });
    }); //EOF Document.ready

</script>
@endsection
