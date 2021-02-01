@extends('Layout.app')
@section('title',"Course")

@section('content')
<div id="main-div-course" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5">
            <button id="addNewCourseBtnId" class="btn my-3 btn-sm btn-danger">Add New</button>

            <table id="courseDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Fee</th>
                        <th class="th-sm">Class</th>
                        <th class="th-sm">Enroll</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Delete</th>
                    </tr>
                </thead>
                <tbody id="course-table">


                </tbody>
            </table>

        </div>
    </div>
</div>



<div id="loader-div-course" class="container">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <img class="loading-icon" src="{{ asset('images/loader.svg') }}" alt="">
        </div>
    </div>
</div>
<div id="wrong-div-course" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <h3>Something went Wrong!</h3>
        </div>
    </div>
</div>



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
                            <input id="CourseNameId" type="text" id="" class="form-control mb-3"
                                placeholder="Course Name">
                            <input id="CourseDesId" type="text" id="" class="form-control mb-3"
                                placeholder="Course Description">
                            <input id="CourseFeeId" type="text" id="" class="form-control mb-3"
                                placeholder="Course Fee">
                            <input id="CourseEnrollId" type="text" id="" class="form-control mb-3"
                                placeholder="Total Enroll">
                        </div>
                        <div class="col-md-6">
                            <input id="CourseClassId" type="text" id="" class="form-control mb-3"
                                placeholder="Total Class">
                            <input id="CourseLinkId" type="text" id="" class="form-control mb-3"
                                placeholder="Course Link">
                            <input id="CourseImgId" type="text" id="" class="form-control mb-3"
                                placeholder="Course Image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                <button id="CourseAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
            </div>
        </div>
    </div>
</div>

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
                <div id="courseEditForm" class="container d-none">


                    <div class="row">
                        <div class="col-md-6">
                            <input id="CourseNameUpdateId" type="text" id="" class="form-control mb-3"
                                placeholder="Course Name">
                            <input id="CourseDesUpdateId" type="text" id="" class="form-control mb-3"
                                placeholder="Course Description">
                            <input id="CourseFeeUpdateId" type="text" id="" class="form-control mb-3"
                                placeholder="Course Fee">
                            <input id="CourseEnrollUpdateId" type="text" id="" class="form-control mb-3"
                                placeholder="Total Enroll">
                        </div>
                        <div class="col-md-6">
                            <input id="CourseClassUpdateId" type="text" id="" class="form-control mb-3"
                                placeholder="Total Class">
                            <input id="CourseLinkUpdateId" type="text" id="" class="form-control mb-3"
                                placeholder="Course Link">
                            <input id="CourseImgUpdateId" type="text" id="" class="form-control mb-3"
                                placeholder="Course Image">
                        </div>
                    </div>
                </div>


                <img  id="courseEditLoader" class="loading-icon m-5" src="{{ asset('images/loader.svg') }}" alt="">


                <h5 id="courseEditWrong" class="d-none">Something went Wrong!</h5>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                <button id="CourseUpdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="deleteCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center p-3 mt-4 mb-2">
                <h5>Do you want to delete?</h5>
                <h6 id="courseDeleteId" class="mt-5 d-none"></h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">No</button>
                <button id="courseDeleteConfirm" type="button" class="btn btn-danger btn-sm">Yes</button>
            </div>
        </div>
    </div>
</div>

@endsection


@section('script')
<script>

getCoursesData();


