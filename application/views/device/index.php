<div class="container">
    <h3>List Device</h3>
    <div class="row mt-3">
        <div class="col-md-6">
            <a class="btn btn-primary" data-toggle="modal" data-target="#addDevice">Tambah Device</a>
        </div>
    </div>

    <?php if (empty($device)) : ?>
        <div class="row ml-4">
            <div class="alert alert-danger" role="alert">Device tidak ditemukan!</div>
        </div>

    <?php endif; ?>

    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger mt-3" role="alert">
            <?= validation_errors(); ?>
        </div>
    <?php endif ?>

    <?php if ($this->session->set_flashdata('flash')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Device berhasil <strong><?= $this->session->set_flashdata('flash'); ?></strong>!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif ?>

    <div class="row mt-3">
        <div class="col-md-80">
            <ul class="list-group">
                <?php foreach ($device as $list) : ?>
                    <li class="list-group-item disabled"><?= $list['nama_device']; ?>
                        <a class="btn btn-danger float-right ml-4" href="<?= base_url(); ?>ListDevice/delete/<?= $list['id_device']?>" onclick="return confirm('yakin ingin menghapus?');">Hapus</a>
                        <a class="btn btn-success float-right ml-4" href="<?= base_url(); ?>ListDevice/edit/<?= $list['id_device']?>">Edit</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

    </div>
</div>