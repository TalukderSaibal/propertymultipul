<?php
    echo $this->include('admin/include/header');
    echo $this->include('admin/include/sidebar');
?>   

    <?php echo $this->renderSection('content'); ?>

<?php
    echo $this->include('admin/include/footer');
?> 
