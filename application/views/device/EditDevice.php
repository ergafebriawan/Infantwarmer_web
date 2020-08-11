<div class="container">
    <h3>Edit Device</h3>

    <form action="" method="post">
        <div class="form-group">
            <label for="id">ID Device : <?= $device['id_device'];?></label><br>
            <label for="name">Nama Device</label>
            <input type="text" name="nameEdit" id="name" class="form-control" aria-describedby="helpId" value="<?= $device['nama_device'];?>">
            <small id="helpId" class="text-muted">isikan nama device</small>
        </div>

        <div class="modal-footer">
            <a href="<?= base_url()?>ListDevice" class="btn btn-secondary" >Batal</a>
            <button type="submit" class="btn btn-info">Edit Device</button>
        </div>
    </form>
</div>