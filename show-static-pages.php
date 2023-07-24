
<!-- Navbar -->
<?php include 'includes/header.php' ?>
<!-- /.Navbar End -->

<!-- Main Sidebar Container -->
<?php include 'includes/sidebar.php' ?>
<!-- Content Wrapper. Contains page content -->
<tbody>
    <table class="table">
        <tr>
            <td id="static-pages-table-data">
            </td>
        </tr>
    </table>
</tbody>

<!-- <script type="text/javascript" src="js/jquery.js"></script> -->

<script>
    $(document).ready(function() {
        function loadtable() {
            $.ajax({
                url: "static-pages/static-pages.php",
                type: "POST",
                success: function(data) {
                $("#static-pages-table-data").html(data);
                }
            });
        }

        // Ajax Delete 

        $(document).on("click", ".delete-btn", function() {
            if (confirm("Do you really want to delete this record ?")) {
                var userId = $(this).data("catdelid");
                $.ajax({
                    url: "static-pages/delete.php",
                    type: "POST",
                    data: {
                        id: userId
                    },
                    success: function(data) {
                        if (data == 1) {
                             alert('Data Deleted successfully')
                            loadtable();
                        }
                    }
                });
            }
        });

        // Ajax Insert data  

        $(document).on("click", "#insert-data", function(e) {
            e.preventDefault();
            var page = $("#page").val();
            var title = $("#title").val();
            var description = $("#description").val();
            alert(page);
            $.ajax({
                url: "static-pages/insert.php",
                type: "POST",
                data: {
                    page: page,
                    title: title,
                    description: description,
                },
                success: function(data) {
                    if (data == 1) {
                        $('.modal-backdrop.fade').css({'display': 'none',});
                        alert('Data Inserted successfully');
                        loadtable();
                    }
                }
            });
            form.reset();
        });

        // Ajax Active & Inactive 

        $(document).on('click', '.status_checks', function() {
            var status = ($(this).hasClass("btn-success")) ? '0' : '1';
            var msg = (status == '0') ? 'Deactivate' : 'Activate';
            if (confirm("Are you sure to " + msg)) {
                var userId = $(this).data("catinid");
                // alert(userId);
                $.ajax({
                    url: "static-pages/active.php",
                    type: "POST",
                    data: {
                        id: userId,
                        status: status
                    },
                    success: function(data) {
                        if (data == 1) {
                            // alert("Status Has Been Successfully Changed");
                            loadtable();
                        }
                    }
                });
            }
        });

        //Ajax select data from table 

        $(document).ready(function() {
            $(document).on("click", ".editButton", function() {
                var studentId = $(this).data("cateid");
                //alert(studentId);
                $.ajax({
                    url: "static-pages/edit.php",
                    type: "POST",
                    data: {
                        id: studentId
                    },
                    success: function(data) {
                        var response = JSON.parse(data);
                        $('.view_employee #employee_id').val(response.id);
                        $('.view_employee #titleInput').val(response.title);
                        $('.view_employee #descriptionInput').val(response.description);
                    }
                })
            });
        });

        // Ajax update code

        $(document).on("click", ".edit-submit", function() {
            var userId = $("#employee_id").val();
            //var pageInput = $("#pageInput").val();
            //alert(userId);
            //die();
            var title = $("#titleInput").val();
            var description = $("#descriptionInput").val();
            $.ajax({
                url: "static-pages/update.php",
                type: "POST",
                data: {
                    userId: userId,
                   // pageInput: pageInput,
                    title: title,
                    description: description,
                },
                success: function(data) {
                    if (data == 1) {
                        $('.modal-backdrop.fade').css({
                        'display': 'none',
                        });
                        alert('Data Updated successfully');
                        loadtable();
                    }
                }
            });
        });
       loadtable();
    });
</script>

<!-- Footer -->
<?php include 'includes/footer.php'; ?>
<!-- Footer End -->