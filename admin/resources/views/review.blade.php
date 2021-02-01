@extends('Layout.app')
@section('title',"Review")

@section('content')
<div id="main-div-review" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5">
            <button id="addNewReviewBtnId" class="btn my-3 btn-sm btn-danger">Add New</button>

            <table id="reviewDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Description</th>
                        <th class="th-sm">Image</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Delete</th>
                    </tr>
                </thead>
                <tbody id="review-table">


                </tbody>
            </table>

        </div>
    </div>
</div>



<div id="loader-div-review" class="container">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <img class="loading-icon" src="{{ asset('images/loader.svg') }}" alt="">
        </div>
    </div>
</div>
<div id="wrong-div-review" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <h3>Something went Wrong!</h3>
        </div>
    </div>
</div>



<div class="modal fade" id="addReviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body  text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <input id="reviewNameId" type="text" id="" class="form-control mb-3" placeholder="Name">
                            <input id="reviewImgId" type="text" id="" class="form-control mb-3" placeholder="Image">

                        </div>
                        <div class="col-md-6">
                            <input id="reviewDesId" type="text" id="" class="form-control mb-3"
                                placeholder="Description">



                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                <button id="reviewAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="updateReviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body  text-center">
                <div id="reviewEditForm" class="container d-none">

                    <div class="row">
                        <div class="col-md-6">
                            <input id="ReviewNameUpdateId" type="text" id="" class="form-control mb-3"
                                placeholder="Name">
                                <input id="ReviewImgUpdateId" type="text" id="" class="form-control mb-3"
                                placeholder="Image">
                        </div>
                        <div class="col-md-6">
                            <input id="ReviewDesUpdateId" type="text" id="" class="form-control mb-3"
                                placeholder="Description">

                        </div>
                    </div>
                </div>


                <img id="reviewEditLoader" class="loading-icon m-5"
                    src="{{ asset('images/loader.svg') }}" alt="">


                <h5 id="reviewEditWrong" class="d-none">Something went Wrong!</h5>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                <button id="ReviewUpdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="deleteReviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center p-3 mt-4 mb-2">
                <h5>Do you want to delete?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">No</button>
                <button id="reviewDeleteConfirm" type="button" class="btn btn-danger btn-sm">Yes</button>
            </div>
        </div>
    </div>
</div>

@endsection


