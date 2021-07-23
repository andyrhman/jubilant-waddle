<!-- Pesan kalo sudah login -->
<?php if(isset($_SESSION['pesan'])): ?>
    <script src="js/sweetalert.min.js"></script> 
    <script>
        swal({
            title: "Selamat datang <?php echo $_SESSION['pesan'];?>",
            text: "Tekan oke untuk keluar...",
            icon: "<?php echo $_SESSION['type'];?>",
            button: "Oke",
        });
    </script>
    <?php unset($_SESSION['pesan'])?>
<?php endif;?>