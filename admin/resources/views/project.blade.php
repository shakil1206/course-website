@extends('Layout.app')
@section('title',"Projects")

@section('content')
<div id="main-div-project" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5">
            <button id="addNewProjectBtnId" class="btn my-3 btn-sm btn-danger">Add New</button>

            <table id="projectDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Description</th>
                        <th class="th-sm">Project Link</th>
                        <th class="th-sm">Project Image</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Delete</th>
                    </tr>
                </thead>
                <tbody id="project-table">


                </tbody>
            </table>

        </div>
    </div>
</div>



<div id="loader-div-project" class="container">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <img class="loading-icon" src="{{ asset('images/loader.svg') }}" alt="">
        </div>
    </div>
</div>
<div id="wrong-div-project" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <h3>Something went Wrong!</h3>
        </div>
    </div>
</div>



<div class="modal fade" id="addProjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body  text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <input id="projectNameId" type="text" id="" class="form-control mb-3"
                                placeholder="Project Name">
                                <input id="projectLinkId" type="text" id="" class="form-control mb-3"
                                placeholder="Project Link">

                        </div>
                        <div class="col-md-6">
                                <input id="projectDesId" type="text" id="" class="form-control mb-3"
                                placeholder="Project Description">
                                <input id="projectImgId" type="text" id="" class="form-control mb-3"
                                placeholder="Project Image">


                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                <button id="projectAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateProjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body  text-center">
                <div id="projectEditForm" class="container d-none">


                    <div class="row">
                        <div class="col-md-6">
                            <input id="ProjectNameUpdateId" type="text" id="" class="form-control mb-3"
                                placeholder="Project Name">
                            <input id="ProjectLinkUpdateId" type="text" id="" class="form-control mb-3"
                                placeholder="Project Link">
                        </div>
                        <div class="col-md-6">
                            <input id="ProjectDesUpdateId" type="text" id="" class="form-control mb-3"
                                placeholder="Project Description">
                            <input id="ProjectImgUpdateId" type="text" id="" class="form-control mb-3"
                                placeholder="Project Image">
                        </div>
                    </div>
                </div>


                <img  id="projectEditLoader" class="loading-icon m-5" src="{{ asset('images/loader.svg') }}" alt="">


                <h5 id="projectEditWrong" class="d-none">Something went Wrong!</h5>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                <button id="ProjectUpdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="deleteProjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center p-3 mt-4 mb-2">
                <h5>Do you want to delete?</h5>
                <h6 id="projectDeleteId" class="mt-5 d-none"></h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">No</button>
                <button id="projectDeleteConfirm" type="button" class="btn btn-danger btn-sm">Yes</button>
            </div>
        </div>
    </div>
</div>

@endsection


@section('script')
<script >

getProjectData();

function getProjectData() {
    axios.get('/getProjectData')

        .then(function (response) {

            if (response.status = 200) {

                $('#main-div-project').removeClass('d-none');
                $('#loader-div-project').addClass('d-none');


                $('#projectDataTable').DataTable().destroy();
                $('#project-table').empty();


                var jsonData = response.data;

                $.each(jsonData, function (i, item) {
                    $('<tr>').html(

                    `<td class="th-sm">${jsonData[i].project_name}</td>
                    <td class="th-sm">${jsonData[i].project_desc}</td>
                    <td class="th-sm">${jsonData[i].project_link}</td>
                    <td class="th-sm">${jsonData[i].project_img}</td>
                    <td class="th-sm"><a class="project-edit-btn" data-id='${jsonData[i].id}'><i class="fas fa-edit"></i></a></td>
                    <td class="th-sm"><a class="project-delete-btn" data-id='${jsonData[i].id}'><i class="fas fa-trash-alt"></i></a></td>`

                    ).appendTo('#project-table');
                })


                //project Table delete Icon click
                $('.project-delete-btn').click(function () {

                    var id = $(this).data('id');
                    $('#projectDeleteId').html(id);
                    $('#deleteProjectModal').modal('show');

                    $('#projectDeleteConfirm').data('id', id);

                })

                //Project Table edit icon on click
                $('.project-edit-btn').click(function () {

                    var id = $(this).data('id');
                    projectUpdateDetails(id);
                    // $('#courseDeleteId').html(id);

                    $('#updateProjectModal').modal('show');
                    $('#ProjectUpdateConfirmBtn').data('id', id);


                })




                $('#projectDataTable').DataTable({"order":false});
                $('.dataTables_length').addClass('bs-select')




            } else {
                $('#loader-div-project').addClass('d-none');
                $('#wrong-div-project').removeClass('d-none');
            }



        }).catch(function (error) {
            $('#loader-div-project').addClass('d-none');
            $('#wrong-div-project').removeClass('d-none');
        })

}




// Open Project Add Modal

$('#addNewProjectBtnId').click(function () {

$('#addProjectModal').modal('show');
})




//Project Add button Action
$('#projectAddConfirmBtn').click(function () {

var project_name = $("#projectNameId").val();
var project_desc = $("#projectDesId").val();
var project_link = $("#projectLinkId").val();
var project_img = $("#projectImgId").val();

projectAdd(project_name,project_desc,project_link,project_img);
})




