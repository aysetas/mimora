<?php 

include '../netting/baglan.php';

    $ayarsorgu = $db -> prepare("select * from ayar where ayar_id=?");
    $ayarsorgu -> execute (array(1));
    $ayarcek= $ayarsorgu -> Fetch(PDO::FETCH_ASSOC);       
?> 
<footer>
          <div class="pull-right">
            Mimora -Copyright &copy; 2020 |Design by:<?php echo $ayarcek['ayar_author'];?> <a href="#">MİMORA</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <script src="assets/js/bootstrap-fileupload.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>