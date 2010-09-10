<?php /*%%SmartyHeaderCode:114944c897794ddf5d7-55175402%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21edf8a46431956d115895281277ec812848b2cf' => 
    array (
      0 => 'views/professor/templates/professor.tpl',
      1 => 1283914617,
    ),
  ),
  'nocache_hash' => '114944c897794ddf5d7-55175402',
  'has_nocache_code' => false,
  'cache_lifetime' => 50,
)); /*/%%SmartyHeaderCode%%*/?>
<h1>Cadastro de Professor</h1>
<div>Nome</div>
<input type="text" id="nome" name="nome" value="" maxlength="100" class="ui-state-default ui-corner-all width100" />
<div>Sobrenome</div>
<input type="text" id="sobrenome" name="sobrenome" value="" maxlength="100" class="ui-state-default ui-corner-all width100" />
<div>Data de nascimento</div>
<input type="text" id="dataNascimento" class="ui-state-default ui-corner-all width100" />
<div>Matr&iacute;cula</div>
<input type="text" id="matricula" name="Matricula" maxlength="255" value="" class="ui-state-default ui-corner-all width100" />
<div>Siape</div>
<input type="text" id="siape" name="Siape" maxlength="255" value="" class="ui-state-default ui-corner-all width100" />
<div>Data da admiss&atilde;o</div>
<input type="text" id="dataAdmissao" class="ui-state-default ui-corner-all width100" />
<div>Data da admiss&atilde;o na Ufsc</div>
<input type="text" id="dataAdmissaoUfsc" class="ui-state-default ui-corner-all width100" />
<div>Aposentado</div>
<div id="radio">
	<label for="aposentadoSim">Sim</label>
	<input type="radio" id="aposentadoSim" name="aposentado" value="1" />
	<label for="aposentadoNao">N&atilde;o</label>
	<input type="radio" id="aposentadoNao" name="aposentado" value="0" />
</div>
<div>Data prevista da aposentadoria</div>
<input type="text" id="dataPrevistaAposentadoria" class="ui-state-default ui-corner-all width100" />
<div>Data efetiva da aposentadoria</div>
<input type="text" id="dataEfetivaAposentadoria" class="ui-state-default ui-corner-all width100" />
<div>Departamento</div>
<select id="departamento" class="width100">
			<option value="58">Colégio de Aplicação</option>
			<option value="56">Coordenadoria Especial de Artes</option>
			<option value="60">Departamento Central</option>
			<option value="51">Departamento de Administração</option>
			<option value="28">Departamento de Análises Clínicas</option>
			<option value="43">Departamento de Antropologia</option>
			<option value="11">Departamento de Aquicultura</option>
			<option value="2">Departamento de Arquitetura e Urbanismo</option>
			<option value="3">Departamento de Automação e Sistemas</option>
			<option value="18">Departamento de Biologia Celular Embriologia e Genética</option>
			<option value="20">Departamento de Bioquímica</option>
			<option value="15">Departamento de Botânica</option>
			<option value="42">Departamento de Ciência da Informação</option>
			<option value="10">Departamento de Ciência e Tecnologia de Alimentos</option>
			<option value="53">Departamento de Ciências Contábeis</option>
			<option value="54">Departamento de Ciências Econômicas</option>
			<option value="30">Departamento de Ciências Farmaceuticas</option>
			<option value="21">Departamento de Ciências Fisiológicas</option>
			<option value="22">Departamento de Ciências Morfológicas</option>
			<option value="32">Departamento de Clínica Cirurgia</option>
			<option value="34">Departamento de Clínica Médica</option>
			<option value="27">Departamento de Direito</option>
			<option value="16">Departamento de Ecologia e Zoologia</option>
			<option value="39">Departamento de Educação Física</option>
			<option value="36">Departamento de Enfermagem</option>
			<option value="7">Departamento de Engenharia Civil</option>
			<option value="4">Departamento de Engenharia de Produção e Sistemas</option>
			<option value="55">Departamento de Engenharia do Conhecimento</option>
			<option value="8">Departamento de Engenharia Elétrica</option>
			<option value="9">Departamento de Engenharia Mecânica </option>
			<option value="6">Departamento de Engenharia Quimica e Engenharia de Alimentos</option>
			<option value="12">Departamento de Engenharia Ruaral</option>
			<option value="5">Departamento de Engenharia Sanitária e Ambiental</option>
			<option value="41">Departamento de Estudos Especializados em Educação</option>
			<option value="24">Departamento de Expressão Gráfica</option>
			<option value="19">Departamento de Farmacologia</option>
			<option value="44">Departamento de Filosofia</option>
			<option value="49">Departamento de Física</option>
			<option value="13">Departamento de Fitotecnia</option>
			<option value="45">Departamento de Geociências</option>
			<option value="37">Departamento de Ginecologia e Obstetrícia</option>
			<option value="46">Departamento de História</option>
			<option value="1">Departamento de Informática e Estatística</option>
			<option value="23">Departamento de Jornalismo</option>
			<option value="25">Departamento de Língua e Literatura Estrangeiras</option>
			<option value="26">Departamento de Língua e Literatura Vernáculas</option>
			<option value="50">Departamento de Matemática</option>
			<option value="40">Departamento de Metodologia de Ensino</option>
			<option value="17">Departamento de Microbiologia e Parasitologia</option>
			<option value="29">Departamento de Nutrição</option>
			<option value="38">Departamento de Odontologia</option>
			<option value="31">Departamento de Patologia</option>
			<option value="33">Departamento de Pediatria</option>
			<option value="57">Departamento de Psicologia</option>
			<option value="48">Departamento de Química</option>
			<option value="35">Departamento de Saúde Pública</option>
			<option value="52">Departamento de Serviço Social</option>
			<option value="47">Departamento de Sociologia e Ciência Política</option>
			<option value="14">Departamento de Zootecnia e Desenvolvimento Rural</option>
			<option value="59">Núcleo de Desenvolvimento Infantil</option>
	</select>
