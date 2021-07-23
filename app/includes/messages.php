<?php if(isset($_SESSION['message'])): ?>
    <script src="js/sweetalert.min.js"></script> 
    <script>
        swal({
            title: "<?php echo $_SESSION['message'];?>",
            text: "Tekan oke untuk keluar...",
            icon: "<?php echo $_SESSION['type'];?>",
            button: "Oke",
        });
    </script>
    <?php unset($_SESSION['message'])?>
<?php endif;?>