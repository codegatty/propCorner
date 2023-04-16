<?php
if(isset($_GET['Logged_out'])){
  echo '
  <div class="alert alert-info alert-dismissible">
<button type="button" class="close" data-dismiss="alert" id="close">&times;</button>
Youy successfully logged out.
</div>
  ';
}
?>