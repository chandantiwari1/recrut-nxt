<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('public/css/bootstrap.min.css');?>">


    <title>Dependent Dropdown / Country > State > City</title>
  </head>
    <body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="bg-dark text-white p-3">Dependent Dropdown / Country > State > City</h3>
            </div>
            <div class="col-md-12">
                <?php 
                if(!empty($this->session->userdata('success'))) {
                    ?>
                    <div class="alert alert-success"><?php echo $this->session->userdata('success');?></div>
                    <?php
                }
                ?>

                <?php 
                if(!empty($this->session->userdata('error'))) {
                    ?>
                    <div class="alert alert-danger"><?php echo $this->session->userdata('error');?></div>
                    <?php
                }
                ?>
                <h3>Users</h3>
                <hr>

                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    <tbody>
                        <?php if(!empty($users)){
                            foreach($users as $user){
                        ?>
                        <tr>
                            <td><?php echo $user['id']?></td>
                            <td><?php echo $user['name']?></td>
                            <td><?php echo $user['total_sales']?></td>
                            <td><?php echo $user['country']?></td>
                            <td><?php echo $user['state']?></td>
                            <td><?php echo $user['city']?></td>
                            <td><?php echo $user['invoice']?></td>
                            <td><?php echo $user['customer_image']?></td>
                            <td><?php echo $user['invoice_date']?></td>
                        </tr>
                        <?php } 
                        }
                        ?>
                    </tbody>
                </table>
            </div>
         </div>
    </div>
</body>