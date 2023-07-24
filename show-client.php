
<!-- Navbar -->
<?php include 'includes/header.php' ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include 'includes/sidebar.php' ?>
<!-- Content Wrapper. Contains page content -->
  <tbody>
    <table class="table">
      <tr>
        <td id="client-table-data">
        </td>
      </tr>
    </table>
  </tbody>
  
  <!-- <script type="text/javascript" src="js/jquery.js"></script> -->
  
<script>
  $(document).ready(function() {
  function loadtable() {
    $.ajax({
      url: "client/client.php",
      type: "POST",
      success: function(data) {
        $("#client-table-data").html(data);
      }
    });
  }

  // Ajax Delete 

  $(document).on("click", ".delete-btn", function() {
    if (confirm("Do you really want to delete this record ?")) {
      var userId = $(this).data("deleteid");
      // alert(userId); this code is check the id
      $.ajax({
        url: "client/delete.php",
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

  $(document).on("click", "#save-data", function(e) {
  e.preventDefault();

  // Clear previous error messages
  $(".error-message").css("color", "red");

  // Get the form input values
  var name = $("#name").val();
  var address = $("#address").val();
  var phone = $("#phone").val();

  // Validate form fields
  var isValid = true;
  if (name.trim() === "") {
    isValid = false;
    $("#name-error").text("Name is required");
  }
  if (address.trim() === "") {
    isValid = false;
    $("#address-error").text("Address is required");
  }
  if (phone.trim() === "") {
    isValid = false;
    $("#phone-error").text("Phone number is required");
  }

  // Proceed with AJAX request if form is valid
  if (isValid) {
    $.ajax({
      url: "client/client_process.php",
      type: "POST",
      data: {
        name: name,
        address: address,
        phone: phone,
      },
      success: function(data) {
        $('#myModal').modal('hide');
        if (data == 1) {
          // $('.modal-backdrop.fade').css({ 'display': 'none' });
          alert('Data Inserted Successfully');
          loadtable();
        }
      }
    });
   }
  });

      //Ajax Update 

      $(document).on("click", ".editButton", function() {
        var studentId = $(this).data("eid");
          alert(studentId);
        $.ajax({
            url: "ajax-edit.php",
            type: "POST",
            data:{
            id: studentId
            },
            success: function(data){
                var response = JSON.parse(data);
                $('.view_employee #employee_id').val(response.id);
                $('.view_employee #nameInput').val(response.name);
                $('.view_employee #addressInput').val(response.address);
                $('.view_employee #phoneInput').val(response.phone);  
            }  
        })
    });
    loadtable();
  });
</script>

<?php
include 'includes/footer.php';
?>
  