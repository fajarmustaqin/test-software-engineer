<main>
	<div class="container-fluid px-4">
		<h3 class="mt-4">Form Invoice</h3>
		<ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?= site_url('invoice')?>">invoice</a></li>
			<li class="breadcrumb-item active">form invoice</li>
		</ol>
		
		<form action="" id="form-invoice">
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="">Name from</label>
						<input type="text" name="nama_pengirim" value="<?= $invoice['nama_pengirim'] ?>" class="form-control">
					</div><br>
                    <div class="form-group">
						<label for="">Address from</label>
                        <textarea name="alamat_pengirim" class="form-control" maxlength="255" rows="2" placeholder="Alamat lengkap" ><?= $invoice['alamat_pengirim'] ?></textarea>
					</div><br>
					<div class="form-group">
						<label for="">Date</label>
						<div class="input-group">
							<input type="text" class="form-control datepicker" name="tanggal" id="tanggal" value="<?= $invoice['tanggal'] ?>">
							<span class="input-group-text"><i class="fa fa-calendar"></i></span>
						</div>
					</div><br>
					<div class="form-group">
						<label for="">Subject</label>
						<input type="text" name="keterangan" value="<?= $invoice['keterangan'] ?>" class="form-control">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="">Name for</label>
						<input type="text" name="nama_penerima" class="form-control" value="<?= $invoice['nama_penerima'] ?>">
					</div><br>
                    <div class="form-group">
						<label for="">Address for</label>
                        <textarea name="alamat_penerima" class="form-control" maxlength="255" rows="2" placeholder="Alamat lengkap" ><?= $invoice['alamat_penerima'] ?></textarea>
					</div><br>
					<div class="form-group">
						<label for="">Date Due</label>
						<div class="input-group">
							<input type="text" class="form-control datepicker" name="tempo" id="tempo" value="<?= $invoice['tempo'] ?>">
							<span class="input-group-text"><i class="fa fa-calendar"></i></span>
						</div>
					</div>
				</div>
			</div><br>
            <h3>ITEMS</h3><br>
            <div class="control-group after-add-more">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="">Item Type</label>
                            <!-- <input type="text" class="form-control" name="type_item[]"> -->
                            <select name="tipe_item[]" class="form-control">
                                <option selected disabled>Select Type Item</option>
                                <?php foreach($items as $key => $val){ ?>
                                    <option value="<?= $val->id ?>"><?= $val->tipe_item ?></option>
                                <?php 
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">Description</label>
                            <!-- <input type="text" class="form-control" name="desc[]" id="desc"> -->
                            <select name="desc[]" class="form-select">
                                <option selected disabled>select Description</option>
                                <?php foreach($items as $key => $val){ ?>
                                    <option value="<?= $val->deskripsi ?>"><?= $val->deskripsi ?> | <?= $val->tipe_item ?></option>
                                <?php 
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Price</label>
                            <select name="harga[]" class="form-select ">
                                <option selected disabled>select Price</option>
                                <?php foreach($items as $key => $val){ ?>
                                    <option value="<?= $val->harga ?>">Rp. <?= $val->harga ?></option>
                                <?php 
                                }
                                ?>
                            </select>
                            <!-- <input type="text" name="harga[]" class="form-control price" id="price"> -->
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label>Qty</label>
                            <input type="number" name="jumlah[]" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" name="total[]" class="form-control price">
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for=""></label><br>
                            <button class="btn btn-success add-more" type="button">
                                <i class="glyphicon glyphicon-plus"></i> Add
                            </button>
                        </div>
                    </div>
                </div>
            </div><hr>
            <center>
                <button type="submit" class="btn btn-success">Submit</button>
            </center>
		</form>
	</div>
</main>

<div class="copy invisible"><br>
    <div class="control-group">
        <div class="row">
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="">Item Type</label>
                    <!-- <input type="text" class="form-control" name="type_item[]"> -->
                    <select name="tipe_item[]" class="form-control">
                        <option selected disabled>Select Type Item</option>
                        <?php foreach($items as $key => $val){ ?>
                            <option value="<?= $val->id ?>"><?= $val->tipe_item ?></option>
                        <?php 
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="">Description</label>
                    <!-- <input type="text" class="form-control" name="desc[]" id="desc"> -->
                    <select name="desc[]" class="form-select">
                        <option selected disabled>select Description</option>
                        <?php foreach($items as $key => $val){ ?>
                            <option value="<?= $val->deskripsi ?>"><?= $val->deskripsi?> | <?= $val->tipe_item ?></option>
                        <?php 
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Price</label>
                    <select name="harga[]" class="form-select">
                        <option selected disabled>select Price</option>
                        <?php foreach($items as $key => $val){ ?>
                            <option value="<?= $val->harga ?>">Rp. <?= $val->harga ?></option>
                        <?php 
                        }
                        ?>
                    </select>
                    <!-- <input type="text" name="harga[]" class="form-control price" id="price"> -->
                </div>
            </div>
            <div class="col-sm-1">
                <div class="form-group">
                    <label>Qty</label>
                    <input type="number" name="jumlah[]" class="form-control">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Amount</label>
                    <input type="text" name="total[]" class="form-control price">
                </div>
            </div>
            <div class="col-sm-1">
                <div class="form-group">
                    <label for=""></label><br>
                    <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

function formatRupiah(angka, prefix) {
	var number_string = angka.replace(/[^-.\d]/g, '').toString(),
		split = number_string.split('.'),
		sisa = split[0].length % 3,
		rupiah = split[0].substr(0, sisa),
		ribuan = split[0].substr(sisa).match(/[-\d]{3}/gi);
	// tambahkan titik jika yang di input sudah menjadi angka ribuan
	if (ribuan) {
		separator = sisa ? ',' : '';
		rupiah += separator + ribuan.join(',');
	}

	rupiah = split[1] != undefined ? rupiah + '.' + split[1] : rupiah;
	return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
}


    $(document).ready(function () {
        $('#table_item').DataTable({
            "ordering": false,
            "paging": false,
            "searching": false
        });

        $(document).on('keyup', '.price', function (event) {
            $(this).val(formatRupiah(this.value));
        });

        
        $('#item_type').change(function (e) {
            let id = $(this).val();
            $.getJSON(
                `${site_url}api/item/${id}`,
                null,
                function (data, textStatus, jqXHR) {
                    if (data != null) {
                        $('#desc').val(data.desc);
                        $('#price').val(data.price);
                    }
                });
    })
        
        $(document).ready(function() {
        $(".add-more").click(function(){ 
            var html = $(".copy").html();
            $(".after-add-more").after(html);
        });

        // saat tombol remove dklik control group akan dihapus 
        $("body").on("click",".remove",function(){ 
            $(this).parents(".control-group").remove();
        });

        $('#form-invoice').submit(function (e) {
        e.preventDefault();
        // if($(this).parsley().isValid()){
            Swal.fire({
                icon: "question",
                title: "Warning",
                text: "are you sure to save this data?",
                showCancelButton: true,
                cancelButtonText: "Cancel",
                confirmButtonText: "Save",
                confirmButtonColor: "#008080",
                reverseButtons: true,
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: 'ajax',
                        method: 'POST',
                        url: site_url + 'invoice/simpan',
                        data: $(this).serialize(),
                        dataType: 'json',
                        success: function (response) {
                            if ((typeof response === 'string' || response instanceof String)) {
                                Swal.fire('Gagal!', 'Aplikasi gagal terhubung dengan server. Silahkan hubungi admin.', 'error');
                            }
                            if (response.status == 201) {
                                Swal.fire('Pendataan Berhasil!', response.message, 'success').then(function () {
                                    location.href = site_url+'invoice';
                                })
                            }
                        },
                        error: function (e) {
                            console.log(e);
                        },
                    });
                }
            });            
            
        // }
    });
    });
});
</script>