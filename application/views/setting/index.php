<div class="container">
    <h3>User</h3>
    <div class="row mt-3">
        <div class="col-md-6">
            <button class="btn btn-info" data-toggle="modal" data-target="#addDevice">Tambah User</button>
        </div>
    </div>

    <?php if (empty($user)) : ?>
        <div class="row ml-4 mt-3">
            <div class="alert alert-danger" role="alert">user tidak ditemukan!</div>
        </div>

    <?php endif; ?>

    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger mt-3" role="alert">
            <?= validation_errors(); ?>
        </div>
    <?php endif ?>

    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            Device berhasil <strong><?= $this->session->flashdata('flash'); ?></strong>!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif ?>

    <div class="row mt-3">
        <div class="col-md-80">
            <ul class="list-group">
                <?php foreach ($user as $list) : ?>
                    <li class="list-group-item disabled"><?= $list['user_id']; ?>
                        <a class="btn btn-danger float-right ml-4" href="<?= base_url('Setting/delete'); ?>/<?= $list['user_id']?>" onclick="return confirm('yakin ingin menghapus?');">Hapus</a>
                        <a class="btn btn-success float-right ml-4" href="<?= base_url('Setting/edit'); ?>/<?= $list['user_id']?>">Update Password</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

    </div>
</div>