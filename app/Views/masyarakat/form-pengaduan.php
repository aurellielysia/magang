<?=$this->extend('masyarakat/dashboard');?>
<?=$this->section('konten');?>

<h1><?=$judulHalaman;?></h1>
<p><?=$introTeks;?></p>
<?=session()->getFlashData('info');?>
<form method="POST"  action="<?=site_url('kirim-pengaduan');?>" enctype="multipart/form-data">
    <?=csrf_field();?>
    <div class="row">
        <label class="fw-bold"for="">Tanggal Pengaduan</label>
        <div>
            <input type="text" name="txtTglPengaduan" class="form-control" value="<?=date('d-m-Y H:i:s');?> wib" readonly/>
        </div>
    </div>
    <div class="row">
        <label class="fw-bold"for="">Nomor Induk Kependudukan</label>
        <div>
            <input type="number" name="txtNIK" class="form-control" placeholder="masukan isi form" autofocus/>
        </div>
    </div>
    <div class="row">
        <label class="fw-bold"for="">Isi Laporan</label>
        <div>
            <textarea name="txtIsiLaporan" class="form-control" rows="5" placeholder="masukan isi form" ></textarea>
        </div>
    </div>
    <div class="row">
        <label class="fw-bold"for="formFile" class="form-label">Upload Foto</label>
        <div>
        <input class="form-control" type="file" name="fileNya" id="formFile"/>
        </div>
    </div>
    <div class="row mt-3">
        <div>
        <button type="submit" class="btn btn-success">
            kirim
        </button>
</div>
</div>
</form>
<?=$this->endSection();?>