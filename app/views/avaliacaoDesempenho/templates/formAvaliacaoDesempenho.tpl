<table class="avaliacaoDesempenho">
	<tr>
		<th colspan="8">
			UNIVERSIDADE FEDERAL DE SANTA CATARINA<br />
			AVALIA&Ccedil;&Atilde;O DE DESEMPENHO<br />
			PESSOAL DOCENTE DE 1&ordm; E 2&ordm; GRAUS<br />
			TABELA N&ordm; 1
		</th>
	</tr>
	<tr>
		<th>Nome:</th>
		<td colspan="3">
			<input type="text">
		</td>
		<th colspan="2">Horas semanais:</th>
		<td colspan="2">
			<input type="text">
		</td>
	</tr>
	<tr>
		<th colspan="3">Descri&ccedil;&atilde;o da atividade</th>
		<th>Base de c&aacute;lculo</th>
		<th>Produ&ccedil;&atilde;o(A)</th>
		<th>&Iacute;ndice de qualidade(B)</th>
		<th>Fator Multiplicador(C)</th>
		<th>Total de Pontos</th>
	</tr>
	<tr>
		<th rowspan="3">Ensino</th>
		<th rowspan="3">Aulas</th>
		<td rowspan="2">N&ordm; de aulas semanais do docente</td>
		<td>At&eacute; 20 horas-aula</td>
		<td><input type="text" id="nAulasSemanaisDocenteAte20HorasA" class="nota" /></td>
		<td><input type="text" id="nAulasSemanaisDocenteAte20HorasB" class="nota" /></td>
		<th>1.00</th>
		<td class="totalPonto"></td>
	</tr>
	<tr>
		<td>o que exceder a 20 horas-aul22a*:</td>
		<td><input type="text" id="nAulasSemanaisDocenteExceder20HorasA" class="nota" /></td>
		<td><input type="text" id="nAulasSemanaisDocenteExceder20HorasB" class="nota" /></td>
		<th>0.40</th>
		<td class="totalPonto"></td>
	</tr>
	<tr>
		<td>Plant&atilde;o, reg&ecirc;ncia de Classe, recupera&ccedil;&atilde;o, adapta&ccedil;&atilde;o, antendimento paralelo e refor&ccedil;o:</td>
		<td>horas-aulas:</td>
		<td><input type="text" id="plantaoRegenciaClasseRecuperacaoA" class="nota" /></td>
		<td><input type="text" id="plantaoRegenciaClasseRecuperacaoB" class="nota" /></td>
		<th>1.00</th>
		<td class="totalPonto"></td>
	</tr>
	<tr>
		<th rowspan="5"></th>
		<td colspan="2" > Atendimento de estagi&aacute;rios de Pr&aacute;tica de Ensino</td>
		<td>Estagi&aacute;rio/ano</td>
		<td><input type="text" id="atendimentoEstagiariosPraticaEnsinoA" class="nota" /></td>
		<td><input type="text" id="atendimentoEstagiariosPraticaEnsinoB" class="nota" /></td>
		<th>0.10</th>
		<td class="totalPonto"></td>
	</tr>
	<tr>
		<td rowspan="2" colspan="2">Orienta&ccedil;&atilde;o de est&aacute;gios curriculares de alunos dos Col&eacute;gios</td>
		<td>Por est&aacute;gio at&eacute; 120 horas</td>
		<td><input type="text" id="orientacaoEstagiosCurricularesAte120horasA" class="nota" /></td>
		<td><input type="text" id="orientacaoEstagiosCurricularesAte120horasB" class="nota" /></td>
		<th>0.10</th>
		<td class="totalPonto"></td>
	</tr>
	<tr>
		<td>Por est&aacute;gio acima de 120 horas</td>
		<td><input type="text" id="orientacaoEstagiosCurricularesAcima120horasA" class="nota" /></td>
		<td><input type="text" id="orientacaoEstagiosCurricularesAcima120horasB" class="nota" /></td>
		<th>0.20</th>
		<td class="totalPonto"></td>
	</tr>
	<tr>
		<td rowspan="2" colspan="2">Supervis&atilde;o de est&aacute;gios curriculares de alunos dos Col&eacute;gios, realizados fora da Escola</td>
		<td>Por est&aacute;gio at&eacute; 120 horas</td>
		<td><input type="text" id="SupervisaoEstagiosCurricularesAte120horasA" class="nota" /></td>
		<td><input type="text" id="SupervisaoEstagiosCurricularesAte120horasB" class="nota" /></td>
		<th>0.05</th>
		<td class="totalPonto"></td>
	</tr>
	<tr>
		<td>Por est&aacute;gio acima de 120 horas</td>
		<td><input type="text" id="SupervisaoEstagiosCurricularesAcima120horasA" class="nota" /></td>
		<td><input type="text" id="SupervisaoEstagiosCurricularesAcima120horasB" class="nota" /></td>
		<th>0.10</th>
		<td class="totalPonto"></td>
	</tr>
	<tr>
		<th>Did&aacute;tico Pedag&oacute;gico</th>
		<th colspan="2">Atividades espec&iacute;ficas de Servi&ccedil;o de Orienta&ccedil;&atilde;o Educacional, Servi&ccedil;o de Supervis&atilde;o Pedag&oacute;gica e Administra&ccedil;&atilde;o Escolar</th>
		<td>hora- atividade</td>
		<td><input type="text" id="atividadesEspecíficasServicoOrientacaoA" class="nota" /></td>
		<td><input type="text" id="atividadesEspecíficasServicoOrientacaoB" class="nota" /></td>
		<th>0.50</th>
		<td class="totalPonto"></td>
	</tr>
	<tr>
		<th rowspan="15" >Pesquisa</th>
		<td colspan="2">Autoria de livro</td>
		<td>livro</td>
		<td><input type="text" id="pesAutoriaLivroA" class="nota" /></td>
		<td><input type="text" id="pesAutoriaLivroB" class="nota" /></td>
		<th>0.80</th>
		<td class="totalPonto"></td>
	</tr>
	<tr>
		<td colspan="2">Revis&atilde;o de livro</td>
		<td>livro</td>
		<td><input type="text" id="pesRevisaoLivroA" class="nota" /></td>
		<td><input type="text" id="pesRevisaoLivroB" class="nota" /></td>
		<th>3.00</th>
		<td class="totalPonto"></td>
	</tr>
	<tr>
		<td colspan="2">Tradu&ccedil;&atilde;o de livro</td>
		<td>livro</td>
		<td><input type="text" id="pesTraducaoLivroA" class="nota" /></td>
		<td><input type="text" id="pesTraducaoLivroB" class="nota" /></td>
		<th>3.00</th>
		<td class="totalPonto"></td>
	</tr>
	<tr>
		<td colspan="2">Organiza&ccedil;&atilde;o de livro</td>
		<td>livro</td>
		<td><input type="text" id="pesOrientacaoLivroA" class="nota" /></td>
		<td><input type="text" id="pesOrientacaoLivroB" class="nota" /></td>
		<th>3.00</th>
		<td class="totalPonto"></td>
	</tr>
	<tr>
		<td colspan="2">Cap&iacute;tulo de livro</td>
		<td>capitulo</td>
		<td><input type="text" id="pesCapituloLivroA" class="nota" /></td>
		<td><input type="text" id="pesCapituloLivroB" class="nota" /></td>
		<th>2.50</th>
		<td class="totalPonto"></td>
	</tr>
	<tr>
		<td colspan="2">Texto integral em anais de congresso</td>
		<td>artigo</td>
		<td><input type="text" id="pesTextoIntegralAnaisA" class="nota" /></td>
		<td><input type="text" id="pesTextoIntegralAnaisB" class="nota" /></td>
		<th>2.50</th>
		<td class="totalPonto"></td>
	</tr>
	<tr>
		<td colspan="2">Resumo em anais de congresso</td>
		<td>resumo</td>
		<td><input type="text" id="pesResumoAnaisA" class="nota" /></td>
		<td><input type="text" id="pesResumoAnaisB" class="nota" /></td>
		<th>0.50</th>
		<td class="totalPonto"></td>
	</tr>
	<tr>
		<td colspan="2">Artigo em peri&oacute;dico indexado</td>
		<td>artigo**</td>
		<td><input type="text" id="pesArtigoPeriodicoIndexadoA" class="nota" /></td>
		<td><input type="text" id="pesArtigoPeriodicoIndexadoB" class="nota" /></td>
		<th>5.00</th>
		<td class="totalPonto"></td>
	</tr>
	<tr>
		<td colspan="2">Artigo em peri&oacute;dico n&atilde;o indexado</td>
		<td>artigo</td>
		<td><input type="text" id="pesArtigoPeriodicoNaoIndexadoA" class="nota" /></td>
		<td><input type="text" id="pesArtigoPeriodicoNaoIndexadoB" class="nota" /></td>
		<th>1.50</th>
		<td class="totalPonto"></td>
	</tr>
	<tr>
		<td colspan="2">Nota breve em peri&oacute;dico indexado</td>
		<td>nota</td>
		<td><input type="text" id="pesNotaBrevePeriodicoIndexadoA" class="nota" /></td>
		<td><input type="text" id="pesNotaBrevePeriodicoIndexadoB" class="nota" /></td>
		<th>1.50</th>
		<td class="totalPonto"></td>
	</tr>
	<tr>
		<td colspan="2">Nota breve em peri&oacute;dico n&atilde;o indexado</td>
		<td>nota</td>
		<td><input type="text" id="pesNotaBrevePeriodicoNaoIndexadoA" class="nota" /></td>
		<td><input type="text" id="pesNotaBrevePeriodicoNaoIndexadoB" class="nota" /></td>
		<th>0.50</th>
		<td class="totalPonto"></td>
	</tr>
	<tr>
		<td colspan="2">Resenha em peri&oacute;dico</td>
		<td>resenha</td>
		<td><input type="text" id="pesResenhaPeriodicoA" class="nota" /></td>
		<td><input type="text" id="pesResenhaPeriodicoB" class="nota" /></td>
		<th>0.50</th>
		<td class="totalPonto"></td>
	</tr>
	<tr>
		<td colspan="2">Projetos aprovados pelo Colegiado</td>
		<td>n&ordm; de projetos</td>
		<td><input type="text" id="pesProjetoAprovadoColegiadoA" class="nota" /></td>
		<td><input type="text" id="pesProjetoAprovadoColegiadoB" class="nota" /></td>
		<th>0.10</th>
		<td class="totalPonto"></td>
	</tr>
	<tr>
		<td colspan="2">Relat&oacute;rios parciais aprovados pelo Colegiado</td>
		<td>n&ordm; de relat&oacute;rios</td>
		<td><input type="text" id="pesRelatorioParcialAprovadoColegiadoA" class="nota" /></td>
		<td><input type="text" id="pesRelatorioParcialAprovadoColegiadoB" class="nota" /></td>
		<th>0.40</th>
		<td class="totalPonto"></td>
	</tr>
	<tr>
		<td colspan="2">Relat&oacute;rios finais aprovados pelo Colegiado</td>
		<td>n&ordm; de relat&oacute;rios</td>
		<td><input type="text" id="pesRelatorioFinalAprovadoColegiadoA" class="nota" /></td>
		<td><input type="text" id="pesRelatorioFinalAprovadoColegiadoB" class="nota" /></td>
		<th>0.50</th>
		<td class="totalPonto"></td>
	</tr>
	<tr>
		<th colspan="6">Total de pontos a transportar</th>
		<td colspan="2"><a href="javascript:void(0);" id="totalPontoPag1" >Total</a></td>
	</tr>
	<tr>
		<td colspan="8">* At&eacute; 20 h/a - FM = 1.00 o que exceder a 40h/a, considerando a m&eacute;dia de 20h/a por ano, FM= 0.40.</td>
	</tr>
	<tr>
		<td colspan="8">** A produ&ccedil;&atilde;o dever&aacute; ser mutiplicada de acordo com o Qualis da Capes para Peri&oacute;dico Internacional : A=1; B=0.9; C=0.8 e para Peri&oacute;dico Nacional: A=0.7; B=0.6; C=0.5 e para Peri&oacute;dico Local A=0.4; B=0.3 e C=0.2</td>
	</tr>
</table>