<?php 

include("function/connection.php");
include("include/header.php");
 ?>


    <div class="container">

    <div class="row">
    <div class="col-md-12 data-table">
      <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Data</div>
        <div class="panel-body">
        <!-- Table -->
        <table class="table table-striped data">
        <thead>
           <tr>
            <th>No</th>
            <th>Kode Peserta</th>
            <th>Tgl. Daftar</th>
            <th>Tgl. Lahir</th>
            <th>Umur</th>
            <th>Gender</th>
          </tr>
        </thead>
        <tbody>
      <?php 

      $query = mysqli_query($connect_clean,"SELECT * FROM table_clean_1");
      $no = 1;
      while($row = mysqli_fetch_assoc($query)){

      ?>
          
          <tr>
            <th><?php echo $no++; ?></th>
            <th><?php echo $row['kd_peserta']; ?></th>
            <th><?php echo $row['tgl_daftar']; ?></th>
            <th><?php echo $row['tgl_lahir']; ?></th>
            <th><?php 

              if($row['umur'] == 0 ){
                $tanggall = new DateTime($row['tgl_lahir']);
                $tanggal2 = new DateTime($row['tgl_daftar']);
                
                $interval = date_diff($tanggall, $tanggal2);
                echo $interval->format('%R%a hari');
              }else {
                echo $row['umur'];
              }

            ?></th>
            <th><?php echo $row['jenis_kelamin']; ?></th>
          </tr>

      <?php
      
      }

       ?>
       </tbody>
       </table>
      </div>
      </div>
    </div>
    <?php 
      $tanggal1 = new DateTime("2011-07-06");
      $tanggal2 = new DateTime();
       
      $perbedaan = $tanggal2->diff($tanggal1)->format("%a");
       
      echo $perbedaan;
     ?>
    </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->


  <script type="text/javascript">
    $(document).ready(function(){
      $('.data').DataTable();
    });
  </script>
  </body>
</html>
