<style>
    .garis{
        border-left: 1px black solid;
        height: 70px;
        width: 0px;
    }
    .garis_panjang{
        border-right: 1px black solid;
        height: 130px;
        width: 0px;
    }
</style>

<main>
    <div class="container-fluid px-4">
		<h3 class="mt-4">Data Detail Invoice</h3>
		<ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?= site_url('invoice')?>">Invoice</a></li>
			<li class="breadcrumb-item active">Data Detail Invoice</li>
		</ol>

        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Detail Invoice
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8">
                        <h1>INVOICE</h1><br><br><br>
                        <div class="row">
                            <div class="col-sm-2">
                                <p class="lh-sm" style="text-align: left;">Invoice ID</p>
                                <p class="lh-sm" style="text-align: left;">Issue Date</p>
                                <p class="lh-sm" style="text-align: left;">Due Date</p>
                                <p class="lh-sm" style="text-align: left;">Subject</p>
                            </div>
                            <div class="col-sm-1">
                                <div class="garis_panjang"></div>
                            </div>
                            <div class="col-sm-6">
                                <p class="lh-sm"><?= $invoice['n_invoice'] ?></p>
                                <p class="lh-sm"><?= $invoice['tanggal'] ?></p>
                                <p class="lh-sm"><?= $invoice['tempo'] ?></p>
                                <p class="lh-sm"><?= $invoice['keterangan'] ?></p>
                            </div>
                        </div><br>
                    </div>
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-sm-5">
                                <p style="text-align: right;">From</p>
                            </div>
                            <div class="col-sm-1">
                                <div class="garis"></div>
                            </div>
                            <div class="col-sm-6">
                                <b><?= $invoice['nama_pengirim'] ?></b>
                                <p><?= $invoice['alamat_pengirim'] ?></p>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-sm-5">
                                <p style="text-align: right;">For</p>
                            </div>
                            <div class="col-sm-1">
                                <div class="garis"></div>
                            </div>
                            <div class="col-sm-6">
                                <b><?= $invoice['nama_penerima'] ?></b>
                                <p><?= $invoice['alamat_penerima'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width:20%">Item Type</th>
                            <th style="width:30%">Description</th>
                            <th style="width:10%">Quantity</th>
                            <th style="width:15%">Unit Price</th>
                            <th style="width:15%">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($items as $key => $value){?>
                        <tr>
                            <td><?= $value->tipe_item ?></td>
                            <td><?= $value->deskripsi ?></td>
                            <td><?= $value->jumlah_barang ?></td>
                            <td><?= $value->harga ?></td>
                            <td><?= $value->total ?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table><br>

                <div class="row">
                    <div class="col-sm-8"></div>
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="fw-lighter" style="text-align: right">Subtotal</p>
                                <p class="fw-lighter" style="text-align: right">Tax(10%)</p>
                                <p class="fw-lighter" style="text-align: right">Payments</p>
                                <p style="text-align: right"><b>Amount Due</b></p>
                            </div>
                            <div class="col-sm-6">
                                <?php
                                    $sub = $total['subtotal'];
                                    $pajak = $sub * 0.1;
                                    $payment = $sub + $pajak;
                                ?>
                                <p class="fw-lighter">Rp. <?= $total['subtotal'] ?></p>
                                <p class="fw-lighter">Rp. <?= $pajak?></p>
                                <p class="fw-lighter">Rp. <?= $payment ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<!-- <script>
    $(document).ready(function(){
        var sub = $('#total').val();

        $('#pajak').val(sub);

    })

</script> -->