<?php 

  if ( ! defined('ABSPATH') ) exit; 

  $model->get_register_form( chk_array( $param, 0 ) );
  
 ?>

<div class="col-md-12">
<?php 

  echo $model->form_msg;
     
?>
</div>
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Informações Principais</a></li>
  <li><a data-toggle="tab" href="#menu1">Informações de Contato</a></li>
  <li><a data-toggle="tab" href="#menu2">Segurança</a></li>
</ul>
<form method="post">
      
      <div class="form-group col-md-6">
        <label for="name">Nome Completo</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo chk_array( $model->form_data, 'user_name' ); ?>" placeholder="Insira o nome">
      </div>
      <div class="form-group col-md-6">
        <label for="user">Login</label>
        <input type="text" class="form-control" id="user" name="user" value="<?php echo chk_array( $model->form_data, 'user' ); ?>" placeholder="Insira o login">
      </div>
      <div class="form-group col-md-4">
        <label for="pwd">Senha</label>
        <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Insira a senha" disabled="disabled">
      </div>
      <div class="form-group col-md-4">
        <label for="pwd_c">Confirme a Senha</label>
        <input type="password" class="form-control" id="pwd_c" name="pwd_c" placeholder="confirme a senha" disabled="disabled">
      </div>
      <div class="form-group col-md-4">
        <label for="sel1">Permissões</label>
        <select class="form-control" id="sel1">
          <option>Administrador</option>
          <option>Usuário</option>
        </select>
      </div>
      <div class="form-group col-md-12">
        <div class="checkbox">
          <label><input type="checkbox" value="active">Ativo</label>
        </div>
      </div>

  <div class="col-md-10"></div>
  <div class="col-md-2">
    <a class="btn btn-warning" href="<?php echo HOME_URI; ?>/usuarios/editar/<?php echo chk_array( $model->form_data, 'user_id' ); ?>">Editar</a>
  </div>
</form>
<br>