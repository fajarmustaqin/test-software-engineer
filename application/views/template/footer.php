                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Invoice Program 2023</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="<?= base_url('public') ?>/library/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('public/assets/app-template/') ?>js/scripts.js"></script>
        <script src="<?= base_url('public') ?>/library/select2/select2.min.js"></script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>  
    </body>
</html>

<script>
    $(function(){
        $('.select2').select2({
            theme: 'bootstrap4'
        });

        $('.datepicker').datepicker({
            language: 'id',
            autoclose: true,
            orientation: "bottom",
            todayHighlight: true,
            format: "yyyy-mm-dd",
        });
    })
</script>