<?php
if (isset($_SESSION['message'])) :
?>

<div class="alert alert-warning alert-dismissible" role="alert">
  <strong>Hey! </strong><?= $_SESSION['message']; ?>
</div>

<?php
  unset($_SESSION['message']);
endif;
?>