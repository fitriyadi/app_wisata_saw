<div class="row">
    <div class="col-sm-12">
        <h4 class="header-title m-t-0 m-b-20">Data member
        </h4>

    </div>
</div> <!-- end row -->

<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive m-b-20">

            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Kode </th>
                        <th>Nama </th>
                        <th>Username </th>
                        <th>Password </th>
                        <th>No Telpon </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $query="SELECT * from tb_member";
                    $result=$mysqli->query($query);
                    $num_result=$result->num_rows;
                    if ($num_result > 0 ) { 
                        while ($data=mysqli_fetch_assoc($result)) {
                        extract($data);
                    ?>
                        <tr>
                        <td><?php echo $member_id; ?></td>
                        <td><?php echo $member_name; ?></td> 
                        <td><?php echo $member_username; ?></td>
                        <td><?php echo $member_password; ?></td>
                        <td><?php echo $member_phone; ?></td>                     
                        </tr>
                <?php }} ?>
                </tbody>
            </table>
        </div>
    </div>
</div>