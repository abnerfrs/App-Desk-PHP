
<?php 

session_start();

$user_auth = false;

$usuario_id = null;

$usuario_perfil_id = null;

$perfis = [1=> 'Administrativo',2=> 'Usuário'];

echo ($_POST['email']).'<br>';
echo ($_POST['senha']);

$usuario_cadastrado = [
    ['id'=> 1,'email'=> 'freitasabner12@gmail.com','senha'=>'abcd','perfil_id'=> 1],
    ['id'=> 2,'email'=> 'adm@teste.com','senha'=> 'abcd','perfil_id'=>1],
    ['id'=> 3,'email'=> 'jose@teste.com','senha'=> 'abcd','perfil_id'=>2],
    ['id'=> 4,'email'=> 'maria@teste.com','senha'=> 'abcd','perfil_id'=>2],
];

foreach ($usuario_cadastrado as $user){
    if ($_POST['email']== $user['email']&& $_POST['senha']==$user['senha']){
        $user_auth = true;
        $usuario_id = $user['id'];
        $usuario_perfil_id = $user['perfil_id'];
    }
}

if ($user_auth){
    echo '<br>Parabéns, você logou com sucesso';
    $_SESSION['autenticado'] = 'SIM';
    $_SESSION['id'] = $usuario_id;
    $_SESSION['perfil_id'] = $usuario_perfil_id;
    header('Location: home.php');
} else{
    $_SESSION['autenticado'] = 'NÃO';
    header('Location: index.php?login=erro');
}
?>
