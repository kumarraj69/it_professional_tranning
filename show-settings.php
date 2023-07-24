
<!-- Navbar -->
<?php include 'includes/header.php' ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include 'includes/sidebar.php' ?>
<!-- Content Wrapper. Contains page content -->
<tbody>
    <table class="table">
        <tr>
            <td id="site-settings-table-data">
            </td>
        </tr>
    </table>
</tbody>

<!-- <script type="text/javascript" src="js/jquery.js"></script> -->
   
<script type="text/javascript">
    $(document).ready(function() {
        $.ajax({
            url: "site-settings/site-setting.php",
            type: "POST",
            success: function(data) {
                $("#site-settings-table-data").html(data);
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        function loadtable() {
            $.ajax({
                url: "site-settings/site-setting.php",
                type: "POST",
                success: function(data) {
                    $("#site-settings-table-data").html(data);
                }
            });
        }

        // Ajax Insert data  

        $(document).on("click", "#insert-data", function(e) {
             //alert("kjsfhgjkdsh");
            e.preventDefault();
            var image = $("#image")[0].files;
            var favicon = $("#favicon")[0].files;
            var title = $("#title").val();
            var email = $("#email").val();
            var phone = $("#phone").val();
            var address = $("#address")[0].files;
            var formData = new FormData($("#myform")[0]);
            $.ajax({
                url: "site-settings/insert.php",
                type: "POST",
                data:  formData,
                title: title,
                email: email,
                phone: phone,
                address: address,  
                 // image code
                image: image,
                favicon: favicon,
                contentType: false, 
                processData: false,
                success: function(data) {
                    if (data == 1) {
                        $('.modal-backdrop.fade').css({
                        'display': 'none',
                        });
                        alert('Data Inserted successfully');
                        loadtable();
                    }
                }
            });
            //form.reset();
        });

       // Ajax Active & Inactive 

        $(document).on('click', '.status', function() {
            var status = ($(this).hasClass("btn-success")) ? '0' : '1';
            var msg = (status == '0') ? 'Deactivate' : 'Activate';
            if (confirm("Are you sure to " + msg)) {
                var userId = $(this).data("activeid");
                //alert(userId);
                $.ajax({
                    url: "site-settings/active.php",
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
                    url: "site-settings/edit.php",
                    type: "POST",
                    data: {
                        id: studentId
                    },
                    success: function(data) {
                        var response = JSON.parse(data);
                        $('.view_employee #employee_id').val(response.id);
                        $('.view_employee #titleInput').val(response.title);
                        $('.view_employee #emailInput').val(response.email);
                        $('.view_employee #phoneInput').val(response.phone);
                        $('.view_employee #addressInput').val(response.address);
                        $('.view_employee #imageInput').val(response.logoimage);
                        $('.view_employee #faviconInput').val(response.faviconimage);
                    }
                })
            });
        });

        // Ajax update code

    $(document).on("click", "#edit-data", function() {
    var userId = $("#employee_id").val();
    // alert(userId);
    var title = $("#titleInput").val();
    var email = $("#emailInput").val();
    var phone = $("#phoneInput").val();
    var address = $("#addressInput").val();

    // Create a FormData object
    var formData = new FormData();

    // Add the first image file to the FormData object
    var imageFile1 = $("#imageInput")[0].files[0];
    formData.append("image1", imageFile1);

    // Add the second image file to the FormData object
    var imageFile2 = $("#faviconInput")[0].files[0];
    formData.append("image2", imageFile2);

    // Add other form data to the FormData object
    formData.append("id", userId);
    formData.append("title", title);
    formData.append("email", email);
    formData.append("phone", phone);
    formData.append("address", address);
    //alert(userId);
    //alert(email);
    $.ajax({
        url: "site-settings/update.php",
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

<!-- footer -->
    <?php
    include 'includes/footer.php';
    ?>
  