<?php 

  if ( ! defined('ABSPATH') ) exit;

  $model->edit_register_form( chk_array( $param, 0 ) );
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
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <br>
      <div class="form-group col-md-6">
        <label for="nome">Nome Completo</label>
        <input type="text" class="form-control" id="nome" placeholder="Insira o nome">
      </div>
      <div class="form-group col-md-3">
        <label for="cpf">CPF</label>
        <input type="text" class="form-control" id="cpf" placeholder="Insira o CPF">
      </div>
      <div class="form-group col-md-3">
        <label for="RG">RG</label>
        <input type="text" class="form-control" id="RG" placeholder="Insira RG">
      </div>
      <div class="form-group col-md-4">
        <label for="nome_login">Data de emissão</label>
        <input type="date" class="form-control" id="nome_login" placeholder="Insira o nome para login">
      </div>
      <div class="form-group col-md-3">
        <label for="RG">Órgão Emissor</label>
        <input type="text" class="form-control" id="RG" placeholder="Insira RG">
      </div>
      <div class="form-group col-md-4">
        <label for="nome">Data de Nascimento</label>
        <input type="date" class="form-control" id="nome" placeholder="Insira o nome">
      </div>
      <div class="form-group col-md-4">
        <label for="sel1">Estado Civil</label>
        <select class="form-control" id="sel1">
          <option>Solteiro(a)</option>
          <option>Casado(a)</option>
          <option>Divorciado(a)</option>
          <option>Viúvo(a)</option>
          <option>União estável</option>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="sel1">Escolaridade</label>
        <select class="form-control" id="sel1">
          <option>Fundamental</option>
          <option>Médio</option>
          <option>Médio Imcompleto</option>
          <option>Superior</option>
          <option>Superior Incompleto</option>
        </select>
      </div>
      <div class="form-group col-md-12">
        <div class="radio">
          <label><input type="radio" name="optradio">Masculino</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="optradio">Feminino</label>
        </div>
      </div>
    </div>
    <div id="menu1" class="tab-pane fade">
      <br>
      <div class="form-group col-md-6">
        <label for="nome">Endereço</label>
        <input type="text" class="form-control" id="nome" placeholder="Insira o nome">
      </div>
      <div class="form-group col-md-6">
        <label for="nome">Complemento</label>
        <input type="text" class="form-control" id="nome" placeholder="Insira o nome">
      </div>
      <div class="form-group col-md-4">
        <label for="nome">CEP</label>
        <input type="text" class="form-control" id="nome" placeholder="Insira o nome">
      </div>
      <div class="form-group col-md-2">
        <label for="nome">UF</label>
        <input type="text" class="form-control" id="nome" placeholder="Insira o nome">
      </div>
      <div class="form-group col-md-6">
        <label for="nome">Cidade</label>
        <input type="text" class="form-control" id="nome" placeholder="Insira o nome">
      </div>
       <div class="form-group col-md-6">
        <label for="nome">Bairro</label>
        <input type="text" class="form-control" id="nome" placeholder="Insira o nome">
      </div>
      <div class="form-group col-md-2">
        <label for="nome">Número</label>
        <input type="text" class="form-control" id="nome" placeholder="Insira o nome">
      </div>
       <div class="form-group col-md-6">
        <label for="nome">email</label>
        <input type="text" class="form-control" id="nome" placeholder="Insira o nome">
      </div>
       <div class="form-group col-md-3">
        <label for="nome">Telefone</label>
        <input type="tel"  class="form-control" id="nome" placeholder="Insira o nome">
      </div>
       <div class="form-group col-md-3">
        <label for="nome">Celular</label>
        <input type="tel" class="form-control" id="nome" placeholder="Insira o nome">
      </div>
    </div>
    <div id="menu2" class="tab-pane fade">
      <br>
      <div class="form-group col-md-6">
        <label for="login">Login</label>
        <input type="text" class="form-control" id="login" name="user" placeholder="Insira o login" value="<?php echo chk_array( $model->form_data, 'user' ); ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="sel1">Permissões</label>
        <select class="form-control" id="sel1">
          <option>Administrador</option>
          <option>Usuário</option>
          <option>Master</option>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label for="pwd">Senha</label>
        <input type="password" class="form-control" id="pwd" name="user_password" placeholder="Insira a senha">
      </div>
      <div class="form-group col-md-3">
        <label for="nome">Confirme a Senha</label>
        <input type="text" class="form-control" id="" placeholder="Insira o nome">
      </div>
      <div class="form-group col-md-12">
        <div class="panel-group" id="accordion">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Pacientes</a>
              </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse in">
              <div class="panel-body">
                <div class="checkbox">
                  <label><input type="checkbox" value="">Criar</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" value="">Editar</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" value="">Excluir</label>
                </div>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Medicamentos</a>
              </h4>
            </div>
            <div id="collapse2" class="panel-collapse collapse">
              <div class="panel-body">
                <div class="checkbox">
                  <label><input type="checkbox" value="">Criar</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" value="">Editar</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" value="">Excluir</label>
                </div>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Usuários</a>
              </h4>
            </div>
            <div id="collapse3" class="panel-collapse collapse">
              <div class="panel-body">
                <div class="checkbox">
                  <label><input type="checkbox" value="">Criar</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" value="">Editar</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" value="">Excluir</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group col-md-12">
        <div class="checkbox">
          <label><input type="checkbox" value="">Ativo</label>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-8"></div>
  <div class="col-md-2">
    <button type="resert" class="btn btn-warning">Cancelar</button>
  </div>
  <div class="col-md-2">
    <button type="submit" class="btn btn-success">Enviar</button>
  </div>
</form>
<br>