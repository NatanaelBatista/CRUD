<?php 

  if ( ! defined('ABSPATH') ) exit; 

  $model->get_register_form( chk_array( $param, 0 ) );
  
 ?>

<div class="col-md-12">

<?php 

  echo $model->form_msg;
     
?>

</div>

<h4>Visualizar usuário</h4>

<form method="post">

      <!-- Formulário para visualização -->
      
      <div class="form-group col-md-6">
        <label for="name">Nome Completo</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlentities( chk_array( $model->form_data, 'user_name' ) ); ?>" disabled="disabled">
      </div>
      <div class="form-group col-md-6">
        <label for="user">Login</label>
        <input type="text" class="form-control" id="user" name="user" value="<?php echo htmlentities( chk_array( $model->form_data, 'user' ) ); ?>" disabled="disabled">
      </div>
      <div class="form-group col-md-4">
        <label for="pwd">Senha</label>
        <input type="password" class="form-control" id="pwd" name="pwd" disabled="disabled">
      </div>
      <div class="form-group col-md-4">
        <label for="pwd_c">Confirme a Senha</label>
        <input type="password" class="form-control" id="pwd_c" name="pwd_c" disabled="disabled">
      </div>
      <div class="form-group col-md-4">
        <label for="sel1">Permissões</label>
        <select class="form-control" id="permission" name="permission" disabled="disabled">
          <option value="admin">Administrador</option>
          <option value="user">Usuário</option>
        </select>
      </div>
      <div class="form-group col-md-12">
        <div class="checkbox">
          <label><input type="checkbox" name="active" checked="checked" disabled="disabled">Ativo</label>
        </div>
      </div>

  <div class="col-md-10"></div>
  <div class="col-md-2">
    <a class="btn btn-warning" href="<?php echo HOME_URI; ?>/usuarios/editar/<?php echo chk_array( $model->form_data, 'user_id' ); ?>">Editar</a>
  </div>
</form>