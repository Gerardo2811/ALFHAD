<?php
class UsuariosGF{
    private $email;
    private $password;

    public function __construct(
        $email,
        $password
    ){
        $this->email=$email;
        $this->password=$password;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
    public function guardarUsuariosGF(){
        $contenidoArchivo= file_get_contents("../data/usuariosGF.json");
        $usuariosGF = json_decode($contenidoArchivo, true);
        $usuariosGF[]=array(
            "email"=>$this->email,
            "password"=>$this->password,
        );
        $archivo = fopen("../data/usuariosGF.json", "w"); //w para sustituir el contenido
        fwrite($archivo, json_encode($usuariosGF));
}
}
?>