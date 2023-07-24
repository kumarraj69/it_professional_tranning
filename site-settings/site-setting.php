<?php include '../db.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Header Setting Table</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Header Setting Table</li>
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
                Add new user
              </button>
              <!-- The Modal -->
              <div class="modal fade" id="myModal"  role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4>Site Setting</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                      <form id="myform">
                        <div class="form-group">
                          <label for="image">Logo</label>
                          <input type="file" name="image" id="image" required class="form-control" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                          <label for="favicon">Favicon</label>
                          <input type="file" name="favicon" id="favicon" required class="form-control" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                          <label for="title">Title</label>
                          <input type="text" name="title" id="title" required class="form-control" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" name="email" id="email" required class="form-control" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                          <label for="phone">Phone</label>
                          <input type="number" name="phone" id="phone" required class="form-control" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                          <label for="address">Address</label>
                          <input type="text" name="address" id="address" required class="form-control" placeholder="Enter your name">
                        </div>
                        <div class="modal-footer">
                          <button type="submit" id="insert-data" data-dismiss="modal"  class="btn btn-success" >Save</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                      </form>
                      <div id="site-settings-table-data"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- end -->

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
                    <form id="myform" method="POST" enctype="multipart/form-data">
                    <input type="text" name="name" hidden id="employee_id" value="<?php echo $fetch['id'] ?>">
                        <div class="form-group">
                          <label for="image">Logo</label>
                          <input type="file" name="image" id="imageInput" required class="form-control" placeholder="Enter your name">
                        </div>
                       
                        <div class="form-group">
                          <label for="favicon">Favicon</label>
                          <input type="file" name="favicon" id="faviconInput" required class="form-control" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                          <label for="title">Title</label>
                          <input type="text" name="title" id="titleInput" required class="form-control" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" name="email" id="emailInput" required class="form-control" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                          <label for="phone">Phone</label>
                          <input type="number" name="phone" id="phoneInput" required class="form-control" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                          <label for="address">Address</label>
                          <input type="text" name="address" id="addressInput" required class="form-control" placeholder="Enter your name">
                        </div>
                        <div class="modal-footer">
                          <button type="submit" id="edit-data" data-dismiss="modal"  class="btn btn-success" >Save</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                      </form>
                  </div>
              </div>
           </div>
        </div>
    </div>
  </div>
            <div class="card-body">
              <table id="header-setting" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Logo</th>
                    <th>Favicon</th>
                    <th>Title</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  
                  $sql = mysqli_query($conn, "SELECT * FROM sitesetting order by id desc");
                  $i = 0;
                  while ($row = mysqli_fetch_array($sql)) {
                  $i++;
                  ?>
                    <tr>
                      <td class="align-middle"><?php echo $i; ?></td>
                      <td class="align-middle"><img src="site-settings/images/settingimage/<?php echo $row['logoimage']; ?>" class="img" width="60" height="60"></td>
                      <td class="align-middle"><img src="site-settings/images/settingfavicon/<?php echo $row['faviconimage']; ?>" class="img" width="60" height="60"></td>
                      <td class="align-middle"><?Php echo $row['title']; ?></td>
                      <td class="align-middle"><?Php echo $row['email']; ?></td>
                      <td class="align-middle"><?Php echo $row['phone']; ?></td>
                      <td class="align-middle"><?Php echo $row['address']; ?></td>
                      <td class="align-middle"><i data-activeid="<?php echo $row['id']; ?>" class="status btn
                          <?php echo ($row['status']) ?
                          'btn-success' : 'btn-danger' ?>"><?php echo ($row['status']) ? 'Active' : 'Deactive' ?>
                        </i>
                      </td>
                      <td class="align-middle">
                        <!-- <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a> -->
                        <button class="editButton btn btn-primary" data-eid="<?Php echo $row['id']; ?>" data-toggle="modal" data-target="#Modalform">Edit</button>
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
      let table = new DataTable('#header-setting');
    });
</script>







