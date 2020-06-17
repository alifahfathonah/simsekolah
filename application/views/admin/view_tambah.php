<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sementara</title>
</head>
<body>
    <?php
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
            );
    ?>
    <form action="<?=base_url('admin_perpustakaan/tambah_user/create_user')?>" method="post">
        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
        <label>idgrup</label>
        <input type="text" name="idgrup" id="idgrup">
        <br>
        <label>email</label>
        <input type="text" name="email" id="email">
        <br>
        <label>password</label>
        <input type="text" name="password" id="password">
        <br>
        <label>statususer</label>
        <input type="text" name="statususer" id="statususer">
        <br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>