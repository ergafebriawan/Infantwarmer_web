    <?php foreach ($device as $detail) : ?>
        <div class="modal fade" id="device<?= $detail['id_device']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?= $detail['nama_device']; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <center>
                            <img src="<?php if ($detail['suhu'] <= 20) {
                                            echo base_url() . '/assets/img/warning.png';
                                        } else if ($detail['suhu'] > 20 && $detail['suhu'] < 25) {
                                            echo base_url() . '/assets/img/normal.png';
                                        } else if ($detail['suhu'] >= 25) {
                                            echo base_url() . '/assets/img/alert.png';
                                        } ?>" alt="..." class="img-thumbnail">
                        </center>
                        <ul class="list-group mt-3">
                        <li class="list-group-item">ID Device : <?= $detail['id_device']; ?></li>
                            <li class="list-group-item">Detak jantung : <?= $detail['detak_jantung']; ?>bpm</li>
                            <li class="list-group-item">Suhu : <?= $detail['suhu']; ?> C</li>
                            <li class="list-group-item">Status : <?php if ($detail['suhu'] <= 20) {
                                                                        echo 'warning';
                                                                    } else if ($detail['suhu'] > 20 && $detail['suhu'] < 25) {
                                                                        echo 'normal';
                                                                    } else if ($detail['suhu'] >= 25) {
                                                                        echo 'danger';
                                                                    } ?> </li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark">Hapus</button>
                        <button type="button" class="btn btn-success">aktifkan kipas</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>