//Course Add Method

function projectAdd(project_name, project_desc,project_link,project_img) {


if (project_name.length == 0) {
    toastr.error("Project Name is Empty!");
}
else if (project_desc.length == 0) {
    toastr.error("Project Description is Empty!");
}
else if (project_link.length == 0) {
    toastr.error("Project Link is Empty!");
}
else if (project_img.length == 0) {
    toastr.error("Project Image is Empty!");
} else {
    $("#projectAddConfirmBtn").html(`<div class="spinner-border spinner-border-sm" role="status"></div>`);

    axios.post('/projectAdd', {

        project_name: project_name,
        project_desc: project_desc,
        project_link: project_link,
        project_img: project_img


    }).then(function (response) {
        $("#projectAddConfirmBtn").html("Add New");


        if (response.status == 200) {
            if (response.data == 1) {
                $('#addProjectModal').modal('hide');
                toastr.success('Project Add Success');
                getProjectData();
            } else {
                $('#addProjectModal').modal('hide');
                toastr.error('Project Add Fail')
                getProjectData();
            }
        } else {
            $('#addProjectModal').modal('hide');
            toastr.error('Something went wrong!');

        }




    }).catch(function () {
        $('#addProjectModal').modal('hide');
        toastr.error('Something went wrong!');
    })
}

}









//Project Update



//Each Project Update Details
function projectUpdateDetails(detailsId) {


axios.post('/getProjectDetails', {
    id: detailsId
})
    .then(function (response) {



        if (response.status == 200) {

            $('#projectEditLoader').addClass('d-none');
            $('#projectEditForm').removeClass('d-none');

            var jsonData = response.data;
            $('#ProjectNameUpdateId').val(jsonData[0].project_name);
            $('#ProjectDesUpdateId').val(jsonData[0].project_desc);
            $('#ProjectLinkUpdateId').val(jsonData[0].project_link);
            $('#ProjectImgUpdateId').val(jsonData[0].project_img);
        } else {
            $('#projectEditLoader').addClass('d-none');
            $('#projectEditWrong').removeClass('d-none');
        }


    }).catch(function () {
        $('#projectEditLoader').addClass('d-none');
        $('#projectEditWrong').removeClass('d-none');
    })
}



//Project Update button Action
$('#ProjectUpdateConfirmBtn').click(function () {

var project_id = $('#ProjectUpdateConfirmBtn').data('id');
var project_name = $("#ProjectNameUpdateId").val();
var project_desc = $("#ProjectDesUpdateId").val();
var project_link = $("#ProjectLinkUpdateId").val();
var project_img = $("#ProjectImgUpdateId").val();

projectUpdate(project_id,project_name,project_desc,project_link,project_img);
})



//Project Update method

function projectUpdate(project_id,project_name,project_desc,project_link,project_img) {


if (project_name.length == 0) {
    toastr.error("Project Name is Empty!");
}
else if (project_desc.length == 0) {
    toastr.error("Project Description is Empty!");
}else if (project_link.length == 0) {
    toastr.error("Project link is Empty!");
}
else if (project_img.length == 0) {
    toastr.error("Project Image is Empty!");
} else {
    $("#ProjectUpdateConfirmBtn").html(`<div class="spinner-border spinner-border-sm" role="status"></div>`);

    axios.post('/projectUpdate', {
        project_id: project_id,
        project_name: project_name,
        project_desc: project_desc,
        project_link: project_link,
        project_img: project_img
    }).then(function (response) {
        $("#ProjectUpdateConfirmBtn").html("Save");


        if (response.status == 200) {
            if (response.data == 1) {
                $('#updateProjectModal').modal('hide');
                toastr.success('Project Update Success');
                getProjectData();
            } else {
                $('#updateProjectModal').modal('hide');
                toastr.error('Project Update Fail')
                getProjectData();
            }
        } else {
            $('#updateProjectModal').modal('hide');
            toastr.error('Something went wrong!');

        }




    }).catch(function () {
        $('#updateProjectModal').modal('hide');
        toastr.error('Something went wrong!');
    })
}

}






// Project Delete

$('#projectDeleteConfirm').click(function () {
    //    var id = $('#courseDeleteId').html();

    var id = $('#projectDeleteConfirm').data('id');


    projectDelete(id);
})






//Project Delete

function projectDelete(deleteId) {

var id = $("#projectDeleteConfirm").html(`<div class="spinner-border spinner-border-sm" role="status"></div>`); //Animation...


axios.post('/projectDelete', {
    id: deleteId
})
    .then(function (response) {
        var id = $("#projectDeleteConfirm").html("Yes");


        if (response.status == 200) {
            if (response.data == 1) {
                $('#deleteProjectModal').modal('hide');
                getProjectData();
                toastr.success('Delete Success');
            } else {
                $('#deleteProjectModal').modal('hide');
                getProjectData();
                toastr.error('Delete Fail')

            }
        } else {
            getProjectData();
            toastr.error('Something went wrong!')
            $('#deleteProjectModal').modal('hide');

        }

    }).catch(function () {
        toastr.error('Something went wrong!')
        $('#deleteProjectModal').modal('hide');

    })
}






</script>
@endsection