<div>Categoria Funcional Inicial<div>
<select id="categoriaFuncionalInicial" class="width100">
			<option value="19"> Classe D I - Nível 2</option>
			<option value="20"> Classe D I - Nível 3</option>
			<option value="21"> Classe D I- Nível 4</option>
			<option value="22"> Classe D II - Nível 1</option>
			<option value="23"> Classe D II - Nível 2</option>
			<option value="24"> Classe D II - Nível 3</option>
			<option value="25"> Classe D II - Nível 4</option>
			<option value="26"> Classe D III - Nível 1</option>
			<option value="27"> Classe D III - Nível 2</option>
			<option value="28"> Classe D III - Nível 3</option>
			<option value="29"> Classe D III - Nível 4</option>
			<option value="30"> Classe D IV - Nível S</option>
			<option value="31"> Classe D V - Nível 1</option>
			<option value="32"> Classe D V - Nível 2</option>
			<option value="33"> Classe D V - Nível 3</option>
			<option value="34"> Titular - Nível U</option>
			<option value="9">Adjunto - Nível 1</option>
			<option value="10">Adjunto - Nível 2</option>
			<option value="11">Adjunto - Nível 3</option>
			<option value="12">Adjunto - Nível 4</option>
			<option value="5">Assistente - Nível 1</option>
			<option value="6">Assistente - Nível 2</option>
			<option value="7">Assistente - Nível 3</option>
			<option value="8">Assistente - Nível 4</option>
			<option value="13">Associado 1</option>
			<option value="14">Associado 2</option>
			<option value="15">Associado 3</option>
			<option value="16">Associado 4</option>
			<option value="1">Auxiliar - Nível 1</option>
			<option value="2">Auxiliar - Nível 2</option>
			<option value="3">Auxiliar - Nível 3</option>
			<option value="4">Auxiliar - Nível 4</option>
			<option value="57">Auxiliar de Ensino</option>
			<option value="36">Classe A - Nível I</option>
			<option value="37">Classe A - Nível II</option>
			<option value="38">Classe A - Nível III</option>
			<option value="39">Classe A - Nível IV</option>
			<option value="40">Classe B - Nível I</option>
			<option value="41">Classe B - Nível II</option>
			<option value="42">Classe B - Nível III</option>
			<option value="43">Classe B - Nível IV</option>
			<option value="44">Classe C - Nível I</option>
			<option value="45">Classe C - Nível II</option>
			<option value="46">Classe C - Nível III</option>
			<option value="47">Classe C - Nível IV</option>
			<option value="48">Classe D - Nível I</option>
			<option value="49">Classe D - Nível II</option>
			<option value="50">Classe D - Nível III</option>
			<option value="51">Classe D - Nível IV</option>
			<option value="18">Classe D I - Nível 1</option>
			<option value="52">Classe E - Nível I</option>
			<option value="53">Classe E - Nível II</option>
			<option value="54">Classe E - Nível III</option>
			<option value="55">Classe E - Nível IV</option>
			<option value="56">Classe Especial</option>
			<option value="35">Colaborador</option>
			<option value="58">Nova categria funcional</option>
			<option value="17">Titular</option>
	</select>
