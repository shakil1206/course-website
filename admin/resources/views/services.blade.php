@extends('Layout.app')

@section('content')




<div id="main-div" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5">
            <button id="addNewBtnId" class="btn my-3 btn-sm btn-danger">Add New</button>


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
                <tbody id="service_table">

                </tbody>
            </table>

        </div>
    </div>
</div>

<div id="loader-div" class="container">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <img class="loading-icon" src="{{ asset('images/loader.svg') }}" alt="">
        </div>
    </div>
</div>
<div id="wrong-div" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <h3>Something went Wrong!</h3>
        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center p-3 mt-4 mb-2">
                <h5>Do you want to delete?</h5>
                <h6 id="serviceDeleteId" class="mt-5 d-none"></h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">No</button>
                <button id="serviceDeleteConfirm" type="button" class="btn btn-danger btn-sm">Yes</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center p-3 mt-4 mb-2">
                <h5>Edit your services</h5>
                <h5 id="serviceEditId" class="mb-2 d-none"></h5>

                <div id="serviceEditForm" class="d-none">
                    <input id="serviceNameId" type="text" class="form-control mb-4" placeholder="Service Name">
                    <input id="serviceDescId" type="text" class="form-control mb-4" placeholder="Service Description">
                    <input id="serviceImgId" type="text" class="form-control mb-4" placeholder="Service Image Link">

                </div>

                <div id="serviceEditLoader" class="row">
                    <div class="col-md-12 p-5 text-center">
                        <img class="loading-icon" src="{{ asset('images/loader.svg') }}" alt="">
                    </div>
                </div>

                <div id="serviceEditWrong" class="row d-none">
                    <div class="col-md-12 p-5 text-center">
                        <h3>Something went Wrong!</h3>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Cancel</button>
                <button id="serviceEditConfirmBtn" type="button" class="btn btn-danger btn-sm">Save</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center p-3 mt-4 mb-2">
            <div id="serviceAddForm">
                <h6 class="mb-4">Add New Service</h6>
                    <input id="serviceNameAddId" type="text" class="form-control mb-4" placeholder="Service Name">
                    <input id="serviceDescAddId" type="text" class="form-control mb-4" placeholder="Service Description">
                    <input id="serviceImgAddId" type="text" class="form-control mb-4" placeholder="Service Image Link">

            </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Cancel</button>
                <button id="addNewConfirmBtnId" type="button" class="btn btn-danger btn-sm">Add New</button>
            </div>
        </div>
    </div>
</div>




@endsection


@section('script')
<script>
    getServicesData();


//For Services Table

function getServicesData() {
    axios.get('/getServceData')

        .then(function (response) {

            if (response.status = 200) {

                $('#main-div').removeClass('d-none');
                $('#loader-div').addClass('d-none');

                $('#serviceDataTable').DataTable().destroy();

                $('#service_table').empty();


                var jsonData = response.data;

                $.each(jsonData, function (i, item) {
                    $('<tr>').html(
                        "<td><img class='table-img' src=" + jsonData[i].service_img + "> </td>" +
                        "<td>" + jsonData[i].serivce_name + "</td>" +
                        "<td>" + jsonData[i].service_des + "</td>" +
                        "<td> <a class='service-edit-btn' data-id=" + jsonData[i].id + " data-toggle='modal' data-target='#editModal'><i class='fas fa-edit'></i></a> </td>" +
                        "<td> <a class='service-delete-btn'  data-id=" + jsonData[i].id + " data-toggle='modal' data-target='#deleteModal'><i class='fas fa-trash-alt'></i></a> </td>"

                    ).appendTo('#service_table');
                })


                //Services Table delete Icon click

                $('.service-delete-btn').click(function () {

                    var id = $(this).data('id');
                    $('#serviceDeleteId').html(id);

                })



                // Service Table Edit icon click
                $('.service-edit-btn').click(function () {
                    var id = $(this).data('id');
                    $('#serviceEditId').html(id);

                    serviceUpdateDetails(id);
                })




                $('#serviceDataTable').DataTable({"order":false});
                $('.dataTables_length').addClass('bs-select')



            } else {
                $('#loader-div').addClass('d-none');
                $('#wrong-div').removeClass('d-none');
            }



        }).catch(function (error) {
            $('#loader-div').addClass('d-none');
            $('#wrong-div').removeClass('d-none');
        })

}




//Service Delte modal Yes btn
$('#serviceDeleteConfirm').click(function () {
    var id = $("#serviceDeleteId").html();
    serviceDelete(id);
})



//Service Delete

