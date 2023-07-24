<?php include '../db.php'; ?>
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
                <div class="modal fade" id="myModal" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4>Add Employee Details</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                        <form id="myform" method="POST">
                          <div class="form-group">
                            <label for="page">Page Type</label>
                            <select name="page" id="page" required class="form-control">
                              <option value="">Select a page type</option>
                              <option value="about">About</option>
                              <option value="faq">FAQ</option>
                              <option value="terms">Terms</option>
                              <option value="privacy">Privacy</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" required class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" rows="4" cols="40" required class="form-control"></textarea>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" id="insert-data" data-dismiss="modal" class="btn btn-success">Save</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>
                        </form>
                        <!-- <div id="static-pages-table-data"></div> -->
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
                      <form id="mymodelform" method="POST">
                      <input type="text" name="id" hidden  id="employee_id">
                          <div class="form-group">
                            <label for="page">Page Type</label>
                            <select name="page" id="pageInput" required class="form-control">
                              <option value="">Select a page type</option>
                              <option value="about">About</option>
                              <option value="faq">FAQ</option>
                              <option value="terms">Terms</option>
                              <option value="privacy">Privacy</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="titleInput" required class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="descriptionInput" rows="4" cols="40" required class="form-control"></textarea>
                          </div>
                          
                          <div class="modal-footer">
                            <button type="submit" class="edit-submit btn btn-success">Save</button>
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

              <div class="card-body">
                <table id="static-pages" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Page Type</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $sql = mysqli_query($conn, "SELECT id, page_type, title, description, status FROM static_pages order by id desc");
                    $i = 0;
                    while ($result = mysqli_fetch_array($sql)) {
                      $i++;
                    ?>
                      <tr>
                        <td class="align-middle"><?php echo $i; ?></td>
                        <td class="align-middle"><?Php echo $result['page_type']; ?></td>
                        <td class="align-middle"><?Php echo $result['title']; ?></td>
                        <td class="align-middle"><?Php echo $result['description']; ?></td>
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
  <!-- /.content -->
</div>
<script>
    $(document).ready(function() {
      let table = new DataTable('#static-pages');
    });
</script>