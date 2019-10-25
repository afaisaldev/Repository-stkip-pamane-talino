<h4><?= $judul ?></h4>
<hr>

<?php foreach ($data->result() as $row): ?> 

<?php
$author1	= "SELECT * FROM authors WHERE id = '$row->id_author'";
$author2    = $this->db->query($author1)->row();
$author    = $author2->author;

$desc = substr($row->description, 0, 50);
?>

<div class="card-index">
  <a href="<?= base_url() ?>home/single/<?= $row->id ?>" class="font-weight-bold" style="margin-bottom: 1px"><?= $row->title ?></a>
  <p class="font-weight-light" style="margin-bottom: 1px; font-size: 14px"><?= $author ?> (<?= $row->year ?>)</p>
  <p class="font-weight-normal"><?= $desc ?> ...</p>
</div>  

<?php endforeach; ?>