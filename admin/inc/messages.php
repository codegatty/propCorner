<?php
if(isset($_GET['Login_First'])){
    echo '
    <div class="alert alert-info alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  You must login to continue.
</div>
    ';
}
else if(isset($_GET['Logged_out'])){
  echo '
  <div class="alert alert-info alert-dismissible">
<button type="button" class="close" data-dismiss="alert" id="close">&times;</button>
<script>
  
</script>
Youy successfully logged out.
</div>
  ';
}
?>