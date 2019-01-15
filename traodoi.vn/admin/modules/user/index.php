<?php 
    $open = "user";
    require_once __DIR__. "/../../autoload/autoload.php";

    if (isset($_GET['page']))
    {
        $p = $_GET['page'];
    }
    else
    {
        $p = 1;
    }

    $sql = "SELECT user.* from user ORDER BY id DESC";

    
    $user = $db->fetchJone("user",$sql,$p,10,true);
    if(isset($user['page']))
    {
        $sotrang = $user['page'];
        unset($user['page']);
    }
 ?>
<?php require_once __DIR__. "/../../layouts/header.php"; ?>
                    <!-- Nội dung bên trong website-->
                    <!-- Breadcrumbs-->
                     <div id="content-wrapper">

                        <div class="container-fluid">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/traodoivn/admin/">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Quản lý User</li>
                            </ol>
                            <!-- Page Content -->
                            <h1>Danh sách các User</h1>
                            <hr>
                            <div class="clearfix"></div>
                            <?php require_once __DIR__. "/../../../partials/notifications.php" ?>
                                <div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Bảng user
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div id="dataTable_filter" class="dataTables_filter"><label>Tìm kiếm:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 61px;">ID</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 83px;">Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 49px;">Created</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Email</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Phone</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Address</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 64px;">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">ID</th>
                                    <th rowspan="1" colspan="1">Name</th>
                                    <th rowspan="1" colspan="1">Created</th>
                                    <th rowspan="1" colspan="1">Email</th>
                                    <th rowspan="1" colspan="1">Phone</th>
                                    <th rowspan="1" colspan="1">Address</th>
                                    <th rowspan="1" colspan="1">Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($user as $item): ?>
                                <tr role="row" class="odd">
                                    <td class="sorting_1"><?php echo $item['id']  ?></td>
                                    <td><?php echo $item['name']  ?></td>
                                    <td><?php echo $item['created_at']  ?></td>
                                    <td><?php echo $item['email']  ?></td>
                                    <td><?php echo $item['phone']  ?></td>
                                    <td><?php echo $item['address']  ?></td>
                                    <td>
                                        <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>">Xóa</a>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                <?php for($i = 1; $i <= $sotrang; $i++): ?>
                                    <?php 
                                        if(isset($_GET['page']))
                                        {
                                            $p = $_GET['page'];
                                        }
                                        else
                                        {
                                            $p = 1;
                                        }
                                     ?>
                                     <li class="<?php echo ($i == $p) ? 'active':'' ?>">
                                        <a href="?page=<?php echo $i; ?>" aria-controls="dataTable" data-dt-idx="<?php echo $i; ?>" tabindex="0" class="page-link"><?php echo $i; ?>
                                        </a>
                                    </li>
                                <?php endfor ?>                    
                                <li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                                </div>
                            
                <!-- /.container-fluid -->
                        </div>
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>                