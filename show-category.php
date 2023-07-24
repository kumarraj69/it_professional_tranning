
<!-- Navbar -->
<?php include 'includes/header.php' ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include 'includes/sidebar.php' ?>
<!-- Content Wrapper. Contains page content -->
<tbody>
    <table class="table">
        <tr>
            <td id="category-table-data">
            </td>
        </tr>
    </table>
</tbody>

<!-- <script type="text/javascript" src="js/jquery.js"></script>  -->

<script>
 $(document).ready(function() {
    function loadtable() {
        $.ajax({
            url: "category/category.php",
            type: "POST",
            success: function(data) {
                $("#category-table-data").html(data);
                
            }
        });
    }
    
    // Ajax Delete 

    $(document).on("click", ".delete-btn", function() {
        if (confirm("Do you really want to delete this record ?")) {
            var userId = $(this).data("catdelid");
            // alert(userId); this code is check the id
            // var element = this;
            $.ajax({
                url: "category/delete.php",
                type: "POST",
                data: {
                    id: userId
                },
                success: function(data) {
                    if (data == 1) {
                        //  $(element).closest("tr").fadeOut();
                        // alert('Data Deleted successfully')
                        loadtable();
                    }
                }
            });
        }
    });

    // Ajax Insert data  

    $(document).on("click", "#insert-data", function(e) {
        e.preventDefault();

        // Clear previous error messages
        $(".error-message").css("color", "red");

        var name = $("#name").val();
        var description = $("#description").val();
        //alert(name);
        // Validate form fields
        var isValid = true;
        if (name.trim() === "") {
            isValid = false;
            $("#name-error").text("Name is required");
        }
        if (description.trim() === "") {
            isValid = false;
            $("#description-error").text("Description is required");
        }
        // Proceed with AJAX request if form is valid
        if (isValid) {
        $.ajax({
            url: "category/insert.php",
            type: "POST",
            data: {
                name: name,
                description: description,
            },
            success: function(data) {
                $('#myModal').modal('hide');
                if (data == 1) {
                    //$('.modal-backdrop.fade').css({'display': 'none',});
                    alert('Data Inserted successfully');
                    loadtable();
                }
            }
        });
      }
    });

    // Ajax Active & Deactive 

    $(document).on('click', '.status_checks', function() {
        var status = ($(this).hasClass("btn-success")) ? '0' : '1';
        var msg = (status == '0') ? 'Deactive' : 'Activate';
        if (confirm("Are you sure to " + msg)) {
            var userId = $(this).data("catinid");
            // alert(userId);
            $.ajax({
                url: "category/active.php",
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
                url: "category/edit.php",
                type: "POST",
                data: {
                    id: studentId
                },
                success: function(data) {
                    var response = JSON.parse(data);
                    $('.view_employee #employee_id').val(response.id);
                    $('.view_employee #nameInput').val(response.name);
                    $('.view_employee #descriptionInput').val(response.description);
                }
            })
        });
    });

    // Ajax update code

    $(document).on("click", ".edit-submit", function() {
        var userId = $("#employee_id").val();
        var name = $("#nameInput").val();
        var description = $("#descriptionInput").val();
        $.ajax({
            url: "category/update.php",
            type: "POST",
            data: {
                userId: userId,
                name: name,
                description: description,
            },
            success: function(data) {
                if (data == 1) {
                    // $('.modal-backdrop.fade').css({
                    //     'display': 'none',
                    // });
                    alert('Data Updated successfully');
                    loadtable();
                }
            }
        });
    });
    loadtable();
 });
</script>
<?php
include 'includes/footer.php';
?>