//For Services Table
function getCoursesData() {
    axios.get('/getCoursesData')

        .then(function (response) {

            if (response.status = 200) {

                $('#main-div-course').removeClass('d-none');
                $('#loader-div-course').addClass('d-none');


                $('#courseDataTable').DataTable().destroy();
                $('#course-table').empty();


                var jsonData = response.data;

                $.each(jsonData, function (i, item) {
                    $('<tr>').html(

                        `<td class="th-sm">${jsonData[i].course_name}</td>
                    <td class="th-sm">${jsonData[i].course_fee}</td>
                    <td class="th-sm">${jsonData[i].course_totalclass}</td>
                    <td class="th-sm">${jsonData[i].course_totalenroll}</td>
                    <td class="th-sm"><a class="course-edit-btn" data-id='${jsonData[i].id}'><i class="fas fa-edit"></i></a></td>
                    <td class="th-sm"><a class="course-delete-btn" data-id='${jsonData[i].id}'><i class="fas fa-trash-alt"></i></a></td>`

                    ).appendTo('#course-table');
                })


                // //Course Table delete Icon click
                $('.course-delete-btn').click(function () {

                    var id = $(this).data('id');
                    $('#courseDeleteId').html(id);
                    $('#deleteCourseModal').modal('show');

                    $('#courseDeleteConfirm').data('id', id);

                })

                //Course Table edit icon on click
                $('.course-edit-btn').click(function () {

                    var id = $(this).data('id');
                    courseUpdateDetails(id);
                    // $('#courseDeleteId').html(id);

                    $('#updateCourseModal').modal('show');
                    $('#CourseUpdateConfirmBtn').data('id', id);


                })



                // // Service Table Edit icon click
                // $('.service-edit-btn').click(function () {
                //     var id = $(this).data('id');
                //     $('#serviceEditId').html(id);

                //     serviceUpdateDetails(id);
                // })




                $('#courseDataTable').DataTable({"order":false});
                $('.dataTables_length').addClass('bs-select')




            } else {
                $('#loader-div-course').addClass('d-none');
                $('#wrong-div-course').removeClass('d-none');
            }



        }).catch(function (error) {
            $('#loader-div-course').addClass('d-none');
            $('#wrong-div-course').removeClass('d-none');
        })

}



$('#addNewCourseBtnId').click(function () {

    $('#addCourseModal').modal('show');
})










//Course Add button Action
$('#CourseAddConfirmBtn').click(function () {

    var course_name = $("#CourseNameId").val();
    var course_des = $("#CourseDesId").val();
    var course_fee = $("#CourseFeeId").val();
    var course_totalenroll = $("#CourseEnrollId").val();
    var course_totalclass = $("#CourseClassId").val();
    var course_link = $("#CourseLinkId").val();
    var course_img = $("#CourseImgId").val();

    courseAdd(course_name, course_des, course_fee, course_totalenroll, course_totalclass, course_link, course_img);
})




//Course Add Method

function courseAdd(course_name, course_des, course_fee, course_totalenroll, course_totalclass, course_link, course_img) {


    if (course_name.length == 0) {
        toastr.error("Service Name is Empty!");
    }
    else if (course_des.length == 0) {
        toastr.error("Course Description is Empty!");
    }
    else if (course_fee.length == 0) {
        toastr.error("Course Fee is Empty!");
    }
    else if (course_totalenroll.length == 0) {
        toastr.error("Course Enroll is Empty!");
    }
    else if (course_totalclass.length == 0) {
        toastr.error("Course Total Class is Empty!");
    }
    else if (course_link.length == 0) {
        toastr.error("Course Link is Empty!");
    }
    else if (course_img.length == 0) {
        toastr.error("Course Image is Empty!");
    } else {
        $("#CourseAddConfirmBtn").html(`<div class="spinner-border spinner-border-sm" role="status"></div>`);

        axios.post('/coursesAdd', {

            course_name: course_name,
            course_des: course_des,
            course_fee: course_fee,
            course_totalenroll: course_totalenroll,
            course_totalclass: course_totalclass,
            course_link: course_link,
            course_img: course_img


        }).then(function (response) {
            $("#CourseAddConfirmBtn").html("Add New");


            if (response.status == 200) {
                if (response.data == 1) {
                    $('#addCourseModal').modal('hide');
                    toastr.success('Service Edit Success');
                    getCoursesData();
                } else {
                    $('#addCourseModal').modal('hide');
                    toastr.error('Edit Fail')
                    getCoursesData();
                }
            } else {
                $('#addCourseModal').modal('hide');
                toastr.error('Something went wrong!');

            }




        }).catch(function () {
            $('#addCourseModal').modal('hide');
            toastr.error('Something went wrong!');
        })
    }

}



$('#courseDeleteConfirm').click(function () {
    //    var id = $('#courseDeleteId').html();

    var id = $('#courseDeleteConfirm').data('id');


    courseDelete(id);
})







//Course Delete

