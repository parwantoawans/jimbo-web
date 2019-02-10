<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
</head>
<body>
	<div>
		<a href='<?php echo site_url('welcome/students')?>'>Students</a> |
		<a href='<?php echo site_url('welcome/input_nilai')?>'>Nilai</a> |
		<a href='<?php echo site_url('welcome/input_makanan')?>'>Makanan</a> |
		<a href='<?php echo site_url('welcome/input_extracuricullar')?>'>Extracuricullar</a> | 
		<a href='<?php echo site_url('welcome/jadwal_mata_pelajaran')?>'>Jadwal Mata Pelajaran</a> |		 
		<a href='<?php echo site_url('welcome/input_kelas')?>'>Kelas</a> |
		<a href='<?php echo site_url('welcome/nilai_anak/1')?>'>Lihat Nilai [BETA]</a>
		
	</div>
	<div style='height:20px;'></div>  
    <div style="padding: 10px">
		<?php echo $output; ?>
    </div>
    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
</body>
</html>
