<body>
    <script src=""></script>
    <script src="<?= base_url('assets/js/jquery-3.6.0.min.js'); ?>"></script>
    <script src="<?= base_url();?>assets/js/feather.min.js"></script>
    <script src="<?= base_url();?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url();?>assets/dashboard.js"></script>
    <script src="<?= base_url('assets/datatables/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/datatables/js/dataTables.bootstrap5.js'); ?>"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>
</body>

</html>