function courseDelete(deleteId) {

    var id = $("#courseDeleteConfirm").html(`<div class="spinner-border spinner-border-sm" role="status"></div>`); //Animation...


    axios.post('/coursesDelete', {
        id: deleteId
    })
        .then(function (response) {
            var id = $("#courseDeleteConfirm").html("Yes");


            if (response.status == 200) {
                if (response.data == 1) {
                    $('#deleteCourseModal').modal('hide');
                    getCoursesData();
                    toastr.success('Delete Success');
                } else {
                    $('#deleteCourseModal').modal('hide');
                    getCoursesData();
                    toastr.error('Delete Fail')

                }
            } else {
                getCoursesData();
                toastr.error('Something went wrong!')
                $('#deleteCourseModal').modal('hide');

            }

        }).catch(function () {
            toastr.error('Something went wrong!')
            $('#deleteCourseModal').modal('hide');

        })
}









//Each Course Update Details
function courseUpdateDetails(detailsId) {


    axios.post('/getCoursesDetails', {
        id: detailsId
    })
        .then(function (response) {



            if (response.status == 200) {

                $('#courseEditLoader').addClass('d-none');
                $('#courseEditForm').removeClass('d-none');

                var jsonData = response.data;
                $('#CourseNameUpdateId').val(jsonData[0].course_name);
                $('#CourseDesUpdateId').val(jsonData[0].course_des	);
                $('#CourseFeeUpdateId').val(jsonData[0].course_fee);
                $('#CourseEnrollUpdateId').val(jsonData[0].course_totalenroll);
                $('#CourseClassUpdateId').val(jsonData[0].course_totalclass);
                $('#CourseLinkUpdateId').val(jsonData[0].course_link);
                $('#CourseImgUpdateId').val(jsonData[0].course_img);
            } else {
                $('#courseEditLoader').addClass('d-none');
                $('#courseEditWrong').removeClass('d-none');
            }


        }).catch(function () {
            $('#courseEditLoader').addClass('d-none');
            $('#courseEditWrong').removeClass('d-none');
        })
}



//Course Update button Action
$('#CourseUpdateConfirmBtn').click(function () {

    var course_id = $('#CourseUpdateConfirmBtn').data('id');
    var course_name = $("#CourseNameUpdateId").val();
    var course_des = $("#CourseDesUpdateId").val();
    var course_fee = $("#CourseFeeUpdateId").val();
    var course_totalenroll = $("#CourseEnrollUpdateId").val();
    var course_totalclass = $("#CourseClassUpdateId").val();
    var course_link = $("#CourseLinkUpdateId").val();
    var course_img = $("#CourseImgUpdateId").val();

    courseUpdate(course_id,course_name, course_des, course_fee, course_totalenroll, course_totalclass, course_link, course_img);
})



//Course Update method

function courseUpdate(course_id, course_name, course_des, course_fee, course_totalenroll, course_totalclass, course_link, course_img) {


    if (course_name.length == 0) {
        toastr.error("Course Name is Empty!");
    }
    else if (course_des.length == 0) {
        toastr.error("Course Description is Empty!");
    }
    else if (course_fee.length == 0) {
        toastr.error("Course  Fee is Empty!");
    }
    else if (course_totalenroll.length == 0) {
        toastr.error("Course Enroll is Empty!");
    }
    else if (course_totalclass.length == 0) {
        toastr.error("Course Total Class is Empty!");
    }
    else if (course_link.length == 0) {
        toastr.error("Course link is Empty!");
    }
    else if (course_img.length == 0) {
        toastr.error("Course Image is Empty!");
    } else {
        $("#CourseUpdateConfirmBtn").html(`<div class="spinner-border spinner-border-sm" role="status"></div>`);

        axios.post('/coursesUpdate', {
            course_id: course_id,
            course_name: course_name,
            course_des: course_des,
            course_fee: course_fee,
            course_totalenroll: course_totalenroll,
            course_totalclass: course_totalclass,
            course_link: course_link,
            course_img: course_img
        }).then(function (response) {
            $("#CourseUpdateConfirmBtn").html("Save");


            if (response.status == 200) {
                if (response.data == 1) {
                    $('#updateCourseModal').modal('hide');
                    toastr.success('Course Update Success');
                    getCoursesData();
                } else {
                    $('#updateCourseModal').modal('hide');
                    toastr.error('Update Fail')
                    getCoursesData();
                }
            } else {
                $('#updateCourseModal').modal('hide');
                toastr.error('Something went wrong!');

            }




        }).catch(function () {
            $('#updateCourseModal').modal('hide');
            toastr.error('Something went wrong!');
        })
    }

}



</script>
@endsection
