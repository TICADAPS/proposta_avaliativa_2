<?php

require "util.php";
require "../model/usuario.php";

class UsuarioController
{
	
	function salvar()
	{
		if(isset($_POST['salvar']))
		{
			$nome = Util::clearparam($_POST['nome']);
			$email = Util::clearparam($_POST['email']);
			$senha = Util::clearparam($_POST['senha']);
			$id = Util::clearparam($_POST['id']);
			
			// se nao alterou a senha, nao salvar novamente pois está criptografada
			if(strlen($senha) == 32)
			{
			$senha = '';	
			}
			
			$usuario = new Usuario();
			$usuario->salvar($id,$nome, $email,$senha);
			header("Location: usuario_list.php");
			exit();
		}
	}
	
	function excluir()
	{
		
		if(isset($_POST['excluir']))
		{
			$id = Util::clearparam($_POST['id']);
			
			$usuario = new Usuario();
			$usuario->excluir($id);
		
			header("Location: usuario_list.php");
			exit();
				
		}
	}
	
	function abrir()
	{
		
		if(isset($_GET['id']) && is_numeric($_GET['id']))
		{
			$usuario = new Usuario();
			return $usuario->abrir( $_GET['id']);
		}	
		
	}

	// listagem
	function listarcontroller()
	{
		
		$usuario = new Usuario();
		
		$linhas = $usuario->listar();
		
		$tabela = '';
		foreach($linhas as $linha)
		{
			$tabela .= '<tr>
							<td>'.$linha['id'].'</td>
							<td><a href="usuario_form.php?id='.$linha['id'].'">'.$linha['nome'].'</a></td>
							<td>'.$linha['email'].'</td>
						</tr>		
							';
			
		}
		
		return $tabela;
		
	}
	

}

?>