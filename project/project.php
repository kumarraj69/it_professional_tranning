<?php include '../db.php'; ?>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Project Table</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Project Table</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Include jQuery library -->
  <!-- validation cdn -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script> -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with minimal features & hover style</h3>
            </div>
            <div class="card-header">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Add new user
              </button>
              <!-- The Modal -->
              <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4>Add Employee Details</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                      <form id="myform">
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" name="name" id="name" required class="form-control" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                          <label for="description">Description</label>
                          <textarea name="description" id="description" rows="4" cols="40" required class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="categoryid">Categoryid</label>
                          <input type="text" name="categoryid" id="categoryid" required class="form-control" placeholder="Enter the category ID">
                        </div>
                        <div class="form-group">
                          <label for="clientid">Clientid</label>
                          <input type="text" name="clientid" id="clientid" required class="form-control" placeholder="Enter the client ID">
                        </div>
                        <div class="form-group">
                          <label for="hour">Hour</label>
                          <input type="text" name="hour" id="hour" required class="form-control" placeholder="Enter the hour">
                        </div>
                        <div class="form-group">
                          <label for="image">Image</label>
                          <input type="file" name="image" id="image" required class="form-control">
                        </div>
                        <div class="modal-footer">
                          <button type="submit" id="insert-data" class="btn btn-success">Save</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                      </form>
                      <!-- <div class="project-table-data"></div> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Model end -->

            <div class="container">
              <div class="modal fade" id="Modalform" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal Edit content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4>Edit Form</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body view_employee">
                      <form id="mymodelform" method="POST" enctype="multipart/form-data">

                        <input type="text" name="name" hidden id="employee_id" value="<?php echo $fetch['id'] ?>">

                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" name="name" id="nameInput" required class="form-control" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                          <label for="description">Description</label>
                          <input type="text" name="description" id="descriptionInput" required class="form-control" placeholder="Enter your email">
                        </div>
                        <div class="form-group">
                          <label for="category_id">Category_id</label>
                          <input type="text" name="categoryid" id="categoryidInput" required class="form-control" placeholder="Enter your address">
                        </div>
                        <div class="form-group">
                          <label for="clientid">Clientid</label>
                          <input type="text" name="clientid" id="clientidInput" required class="form-control" placeholder="Enter your address">
                        </div>
                        <div class="form-group">
                          <label for="hour">Hour</label>
                          <input type="text" name="hour" id="hourInput" required class="form-control" placeholder="Enter your join date">
                        </div>
                        <div class="form-group">
                          <label for="image">Image</label>
                          <input type="file" name="image" id="imageInput" required class="form-control" placeholder="Enter your Phone no">
                        </div>

                        <div class="modal-footer">
                          <button type="button" id="edit" value="edit" data-dismiss="modal" class="edit-submit btn btn-success">Update</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table id="project" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Category_id</th>
                      <th>Client_id</th>
                      <th>Hour</th>
                      <th>Image</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $sql = mysqli_query($conn, "SELECT id, name, description, category_id, client_id, hour, image, status FROM project order by id desc");
                    $i = 0;
                    while ($row = mysqli_fetch_array($sql)) {
                      $i++;
                    ?>
                      <tr>
                        <td class="align-middle"><?php echo $i; ?></td>
                        <td class="align-middle"><?Php echo $row['name']; ?></td>
                        <td class="align-middle"><?Php echo $row['description']; ?></td>
                        <td class="align-middle"><?Php echo $row['category_id']; ?></td>
                        <td class="align-middle"><?Php echo $row['client_id']; ?></td>
                        <td class="align-middle"><?Php echo $row['hour']; ?></td>
                        <td class="align-middle"><img src="images/project/<?php echo $row['image']; ?>" class="img" width="60" height="60"></td>
                        <td class="align-middle"><i data-activeid="<?php echo $row['id']; ?>" class="status btn
                          <?php echo ($row['status']) ?
                            'btn-success' : 'btn-danger' ?>"><?php echo ($row['status']) ? 'Active' : 'Deactive' ?>
                          </i>
                        </td>
                        <td class="align-middle">
                          <!-- <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a> -->
                          <button class="editButton btn btn-primary" data-eid="<?Php echo $row['id']; ?>" data-toggle="modal" data-target="#Modalform">Edit</button>
                          <button class="delete-btn btn btn-danger" data-prodelid="<?Php echo $row['id']; ?>">Delete</button>
                        </td>
                      </tr>
                    <?php } ?>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
</div>
<!-- <script>
    // jQuery Validation plugin initialization
    $(document).ready(function() {
      $("#myform").validate({
        rules: {
          name: "required",
          description: "required",
          categoryid: "required",
          clientid: "required",
          hour: "required",
          image: "required"
        },
        messages: {
          name: "Please enter your name",
          description: "Please enter a description",
          categoryid: "Please enter a category ID",
          clientid: "Please enter a client ID",
          hour: "Please enter an hour",
          image: "Please select an image"
        },
        submitHandler: function(form) {
          // The code to be executed when the form is submitted and valid
          // For example, you can use AJAX to send the form data to the server
          // form.submit();
        }
      });
    });
  </script> -->
<script>
  $(document).ready(function() {
    let table = new DataTable('#project');
  });
</script>