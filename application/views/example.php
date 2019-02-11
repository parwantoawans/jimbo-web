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
		Data Master<br/>
		<a href='<?php echo site_url('welcome/tm_school')?>'>School</a> |
		<a href='<?php echo site_url('welcome/tp_school_year')?>'>School Year</a> |
		<a href='<?php echo site_url('welcome/tm_subjects')?>'>Subject</a> |
		<a href='<?php echo site_url('welcome/tm_type_nilai')?>'>Subject Value Type</a> |
		<a href='<?php echo site_url('welcome/tm_teachers')?>'>Teacher</a> |
		<a href='<?php echo site_url('welcome/students')?>'>Students</a> |
		<a href='<?php echo site_url('welcome/tm_agama')?>'>Agama</a> |
		<a href='<?php echo site_url('welcome/tm_articles_type')?>'>Article</a> |
		<a href='<?php echo site_url('welcome/tm_class')?>'>Class</a> |
		<a href='<?php echo site_url('welcome/tm_classes_program')?>'>Class Program</a> |
		<a href='<?php echo site_url('welcome/tm_events_type')?>'>Event</a> |
		<a href='<?php echo site_url('welcome/tm_extracuricullar')?>'>Extracuricullar</a> |
		<a href='<?php echo site_url('welcome/tm_food_menu')?>'>Food</a> |
		<a href='<?php echo site_url('welcome/tm_parents')?>'>Parent</a> |
	</div>
	<br/><br/>
	<div>
		Data Transaksi<br/>
		<a href='<?php echo site_url('welcome/input_nilai')?>'>Nilai</a> |
		<a href='<?php echo site_url('welcome/input_makanan')?>'>Makanan</a> |
		<a href='<?php echo site_url('welcome/input_extracuricullar')?>'>Extracuricullars</a> | 
		<a href='<?php echo site_url('welcome/jadwal_mata_pelajaran')?>'>Jadwal Mata Pelajaran</a> |		 
		<a href='<?php echo site_url('welcome/input_kelas')?>'>Kelas</a> |
		<a href='<?php echo site_url('welcome/nilai_anak/1')?>'>Lihat Nilai [BETA]</a> | 
		<a href='<?php echo site_url('welcome/input_article')?>'>Articles</a> |
		<a href='<?php echo site_url('welcome/input_event')?>'>Events</a> |
		<a href='<?php echo site_url('welcome/input_news')?>'>News</a> |
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
