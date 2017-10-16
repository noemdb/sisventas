<?php echo Form::open(['route' => ['profiles.destroy', $profile->id], 'method' => 'DELETE', 'role'=>'form']); ?>

    <div class="btn-group pull-right">
	    <button type="submit" class="btn btn-danger pull-right" onclick="return confirm('Estas seguro? se borrará el perfil y el  usuario');">
	        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
	        Eliminar 
	    </button>
	</div>
<?php echo Form::close(); ?>