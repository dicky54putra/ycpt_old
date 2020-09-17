<?php if ($this->session->userdata("level") == 0) { ?>
<footer class="main-footer">
	<!-- To the right -->
	<div class="pull-right hidden-xs">
		Dashboard Admin
	</div>
	<!-- Default to the left -->
	<strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#">Yayasan Catur Praya Tunggal</a></strong>
</footer>
<?php } else { ?>
<footer class="main-footer">
	<!-- To the right -->
	<div class="pull-right hidden-xs">
		Dashboard User
	</div>
	<!-- Default to the left -->
	<strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#">Yayasan Catur Praya Tunggal</a></strong>.
</footer>
<?php } ?>