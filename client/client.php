<?php include '../db.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Client Table</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Client Table</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

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
                Add new client
              </button>
              <!-- The Modal -->
              <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="text-center">Add Client Details</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                      <form id="myform" method="POST">
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name">
                          <span id="name-error" class="error-message"></span>
                        </div>
                        <div class="form-group">
                          <label for="address">Address</label>
                          <input type="text" name="address" id="address" class="form-control" placeholder="Enter your address">
                          <span id="address-error" class="error-message"></span>
                        </div>
                        <div class="form-group">
                          <label for="phone">Phone no:</label>
                          <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter your phone no">
                          <span id="phone-error" class="error-message"></span>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" id="save-data" class="btn btn-success">Save</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                      </form>

                      <div id="table-data"></div>
                    </div>

                    <!-- Modal footer -->

                  </div>
                </div>
              </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="client" class="display" cellspacing="0" width="100%" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Mobile</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $sql = mysqli_query($conn, "SELECT id, name, address, mobile FROM client order by id desc");
                  $i = 0;
                  while ($row = mysqli_fetch_array($sql)) {
                    $i++;
                  ?>
                    <tr>
                      <td class="align-middle"><?php echo $i; ?></td>
                      <td class="align-middle"><?Php echo $row['name']; ?></td>
                      <td class="align-middle"><?Php echo $row['address']; ?></td>
                      <td class="align-middle"><?Php echo $row['mobile']; ?></td>

                      <td class="align-middle">
                        <!-- <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a> -->
                        <button class="editButton btn btn-primary" data-eid="<?Php echo $row['id']; ?>" data-toggle="modal" data-target="#Modalform">Edit</button>
                        <button class="delete-btn btn btn-danger" data-deleteid="<?Php echo $row['id']; ?>">Delete</button>
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

<script>
    $(document).ready(function() {
      let table = new DataTable('#client');
    });
</script>
