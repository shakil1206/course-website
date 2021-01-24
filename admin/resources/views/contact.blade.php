@extends('Layout.app')

@section('content')
<div id="main-div-contact" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5">

            <table id="contactDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Mobile</th>
                        <th class="th-sm">Email</th>
                        <th class="th-sm">Message</th>
                        <th class="th-sm">Delete</th>
                    </tr>
                </thead>
                <tbody id="contact-table">


                </tbody>
            </table>

        </div>
    </div>
</div>



<div id="loader-div-contact" class="container">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <img class="loading-icon" src="{{ asset('images/loader.svg') }}" alt="">
        </div>
    </div>
</div>
<div id="wrong-div-contact" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <h3>Something went Wrong!</h3>
        </div>
    </div>
</div>








<div class="modal fade" id="deleteContactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center p-3 mt-4 mb-2">
                <h5>Do you want to delete?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">No</button>
                <button id="contactDeleteConfirm" type="button" class="btn btn-danger btn-sm">Yes</button>
            </div>
        </div>
    </div>
</div>

@endsection


@section('script')
<script >

getContactData();

function getContactData() {
    axios.get('/getContactData')

        .then(function (response) {

            if (response.status = 200) {

                $('#main-div-contact').removeClass('d-none');
                $('#loader-div-contact').addClass('d-none');


                $('#contactDataTable').DataTable().destroy();
                $('#contact-table').empty();


                var jsonData = response.data;

                $.each(jsonData, function (i, item) {
                    $('<tr>').html(

                    `<td class="th-sm">${jsonData[i].contact_name}</td>
                    <td class="th-sm">${jsonData[i].contact_mobile}</td>
                    <td class="th-sm">${jsonData[i].contact_email}</td>
                    <td class="th-sm">${jsonData[i].contact_msg}</td>
                    <td class="th-sm"><a class="contact-delete-btn" data-id='${jsonData[i].id}'><i class="fas fa-trash-alt"></i></a></td>`

                    ).appendTo('#contact-table');
                })


                //project Table delete Icon click
                $('.contact-delete-btn').click(function () {

                    var id = $(this).data('id');
                    $('#deleteContactModal').modal('show');

                    $('#contactDeleteConfirm').data('id', id);

                })





                $('#contactDataTable').DataTable({"order":false});
                $('.dataTables_length').addClass('bs-select')




            } else {
                $('#loader-div-contact').addClass('d-none');
                $('#wrong-div-contact').removeClass('d-none');
            }



        }).catch(function (error) {
            $('#loader-div-contact').addClass('d-none');
            $('#wrong-div-contact').removeClass('d-none');
        })

}










// Project Delete

$('#contactDeleteConfirm').click(function () {
    //    var id = $('#courseDeleteId').html();

    var id = $('#contactDeleteConfirm').data('id');


    contactDelete(id);
})






//Project Delete

function contactDelete(deleteId) {

var id = $("#contactDeleteConfirm").html(`<div class="spinner-border spinner-border-sm" role="status"></div>`); //Animation...


axios.post('/contactDelete', {
    id: deleteId
})
    .then(function (response) {
        var id = $("#contactDeleteConfirm").html("Yes");


        if (response.status == 200) {
            if (response.data == 1) {
                $('#deleteContactModal').modal('hide');
                getContactData();
                toastr.success('Delete Success');
            } else {
                $('#deleteContactModal').modal('hide');
                getContactData();
                toastr.error('Delete Fail')

            }
        } else {
            getContactData();
            toastr.error('Something went wrong!')
            $('#deleteContactModal').modal('hide');

        }

    }).catch(function () {
        toastr.error('Something went wrong!')
        $('#deleteContactModal').modal('hide');

    })
}






</script>
@endsection
