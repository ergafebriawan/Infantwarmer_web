<div class="row">
    <?php if (empty($device)) : ?>
        <div class="row ml-4">
            <div class="alert alert-danger" role="alert">Device tidak ditemukan!</div>
        </div>

    <?php endif;
    foreach ($device as $map) : ?>
        <div class="col-sm-3 mb-3">
            <div class="card" style="width: 15rem;">
                <img class="card-img-top" src="<?php
                                                if ($map['suhu'] <= 0) {
                                                    echo base_url() . '/assets/img/not_active.png';
                                                } else if ($map['suhu'] > 0 && $map['suhu'] < 20) {
                                                    echo base_url() . '/assets/img/active.png';
                                                } else if ($map['suhu'] >= 20 && $map['suhu'] <= 25) {
                                                    echo base_url() . '/assets/img/normal.png';
                                                } else if ($map['suhu'] > 25 && $map['suhu'] <= 28) {
                                                    echo base_url() . '/assets/img/warning.png';
                                                }else if ($map['suhu'] > 28) {
                                                    echo base_url() . '/assets/img/alert.png';
                                                }
                                                ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $map['nama_device']; ?></h5>
                    <p class="card-text">ID Device : <?php echo $map['id_device']; ?></p>
                    <p class="card-text">Detak jantung : <?php echo $map['detak_jantung']; ?> bpm</p>
                    <p class="card-text">Suhu : <?php echo $map['suhu']; ?> C</p>
                    <?php if ($map['kipas'] == 0) {
                        echo '<a href=' . base_url() . 'Home/kontrolOn/' . $map['id_device'] . ' class="jarak btn btn-dark">Kipas Off</a>';
                    } else {
                        echo '<a href=' . base_url() . 'Home/kontrolOff/' . $map['id_device'] . ' class="jarak btn btn-success">Kipas On</a>';
                    } ?>
                    <button class="jarak btn btn-info" data-toggle="modal" data-target="#device<?= $map['id_device']; ?>">Detail</button>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>