function serviceDelete(deleteId) {

    var id = $("#serviceDeleteConfirm").html(`<div class="spinner-border spinner-border-sm" role="status"></div>`); //Animation...


    axios.post('/serviceDelete', {
        id: deleteId
    })
        .then(function (response) {
            var id = $("#serviceDeleteConfirm").html("Yes");


            if (response.status == 200) {
                if (response.data == 1) {
                    $('#deleteModal').modal('hide');
                    getServicesData();
                    toastr.success('Delete Success');
                } else {
                    $('#deleteModal').modal('hide');
                    getServicesData();
                    toastr.error('Delete Fail')

                }
            } else {
                getServicesData();
                toastr.error('Something went wrong!')
                $('#deleteModal').modal('hide');

            }

        }).catch(function () {
            toastr.error('Something went wrong!')
            $('#deleteModal').modal('hide');

        })
}



//Service Update modal edit btn
$('#serviceEditConfirmBtn').click(function () {

    var id = $("#serviceEditId").html();
    var name = $("#serviceNameId").val();
    var des = $("#serviceDescId").val();
    var imgLink = $("#serviceImgId").val();

    serviceUpdate(id, name, des, imgLink);
})



//Each Service Update Details
function serviceUpdateDetails(detailsId) {


    axios.post('/serviceDetails', {
        id: detailsId
    })
        .then(function (response) {



            if (response.status == 200) {

                $('#serviceEditLoader').addClass('d-none');
                $('#serviceEditForm').removeClass('d-none');

                var jsonData = response.data;
                $('#serviceNameId').val(jsonData[0].serivce_name);
                $('#serviceDescId').val(jsonData[0].service_des);
                $('#serviceImgId').val(jsonData[0].service_img);
            } else {
                $('#serviceEditLoader').addClass('d-none');
                $('#serviceEditWrong').removeClass('d-none');
            }


        }).catch(function () {
            $('#serviceEditLoader').addClass('d-none');
            $('#serviceEditWrong').removeClass('d-none');
        })
}


//Service Update method

function serviceUpdate(serviceId, serviceName, serviceDes, serviceImgLink) {


    if (serviceName.length == 0) {
        toastr.error("Service Name is Empty!");
    }
    else if (serviceDes.length == 0) {
        toastr.error("Service Description is Empty!");
    }
    else if (serviceImgLink.length == 0) {
        toastr.error("Service Image is Empty!");
    } else {
        var id = $("#serviceEditConfirmBtn").html(`<div class="spinner-border spinner-border-sm" role="status"></div>`);

        axios.post('/serviceUpdate', {
            id: serviceId,
            name: serviceName,
            des: serviceDes,
            imgLink: serviceImgLink
        }).then(function (response) {
            var id = $("#serviceEditConfirmBtn").html("Save");


            if (response.status == 200) {
                if (response.data == 1) {
                    $('#editModal').modal('hide');
                    toastr.success('Service Edit Success');
                    getServicesData();
                } else {
                    $('#editModal').modal('hide');
                    toastr.error('Edit Fail')
                    getServicesData();
                }
            } else {
                $('#editModal').modal('hide');
                toastr.error('Something went wrong!');

            }




        }).catch(function () {
            $('#editModal').modal('hide');
            toastr.error('Something went wrong!');
        })
    }

}



//Service add new button click

$('#addNewBtnId').click(function(){
    $('#addModal').modal("show");
})


//Service Add button Action
$('#addNewConfirmBtnId').click(function () {

    var name = $("#serviceNameAddId").val();
    var des = $("#serviceDescAddId").val();
    var imgLink = $("#serviceImgAddId").val();

    serviceAdd(name, des, imgLink);
})




//Service Add Method

function serviceAdd(serviceName, serviceDes, serviceImgLink) {


    if (serviceName.length == 0) {
        toastr.error("Service Name is Empty!");
    }
    else if (serviceDes.length == 0) {
        toastr.error("Service Description is Empty!");
    }
    else if (serviceImgLink.length == 0) {
        toastr.error("Service Image is Empty!");
    } else {
        $("#addNewConfirmBtnId").html(`<div class="spinner-border spinner-border-sm" role="status"></div>`);

        axios.post('/serviceAdd', {
            name: serviceName,
            des: serviceDes,
            imgLink: serviceImgLink
        }).then(function (response) {
            $("#addNewConfirmBtnId").html("Add New");


            if (response.status == 200) {
                if (response.data == 1) {
                    $('#addModal').modal('hide');
                    toastr.success('Service Edit Success');
                    getServicesData();
                } else {
                    $('#addModal').modal('hide');
                    toastr.error('Edit Fail')
                    getServicesData();
                }
            } else {
                $('#addModal').modal('hide');
                toastr.error('Something went wrong!');

            }




        }).catch(function () {
            $('#addModal').modal('hide');
            toastr.error('Something went wrong!');
        })
    }

}


</script>
@endsection