@section('script')
<script>
    getReviewData();

    function getReviewData() {
        axios.get('/getReviewData')

            .then(function (response) {

                if (response.status = 200) {

                    $('#main-div-review').removeClass('d-none');
                    $('#loader-div-review').addClass('d-none');


                    $('#reviewDataTable').DataTable().destroy();
                    $('#review-table').empty();


                    var jsonData = response.data;

                    $.each(jsonData, function (i, item) {
                        $('<tr>').html(

                            `<td class="th-sm">${jsonData[i].name}</td>
                    <td class="th-sm">${jsonData[i].description}</td>
                    <td class="th-sm">${jsonData[i].image}</td>
                    <td class="th-sm"><a class="review-edit-btn" data-id='${jsonData[i].id}'><i class="fas fa-edit"></i></a></td>
                    <td class="th-sm"><a class="review-delete-btn" data-id='${jsonData[i].id}'><i class="fas fa-trash-alt"></i></a></td>`

                        ).appendTo('#review-table');
                    })


                    // Review Table delete Icon click
                    $('.review-delete-btn').click(function () {

                        var id = $(this).data('id');
                        $('#deleteReviewModal').modal('show');

                        $('#reviewDeleteConfirm').data('id', id);

                    })

                    //Review Table edit icon on click
                    $('.review-edit-btn').click(function () {

                        var id = $(this).data('id');
                        reviewUpdateDetails(id);
                        // $('#courseDeleteId').html(id);

                        $('#updateReviewModal').modal('show');
                        $('#ReviewUpdateConfirmBtn').data('id', id);


                    })




                    $('#reviewDataTable').DataTable({
                        "order": false
                    });
                    $('.dataTables_length').addClass('bs-select')




                } else {
                    $('#loader-div-review').addClass('d-none');
                    $('#wrong-div-review').removeClass('d-none');
                }



            }).catch(function (error) {
                $('#loader-div-review').addClass('d-none');
                $('#wrong-div-review').removeClass('d-none');
            })

    }




    // Open Review Add Modal

    $('#addNewReviewBtnId').click(function () {

        $('#addReviewModal').modal('show');
    })




    //Review Add button Action
    $('#reviewAddConfirmBtn').click(function () {

        var review_name = $("#reviewNameId").val();
        var review_desc = $("#reviewDesId").val();
        var review_img = $("#reviewImgId").val();

        reviewAdd(review_name, review_desc, review_img);
    })




    //Review Add Method

    function reviewAdd(review_name, review_desc, review_img) {


        if (review_name.length == 0) {
            toastr.error("Name is Empty!");
        } else if (review_desc.length == 0) {
            toastr.error("Description is Empty!");
        } else if (review_img.length == 0) {
            toastr.error("Image is Empty!");
        } else {
            $("#reviewAddConfirmBtn").html(`<div class="spinner-border spinner-border-sm" role="status"></div>`);

            axios.post('/reviewAdd', {

                review_name: review_name,
                review_desc: review_desc,
                review_img: review_img,


            }).then(function (response) {
                $("#reviewAddConfirmBtn").html("Add New");


                if (response.status == 200) {
                    if (response.data == 1) {
                        $('#addReviewModal').modal('hide');
                        toastr.success('Review Add Success');
                        getReviewData();
                    } else {
                        $('#addReviewModal').modal('hide');
                        toastr.error('Review Add Fail')
                        getReviewData();
                    }
                } else {
                    $('#addReviewModal').modal('hide');
                    toastr.error('Something went wrong!');

                }




            }).catch(function () {
                $('#addReviewModal').modal('hide');
                toastr.error('Something went wrong!');
            })
        }

    }









    //Review Update



    //Each Review Update Details
    function reviewUpdateDetails(detailsId) {


    axios.post('/getReviewDetails', {
        id: detailsId
    })
        .then(function (response) {



            if (response.status == 200) {

                $('#reviewEditLoader').addClass('d-none');
                $('#reviewEditForm').removeClass('d-none');

                var jsonData = response.data;
                $('#ReviewNameUpdateId').val(jsonData[0].name);
                $('#ReviewDesUpdateId').val(jsonData[0].description);
                $('#ReviewImgUpdateId').val(jsonData[0].image);
            } else {
                $('#reviewEditLoader').addClass('d-none');
                $('#reviewEditWrong').removeClass('d-none');
            }


        }).catch(function () {
            $('#reviewEditLoader').addClass('d-none');
            $('#reivewEditWrong').removeClass('d-none');
        })
    }



    //review Update button Action
    $('#ReviewUpdateConfirmBtn').click(function () {

    var review_id = $('#ReviewUpdateConfirmBtn').data('id');
    var review_name = $("#ReviewNameUpdateId").val();
    var review_desc = $("#ReviewDesUpdateId").val();
    var review_img = $("#ReviewImgUpdateId").val();

    reviewUpdate(review_id,review_name,review_desc,review_img);
    })



    //review Update method

    function reviewUpdate(review_id,review_name,review_desc,review_img) {


    if (review_name.length == 0) {
        toastr.error("Name is Empty!");
    }
    else if (review_desc.length == 0) {
        toastr.error("Description is Empty!");
    }else if (review_img.length == 0) {
        toastr.error("Image is Empty!");
    } else {
        $("#ReviewUpdateConfirmBtn").html(`<div class="spinner-border spinner-border-sm" role="status"></div>`);

        axios.post('/reviewUpdate', {
            review_id: review_id,
            review_name: review_name,
            review_desc: review_desc,
            review_img: review_img
        }).then(function (response) {
            $("#ReviewUpdateConfirmBtn").html("Save");


            if (response.status == 200) {
                if (response.data == 1) {
                    $('#updateReviewModal').modal('hide');
                    toastr.success('Review Update Success');
                    getReviewData();
                } else {
                    $('#updateReviewModal').modal('hide');
                    toastr.error('Review Update Fail')
                    getReviewData();
                }
            } else {
                $('#updateReviewModal').modal('hide');
                toastr.error('Something went wrong!');

            }




        }).catch(function () {
            $('#updateReviewModal').modal('hide');
            toastr.error('Something went wrong!');
        })
    }

    }






    // Review Delete

    $('#reviewDeleteConfirm').click(function () {

        var id = $('#reviewDeleteConfirm').data('id');

        reviewDelete(id);
    })



    //Review Delete

    function reviewDelete(deleteId) {

        var id = $("#reviewDeleteConfirm").html(
        `<div class="spinner-border spinner-border-sm" role="status"></div>`); //Animation...


        axios.post('/reviewDelete', {
                id: deleteId
            })
            .then(function (response) {
                var id = $("#reviewDeleteConfirm").html("Yes");


                if (response.status == 200) {
                    if (response.data == 1) {
                        $('#deleteReviewModal').modal('hide');
                        getReviewData();
                        toastr.success('Delete Success');
                    } else {
                        $('#deleteReviewModal').modal('hide');
                        getReviewData();
                        toastr.error('Delete Fail')

                    }
                } else {
                    getReviewData();
                    toastr.error('Something went wrong!')
                    $('#deleteReviewModal').modal('hide');

                }

            }).catch(function () {
                toastr.error('Something went wrong!')
                $('#deleteReviewModal').modal('hide');

            })
    }

</script>
@endsection
