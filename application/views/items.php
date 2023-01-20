<main>
    <div class="container-fluid px-4">
        <h3 class="mt-4">Items</h3>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item active">Items</li>
		</ol>

        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Data Items
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-10"></div>
                    <div class="col-sm-2">
                        <!-- <a class="btn btn-success" href="<?= site_url('invoice/tambah') ?>">+ Add Invoice</a> -->
                    </div>
                </div><br>

                <table class="display" id="table_item">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Type Item</th>
                            <th>Description</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <?php foreach ($item as $key => $data){ ?>
                    <tbody>
                        <tr>
                            <td><?= $data->id ?></td>
                            <td><?= $data->tipe_item ?></td>
                            <td><?= $data->deskripsi ?></td>
                            <td><?= $data->harga ?></td>
                            <!-- <td>
                                <center>
                                    <a class="btn btn-success btn-icon" href="<?= site_url('invoice/edit/' . $data->n_invoice) ?>"><i class="fas fa-pen"></i></a>
                                    <a class="btn btn-info btn-icon" href="<?php echo site_url('invoice/detail/' . $data->n_invoice)?>"><i class="fas fa-eye"></i></a> 
                                    <a class="btn btn-danger btn-icon" onclick="hapus('<?= $data->n_invoice ?>')" ><i class="fas fa-trash"></i></a>
                                </center>
                            </td> -->
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<script>
    
    $(document).ready(function(){
        $('#table_item').DataTable({
            "ordering": false,
            "searching": false
        });
    });

    function hapus(n_invoice) {
        Swal.fire({
            icon: "question",
            title: "Peringatan",
            text: "Apakah Anda yakin ingin melanjutkan?",
            showCancelButton: true,
            cancelButtonText: "Batal",
            confirmButtonText: "Ya, Lanjut",
            cancelButtonColor: "#008080",
            confirmButtonColor: "#ed0c0c",
            reverseButtons: true,
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "post",
                    dataType: 'json',
                    url: site_url + '/invoice/hapus',
                    data: {
                        n_invoice : n_invoice
                    },
                    success: function(response) {
                        Swal.fire({
                            confirmButtonColor: "#3ab50d",
                            icon: "success",
                            title: `${response.message.title}`,
                            html: `${response.message.body}`,
                        }).then((result) => {
                            $('.fa-refresh').trigger('click');
                        });
                    },
                    error: function(request, status, error) {
                        Swal.fire({
                            confirmButtonColor: "#3ab50d",
                            icon: "error",
                            title: `${request.responseJSON.message.title}`,
                            html: `${request.responseJSON.message.body}`,
                        });
                    },
                });
            }
        });
}

</script>