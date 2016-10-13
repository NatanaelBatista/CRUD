<?php 
  
  if ( ! defined('ABSPATH') ) exit;

  $model->create_register_form();
  
 ?>

<div class="col-md-12">

<?php 

  echo $model->form_msg;
     
?>

</div>

<h4>Inserir usuário</h4>

<form method="post">

      <!-- Formulário de cadastro -->

      <div class="form-group col-md-6">
        <label for="name">Nome Completo</label>
        <input type="text" class="form-control" id="name" name="user_name" placeholder="Insira o nome">
      </div>
      <div class="form-group col-md-6">
        <label for="user">Login</label>
        <input type="text" class="form-control" id="user" name="user" placeholder="Insira o login">
      </div>
      <div class="form-group col-md-4">
        <label for="pwd">Senha</label>
        <input type="password" class="form-control" id="pwd" name="user_password" placeholder="Insira a senha">
      </div>
      <div class="form-group col-md-4">
        <label for="pwd">Confirme a Senha</label>
        <input type="password" class="form-control" id="pwd" name="pwd" placeholder="confirme a senha">
      </div>
      <div class="form-group col-md-4">
        <label for="sel1">Permissões</label>
        <select class="form-control" id="permission" name="user_permissions">
          <option value="admin">Administrador</option>
          <option value="user">Usuário</option>
        </select>
      </div>
      <div class="form-group col-md-12">
        <div class="checkbox">
          <label><input type="checkbox" name="user_active" checked="checked">Ativo</label>
        </div>
      </div>

  <div class="col-md-10"></div>
  <div class="col-md-2">
    <button type="submit" class="btn btn-success">Enviar</button>
  </div>
</form>