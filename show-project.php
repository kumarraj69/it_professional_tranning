<!-- <!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.0/bootstrap-table.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
</head> -->

<!-- Navbar -->
<?php include 'includes/header.php' ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include 'includes/sidebar.php' ?>
<!-- Content Wrapper. Contains page content -->
<tbody>
    <table class="table">
        <tr>
            <td id="project-table-data">
            </td>
        </tr>
    </table>
</tbody>

<!-- <script type="text/javascript" src="js/jquery.js"></script> -->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
<!-- <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>  -->
<script type="text/javascript">

// Ajax Load Table 

    $(document).ready(function() {
        $.ajax({
            url: "project/project.php",
            type: "POST",
            success: function(data) {
                $("#project-table-data").html(data);
            }
        });
    });
</script>

 <!-- Ajax Reload Table  -->

<script>
    $(document).ready(function() {
        function loadtable() {
            $.ajax({
                url: "project/project.php",
                type: "POST",
                success: function(data) {
                    $("#project-table-data").html(data);
                }
            });
        }

        // // Ajax Delete 

        $(document).on("click", ".delete-btn", function() {
            if (confirm("Do you really want to delete this record ?")) {
                var userId = $(this).data("prodelid");
                $.ajax({
                    url: "project/delete.php",
                    type: "POST",
                    data: {
                        id: userId
                    },
                    success: function(data) {
                        if (data == 1) {
                            // alert('Data Deleted successfully')
                            loadtable();
                        }
                    }
                });
            }
        });

        // Ajax Insert data  

        $(document).on("click", "#insert-data", function(e) {
             //alert("kjsfhgjkdsh");
            e.preventDefault();
            var name = $("#name").val();
            var description = $("#description").val();
            var categoryid = $("#categoryid").val();
            var clientid = $("#clientid").val();
            var hour = $("#hour").val();
            var image = $("#image")[0].files;
            var formData = new FormData($("#myform")[0]);
            $.ajax({
                url: "project/insert.php",
                type: "POST",
                data:  formData,
                name: name,
                description: description,
                categoryid: categoryid,
                clientid: clientid,
                hour: hour,  
                 // image code
                image: image,
                contentType: false, 
                processData: false,
                success: function(data) {
                    if (data == 1) {
                        $('#myModal').modal('hide');
                        // $('.modal-backdrop.fade').css({ 'display': 'none',});
                        alert('Data Inserted successfully');
                        loadtable();
                    }
                }
            });
        });

        // Ajax Active & Inactive 

        $(document).on('click', '.status', function() {
            var status = ($(this).hasClass("btn-success")) ? '0' : '1';
            var msg = (status == '0') ? 'Deactivate' : 'Activate';
            if (confirm("Are you sure to " + msg)) {
                var userId = $(this).data("activeid");
                //alert(userId);
                $.ajax({
                    url: "project/active.php",
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

        // //Ajax select data from table 

        $(document).ready(function() {
            $(document).on("click", ".editButton", function() {
                var studentId = $(this).data("eid");
                //alert(studentId);
                $.ajax({
                    url: "project/edit.php",
                    type: "POST",
                    data: {
                        id: studentId
                    },
                    success: function(data) {
                        var response = JSON.parse(data);
                        $('.view_employee #employee_id').val(response.id);
                        $('.view_employee #nameInput').val(response.name);
                        $('.view_employee #descriptionInput').val(response.description);
                        $('.view_employee #categoryidInput').val(response.category_id);
                        $('.view_employee #clientidInput').val(response.client_id);
                        $('.view_employee #hourInput').val(response.hour);
                        $('.view_employee #imageInput').val(response.image);
                    }
                })
            });
        });

        // // Ajax update code

        $(document).on("click", ".edit-submit", function() {
         var userId = $("#employee_id").val();
         var name = $("#nameInput").val();
         var description = $("#descriptionInput").val();
         var categoryid = $("#categoryidInput").val();
         var clientid = $("#clientidInput").val();
         var hour = $("#hourInput").val();
         // Create a FormData object
         var formData = new FormData();

         // Add the image file to the FormData object
         var imageFile = $("#imageInput")[0].files[0];
         formData.append("image", imageFile);
         
         // Add other form data to the FormData object
        formData.append("id", userId);
        formData.append("name", name);
        formData.append("description", description);
        formData.append("category_id", categoryid);
        formData.append("client_id", clientid);
        formData.append("hour", hour);
       // alert(clientid);
        $.ajax({
        url: "project/update.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
            if (data == 1) {
                $('#myModal').modal('hide');
                // $('.modal-backdrop.fade').css({  'display': 'none',  });
                alert("Data Updated Successfully");
                loadtable();           
            }
        }
     });
   }); 

 });
</script>

<!-- footer -->
    <?php
    include 'includes/footer.php';
    ?>
  <!-- footer end -->