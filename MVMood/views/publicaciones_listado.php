<?php 
$title = 'Home - MVM Mood'; 
include 'header.php'; 

?>
<?php if (!empty($_SESSION['mensaje'])): ?>
	<p class="ok"><?= $_SESSION['mensaje'] ?></p>
	<?php unset($_SESSION['mensaje']); ?>
<?php endif; ?>

<?php if (!empty($_SESSION['error'])): ?>
	<p class="error"><?= $_SESSION['error'] ?></p>
	<?php unset($_SESSION['error']); ?>
<?php endif; ?>


            <?php if (empty($publicaciones)): ?>
	<div class="post">
    	<p>No hay publicaciones todavía. ¡Sé el primero en publicar!</p>
	</div>
<?php else: ?>
	<?php foreach ($publicaciones as $p): ?>
    	<div class="post">
        	<div class="post-header">
            	<img src="images/<?= htmlspecialchars($p['usuario_foto']) ?>" alt="<?= htmlspecialchars($p['nickname']) ?>" class="avatar">
            	<div>
                	<div class="post-author"><?= htmlspecialchars($p['nickname']) ?></div>
                	<div class="post-meta"><?= date('d/m/Y H:i', strtotime($p['fecha'])) ?></div>
            	</div>
        	</div>
        	<div class="post-content"><?= nl2br(htmlspecialchars($p['contenido'])) ?></div>
        	<div class="post-actions">
            	<?php if ($p['idUsuario'] == $_SESSION['id'] || ACL::puede('publicaciones.eliminar')): ?>
                	<a href="index.php?controller=Publicaciones&action=editar_publicacion&id=<?= $p['id'] ?>" class="action-btn">✏️ Editar</a>
                	<a href="index.php?controller=Publicaciones&action=eliminar&id=<?= $p['id'] ?>" class="action-btn" onclick="return confirm('¿Seguro que quieres eliminar esta publicación?')">🗑️ Eliminar</a>
            	<?php endif; ?>
        	</div>
    	</div>
	<?php endforeach; ?>
<?php endif; ?>

<?php include 'footer.php'; ?>

