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
                            <img src="<?php if ($detail['suhu'] <= 0) {
                                                    echo base_url() . '/assets/img/not_active.png';
                                                } else if ($detail['suhu'] > 0 && $detail['suhu'] < 20) {
                                                    echo base_url() . '/assets/img/active.png';
                                                } else if ($detail['suhu'] >= 20 && $detail['suhu'] <= 25) {
                                                    echo base_url() . '/assets/img/normal.png';
                                                } else if ($detail['suhu'] > 25 && $detail['suhu'] <= 28) {
                                                    echo base_url() . '/assets/img/warning.png';
                                                }else if ($detail['suhu'] > 28) {
                                                    echo base_url() . '/assets/img/alert.png';
                                                } ?>" alt="..." class="img-thumbnail">
                        </center>
                        <ul class="list-group mt-3">
                        <li class="list-group-item">ID Device : <?= $detail['id_device']; ?></li>
                            <li class="list-group-item">Detak jantung : <?= $detail['detak_jantung']; ?>bpm</li>
                            <li class="list-group-item">Suhu : <?= $detail['suhu']; ?> C</li>
                            <li class="list-group-item">Status : <?php if ($detail['suhu'] <= 0) {
                                                    echo 'not active device';
                                                } else if ($detail['suhu'] > 0 && $detail['suhu'] < 20) {
                                                    echo 'active device';
                                                } else if ($detail['suhu'] >= 20 && $detail['suhu'] <= 25) {
                                                    echo 'normal temperature';
                                                } else if ($detail['suhu'] > 25 && $detail['suhu'] <= 28) {
                                                    echo 'warning temperature';
                                                }else if ($detail['suhu'] > 28) {
                                                    echo 'danger, segera hidpkan kipas';
                                                } ?> </li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark">Hapus</button>
                        <?php if ($detail['kipas'] == 0) {
                        echo '<a href=' . base_url() . 'Home/kontrolOn/' . $detail['id_device'] . ' class="jarak btn btn-dark">Matikan Kipas</a>';
                    } else {
                        echo '<a href=' . base_url() . 'Home/kontrolOff/' . $detail['id_device'] . ' class="jarak btn btn-success">Hidupkan Kipas</a>';
                    } ?>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>