<div>Categoria Funcional Atual<div>
<select id="categoriaFuncionalAtual" class="width100">
			<option value="19"> Classe D I - Nível 2</option>
			<option value="20"> Classe D I - Nível 3</option>
			<option value="21"> Classe D I- Nível 4</option>
			<option value="22"> Classe D II - Nível 1</option>
			<option value="23"> Classe D II - Nível 2</option>
			<option value="24"> Classe D II - Nível 3</option>
			<option value="25"> Classe D II - Nível 4</option>
			<option value="26"> Classe D III - Nível 1</option>
			<option value="27"> Classe D III - Nível 2</option>
			<option value="28"> Classe D III - Nível 3</option>
			<option value="29"> Classe D III - Nível 4</option>
			<option value="30"> Classe D IV - Nível S</option>
			<option value="31"> Classe D V - Nível 1</option>
			<option value="32"> Classe D V - Nível 2</option>
			<option value="33"> Classe D V - Nível 3</option>
			<option value="34"> Titular - Nível U</option>
			<option value="9">Adjunto - Nível 1</option>
			<option value="10">Adjunto - Nível 2</option>
			<option value="11">Adjunto - Nível 3</option>
			<option value="12">Adjunto - Nível 4</option>
			<option value="5">Assistente - Nível 1</option>
			<option value="6">Assistente - Nível 2</option>
			<option value="7">Assistente - Nível 3</option>
			<option value="8">Assistente - Nível 4</option>
			<option value="13">Associado 1</option>
			<option value="14">Associado 2</option>
			<option value="15">Associado 3</option>
			<option value="16">Associado 4</option>
			<option value="1">Auxiliar - Nível 1</option>
			<option value="2">Auxiliar - Nível 2</option>
			<option value="3">Auxiliar - Nível 3</option>
			<option value="4">Auxiliar - Nível 4</option>
			<option value="57">Auxiliar de Ensino</option>
			<option value="36">Classe A - Nível I</option>
			<option value="37">Classe A - Nível II</option>
			<option value="38">Classe A - Nível III</option>
			<option value="39">Classe A - Nível IV</option>
			<option value="40">Classe B - Nível I</option>
			<option value="41">Classe B - Nível II</option>
			<option value="42">Classe B - Nível III</option>
			<option value="43">Classe B - Nível IV</option>
			<option value="44">Classe C - Nível I</option>
			<option value="45">Classe C - Nível II</option>
			<option value="46">Classe C - Nível III</option>
			<option value="47">Classe C - Nível IV</option>
			<option value="48">Classe D - Nível I</option>
			<option value="49">Classe D - Nível II</option>
			<option value="50">Classe D - Nível III</option>
			<option value="51">Classe D - Nível IV</option>
			<option value="18">Classe D I - Nível 1</option>
			<option value="52">Classe E - Nível I</option>
			<option value="53">Classe E - Nível II</option>
			<option value="54">Classe E - Nível III</option>
			<option value="55">Classe E - Nível IV</option>
			<option value="56">Classe Especial</option>
			<option value="35">Colaborador</option>
			<option value="58">Nova categria funcional</option>
			<option value="17">Titular</option>
	</select>
