<?php

  if ( ! defined('ABSPATH') ) exit;

  // Lista os usuários
  $lista = $model->get_user_list();

?>

<!--<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">-->
<table class="table">

  <thead>
    <tr>
      <th>ID</th>
      <th class="">Nome</th>
      <th class="">Login</th>
      <th class="">Permissão</th>
      <th class="">Ativo</th>
      <th class=""></th>
    </tr>
  </thead>
  <tbody>

  <?php foreach ($lista as $fetch_userdata): ?>
  
    <tr>
      <td><?php echo $fetch_userdata['user_id'] ?></td>
      <td class=""><a href="<?php echo HOME_URI; ?>/usuarios/visualizar/<?php echo $fetch_userdata['user_id'] ?>"><?php echo $fetch_userdata['user_name'] ?></td>
      <td><?php echo $fetch_userdata['user'] ?></td>
      <td><?php echo $fetch_userdata['user_permissions'] ?></td>
      <td><?php echo $fetch_userdata['user_active'] ?></td>
      <td>
        <a class="btn btn-warning btn-xs" href="<?php echo HOME_URI; ?>/usuarios/editar/<?php echo $fetch_userdata['user_id'] ?>">Editar</a>
      </td>
    </tr>

  <?php endforeach; ?>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>
        <a class="btn btn-success btn-xs" href="<?php echo HOME_URI; ?>/usuarios/inserir">Novo</a>
      </td>
    </tr>
  </tbody>
</table>