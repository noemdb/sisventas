<?php echo Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE', 'class'=>'form-horizontal', 'role'=>'form']); ?>

    <div class="btn-group pull-right">
	    <button type="submit" class="btn btn-danger pull-right" onclick="return confirm('Estas seguro? se borrará el usuario y el perfil');">
	        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
	        Eliminar 
	    </button>
	</div>
<?php echo Form::close(); ?>