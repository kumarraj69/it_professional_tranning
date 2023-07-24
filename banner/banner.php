
<?php include '../db.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Banner Table</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Banner Table</li>
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
                Add new Banner
              </button>
              <!-- The Modal -->
              <div class="modal fade" id="myModal"  role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4>Add Banner</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                      <form id="myform" method="POST">
                        <div class="form-group">
                          <label for="image">Image</label>
                          <input type="file" name="image" id="image" required class="form-control" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                          <label for="title">Tittle</label>
                          <input name="title" id="title" required class="form-control" placeholder="Enter your title">
                          <!-- <textarea id="message" name="message" rows="4" cols="40"></textarea> -->
                        </div>
                        <div class="form-group">
                          <label for="address">Description</label>
                          <textarea name="description" id="description" rows="4" cols="40" required class="form-control" ></textarea>
                          <!-- <textarea id="message" name="message" rows="4" cols="40"></textarea> -->
                        </div>
                        <div class="modal-footer">
                          <button type="submit" id="add-data" data-dismiss="modal"  class="btn btn-success" >Save</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                      </form>
                      <div id="banner-table-data"></div>
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
            <form id="mymodelform" >
                <input type="text" name="name" hidden id="employee_id">
              <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="imageInput" required class="form-control" placeholder="Enter your name">
              </div>
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="titleInput" required class="form-control" placeholder="Enter your name">
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="descriptionInput"  required class="form-control"></textarea>
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

            <div class="card-body">
              <table id="banner" class="table table-bordered table-hover">
                <thead>
                  <tr>  
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  
                  $sql = mysqli_query($conn, "SELECT id, image, title, description, status FROM banner order by id desc");
                  $i = 0;
                  while ($result = mysqli_fetch_array($sql)) {
                  $i++;
                  ?>
                    <tr>
                      <td class="align-middle"><?php echo $i; ?></td>
                      <td class="align-middle"><img src="images/banner/<?php echo $result['image']; ?>" class="img" width="60" height="60"></td>
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
                        <button class="delete-btn btn btn-danger" data-catdelid="<?Php echo $result['id'];?>" >Delete</button>
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
      let table = new DataTable('#banner');
    });
</script>