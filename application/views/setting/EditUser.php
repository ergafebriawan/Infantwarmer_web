<div class="container">
    <h3>Update Password</h3>

    <form action="" method="post">
        <div class="form-group">
            <label for="id">User ID : <?= $user['user_id'];?></label><br>
            <label for="name">New Password</label>
            <input type="text" name="passEdit" class="form-control" aria-describedby="helpId" value="<?= $user['password'];?>">
            <small id="helpId" class="text-muted">isikan password baru</small>
        </div>

        <div class="modal-footer">
            <a href="<?= base_url('Setting')?>" class="btn btn-secondary" >Batal</a>
            <button type="submit" class="btn btn-info">Update</button>
        </div>
    </form>
</div>