<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Tulis Berita</h1>

    <!-- Default Card Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?php echo form_open_multipart(); ?>
            <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
            <div class="form-group">
                <label for="judul">Judul Berita</label>
                <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $post['judul']; ?>">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi Berita</label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?php echo $post['deskripsi']; ?>">
            </div>
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select class="form-control" id="kategori" name="kategori" value="<?php echo $post['kategori']; ?>">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>

            <div class="form-group">
                <label for="img">Deskripsi Berita</label>
                <input type="file" class="form-control-file" id="img">
            </div>

            <div class="form-group">
                <label for="isi">Isi Berita</label>
                <textarea class="form-control" id="isi" name="isi" rows="3" value="<?php echo $post['isi']; ?>"></textarea>
            </div>
            <button type="submit" name="edit_berita" class="btn btn-primary float-right">Kirim</button>
            <?php echo form_close(); ?>
        </div>
    </div>