<div>Tipo de Titula&ccedil;&atilde;o<div>
<select id="titulacao" class="width100">
			<option value="1">Graduação</option>
			<option value="2">Especialização</option>
			<option value="3">Mestrado</option>
			<option value="4">Doutorado</option>
			<option value="5">Pós-doutorado</option>
			<option value="6">pos-pos-dr</option>
			<option value="8">Pós-pás-píos</option>
			<option value="9">Pré-doutorado</option>
			<option value="10">préprépré</option>
	</select>
<div>Categoria Funcional Refer&ecirc;ncia<div>
<select id="categoriaFuncionalReferencia" class="width100">
			<option value="19"> Classe D I - Nível 2</option>
			<option value="20"> Classe D I - Nível 3</option>
			<option value="21"> Classe D I- Nível 4</option>
			<option value="22"> Classe D II - Nível 1</option>
			<option value="23"> Classe D II - Nível 2</option>
			<option value="24"> Classe D II - Nível 3</option>
			<option value="25"> Classe D II - Nível 4</option>
			<option value="26"> Classe D III - Nível 1</option>
			<option value="27"> Classe D III - Nível 2</option>
			<option value="28"> Classe D III - Nível 3</option>
			<option value="29"> Classe D III - Nível 4</option>
			<option value="30"> Classe D IV - Nível S</option>
			<option value="31"> Classe D V - Nível 1</option>
			<option value="32"> Classe D V - Nível 2</option>
			<option value="33"> Classe D V - Nível 3</option>
			<option value="34"> Titular - Nível U</option>
			<option value="9">Adjunto - Nível 1</option>
			<option value="10">Adjunto - Nível 2</option>
			<option value="11">Adjunto - Nível 3</option>
			<option value="12">Adjunto - Nível 4</option>
			<option value="5">Assistente - Nível 1</option>
			<option value="6">Assistente - Nível 2</option>
			<option value="7">Assistente - Nível 3</option>
			<option value="8">Assistente - Nível 4</option>
			<option value="13">Associado 1</option>
			<option value="14">Associado 2</option>
			<option value="15">Associado 3</option>
			<option value="16">Associado 4</option>
			<option value="1">Auxiliar - Nível 1</option>
			<option value="2">Auxiliar - Nível 2</option>
			<option value="3">Auxiliar - Nível 3</option>
			<option value="4">Auxiliar - Nível 4</option>
			<option value="57">Auxiliar de Ensino</option>
			<option value="36">Classe A - Nível I</option>
			<option value="37">Classe A - Nível II</option>
			<option value="38">Classe A - Nível III</option>
			<option value="39">Classe A - Nível IV</option>
			<option value="40">Classe B - Nível I</option>
			<option value="41">Classe B - Nível II</option>
			<option value="42">Classe B - Nível III</option>
			<option value="43">Classe B - Nível IV</option>
			<option value="44">Classe C - Nível I</option>
			<option value="45">Classe C - Nível II</option>
			<option value="46">Classe C - Nível III</option>
			<option value="47">Classe C - Nível IV</option>
			<option value="48">Classe D - Nível I</option>
			<option value="49">Classe D - Nível II</option>
			<option value="50">Classe D - Nível III</option>
			<option value="51">Classe D - Nível IV</option>
			<option value="18">Classe D I - Nível 1</option>
			<option value="52">Classe E - Nível I</option>
			<option value="53">Classe E - Nível II</option>
			<option value="54">Classe E - Nível III</option>
			<option value="55">Classe E - Nível IV</option>
			<option value="56">Classe Especial</option>
			<option value="35">Colaborador</option>
			<option value="58">Nova categria funcional</option>
			<option value="17">Titular</option>
	</select>
<div>Cargo<div>
<select id="cargo" class="width100">
			<option value="2">Professor Ensino Básico Técnico e Tecnológico</option>
			<option value="1">Professor Ensino Superior</option>
			<option value="3">Servidor</option>
	</select>
<div>Situacao<div>
<select id="situacao" class="width100">
			<option value="1">Estatutário/RJU</option>
	</select>
<div>&nbsp;<div>
<div><button id="cadastrarProfessor" class="right">Cadastrar</button><div>