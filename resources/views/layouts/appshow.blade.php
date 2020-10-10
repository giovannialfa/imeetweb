<!DOCTYPE html>

<html>

<head>
    <title>Laravel7 CRUD @fahmidasclassroom.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        @yield('content')
    </div>
</body>
<script>
    $(document).ready(function() {

        /* When click New customer button */
        $('#new-admin').click(function() {
            $('#btn-save').val("create-admin");
            $('#admin').trigger("reset");
            $('#adminCrudModal').html("Add New admin");
            $('#crud-modal').modal('show');
        });

        /* Edit customer */
        $('body').on('click', '#edit-admin', function() {
            var id = $(this).data('id');
            $.get('admin/' + id + '/edit', function(data) {
                $('#adminCrudModal').html("Edit admin");
                $('#btn-update').val("Update");
                $('#btn-save').prop('disabled', false);
                $('#crud-modal').modal('show');
                $('#id').val(data.id);
                $('#adminId').val(data.adminId);
                $('#fullname').val(data.fullname);
                $('#password').val(data.password);
            })
        });
        // /* Show customer */
        // $('body').on('click', '#show-admin', function () {
        // $('#adminCrudModal-show').html("Customer Details");
        // $('#crud-modal-show').modal('show');
        // });

        /* Delete customer */
        // $('body').on('click', '#delete-customer', function() {
        //     var customer_id = $(this).data("id");
        //     var token = $("meta[name='csrf-token']").attr("content");
        //     confirm("Are You sure want to delete !");

        //     $.ajax({
        //         type: "DELETE",
        //         url: "http://localhost/laravel7crud/public/customers/" + customer_id,
        //         data: {
        //             "id": customer_id,
        //             "_token": token,
        //         },
        //         success: function(data) {
        //             $('#msg').html('Customer entry deleted successfully');
        //             $("#customer_id_" + customer_id).remove();
        //         },
        //         error: function(data) {
        //             console.log('Error:', data);
        //         }
        //     });
        // });
    });
</script>

</html>