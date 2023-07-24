<?php include '../db.php'; ?>
<!-- <!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.0/bootstrap-table.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
</head> -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Category Table</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Category Table</li>
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
              <!-- Modal Form -->
              <div class="container">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                  Add new category
                </button>
                <!-- The Modal -->
                <div class="modal fade" id="myModal" >
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4>Add Employee Details</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                        <form  id="myform" method="POST">
                          <div class="form-group">
                            <label for="name">name</label>
                            <input type="text" name="name" id="name" required class="form-control" placeholder="Enter your name">
                            <span id="name-error" class="error-message"></span>
                          </div>
                          <div class="form-group">
                            <label for="address">Description</label>
                            <textarea name="description" id="description" rows="4" cols="40" required class="form-control"></textarea>
                            <span id="description-error" class="error-message"></span>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" id="insert-data" class="btn btn-success">Save</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>
                        </form>
                        <!-- <div id="category-table-data"></div> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- The Modal end-->

              <!-- Edit Modal -->
              <div class="container">
                <div class="modal fade" id="Modalform" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4>Edit Form</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body view_employee">
                        <form id="mymodelform">
                          <input type="text" name="name" hidden id="employee_id">
                          <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="nameInput" required class="form-control" placeholder="Enter your name">
                          </div>
                          <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="descriptionInput" required class="form-control"></textarea>
                          </div>
                          <div class="modal-footer">
                            <button type="button" id="edit" value="edit" data-dismiss="modal" class="edit-submit btn btn-success">Update</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>
                        </form>
                        <!-- <div id="category-table-data"></div> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Edit Modal End-->
              <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
              <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
              <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script> -->
              <div class="card-body">
                <table  id="example" class="display" cellspacing="0" width="100%" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = mysqli_query($conn, "SELECT id, name, description, status FROM category order by id desc");
                    $i = 0;
                    while ($result = mysqli_fetch_array($sql)) {
                      $i++;
                    ?>
                      <tr>
                        <td class="align-middle"><?php echo $i; ?></td>
                        <td class="align-middle">
                          <?Php echo $result['name']; ?>
                        </td>
                        <td class="align-middle">
                          <?Php echo $result['description']; ?>
                        </td>
                        <td class="align-middle"><i data-catinid="<?php echo $result['id']; ?>" class="status_checks btn
                      <?php echo ($result['status']) ?
                        'btn-success' : 'btn-danger' ?>"><?php echo ($result['status']) ? 'Active' : 'Deactive' ?>
                          </i>
                        </td>
                        <td class="align-middle">
                          <!-- <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a> -->
                          <button class="editButton btn btn-primary" data-cateid="<?Php echo $result['id']; ?>" data-toggle="modal" data-target="#Modalform">Edit</button>
                          <button class="delete-btn btn btn-danger" data-catdelid="<?Php echo $result['id']; ?>">Delete</button>
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
  <!--  Main content end -->
</div>
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script> -->
<script>
    $(document).ready(function() {
      let table = new DataTable('#example');
    });
</script>