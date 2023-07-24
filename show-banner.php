
<!-- Navbar -->
<?php include 'includes/header.php' ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include 'includes/sidebar.php' ?>
<!-- Content Wrapper. Contains page content -->
<tbody>
    <table class="table">
        <tr>
            <td id="banner-table-data">
            </td>
        </tr>
    </table>
</tbody>

<!-- <script type="text/javascript" src="js/jquery.js"></script> -->

<script type="text/javascript">
    $(document).ready(function() {
        $.ajax({
            url: "banner/banner.php",
            type: "POST",
            success: function(data) {
                $("#banner-table-data").html(data);
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        function loadtable() {
            $.ajax({
                url: "banner/banner.php",
                type: "POST",
                success: function(data) {
                    $("#banner-table-data").html(data);
                }
            });
        }

        // Ajax Delete 

        $(document).on("click", ".delete-btn", function() {
            if (confirm("Do you really want to delete this record ?")) {
                var userId = $(this).data("catdelid");
                // alert(userId); this code is check the id
                $.ajax({
                    url: "banner/delete.php",
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

        $(document).on("click", "#add-data", function(e) {
            e.preventDefault();
            var title = $("#title").val();
            var description = $("#description").val();
            var image = $("#image")[0].files;

            if (image.length === 0) {
                alert("Please select an image file.");
                return;
            }
            var file = image[0];
            var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

            if (!allowedExtensions.exec(file.name)) {
                alert('Please upload a JPG, JPEG, or PNG file.');
                return;
            }
            var formData = new FormData($("#myform")[0]);
            // formData.append("title", title);
            // formData.append("description", description);
            // formData.append("image", file);

            $.ajax({
                url: "banner/insert.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data == 1) {
                        $('.modal-backdrop.fade').css({
                        'display': 'none',
                        });
                        alert('Data inserted successfully');
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
                    url: "banner/active.php",
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
                    url: "banner/edit.php",
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
         //alert(userId);
         var title = $("#titleInput").val();
         var description = $("#descriptionInput").val();
         // Create a FormData object
         var formData = new FormData();
         // Add the image file to the FormData object
         var imageFile = $("#imageInput")[0].files[0];
         formData.append("image", imageFile);
         // Add other form data to the FormData object
        formData.append("id", userId);
        formData.append("title", title);
        formData.append("description", description);
       // alert(clientid);
        $.ajax({
        url: "banner/update.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
            if (data == 1) {
                $('.modal-backdrop.fade').css({
                 'display': 'none',
                 });
                alert("Data Updated Successfully");
                loadtable();           
            }
        }
     });
   }); 

 });
</script>


<?php
include 'includes/footer.php';
?>